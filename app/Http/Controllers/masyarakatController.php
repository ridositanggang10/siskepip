<?php

namespace App\Http\Controllers;

use App\Models\dataMasyarakat;
use App\Models\kritikDanSaran;
use App\Models\notifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Redirect;

class masyarakatController extends Controller
{
    /*---------------------------------------------------------------------*/
    /*---------------------------------------------------------------------*/
    /*--------------------------------Berita-------------------------------*/
    /*---------------------------------------------------------------------*/
    /*---------------------------------------------------------------------*/

    public function getNewsDetail($id){
        $datas = DB::table('berita')->select('*')->where('id',$id)->get();
        return view('people.beritashow',compact('datas'));
    }

    /*---------------------------------------------------------------------*/
    /*---------------------------------------------------------------------*/
    /*--------------------------------Berita-------------------------------*/
    /*---------------------------------------------------------------------*/
    /*---------------------------------------------------------------------*/

    public function showStandarLayanan($id){
        $data = DB::table('standar_layanan')->select('*')->where('id',$id)->get();
        return view('people.standar-layanan-show',compact('data'));
    }



    /*---------------------------------------------------------------------*/
    /*---------------------------------------------------------------------*/
    /*----------------------------KRTIK DAN SARAN--------------------------*/
    /*---------------------------------------------------------------------*/
    /*---------------------------------------------------------------------*/

    public function kritikDanSaran(){
        $data = DB::table('instansi')
                    ->select('*')
                    ->get();
        
        return view('people.kritikdansaran',['data'=>$data]);
    }

    public function postKritikDanSaran(Request $request){
        $isValid = $request->validate([
                    'nama_lengakap' => 'required|string|max:255',
                    'jenis_kelamin' => 'required',
                    'usia' => 'required',
                    'nomor_telepon' => 'required',
                    'alamat' => 'required|string',
                    'ks_instansi_id' => 'required',
                    'pendidikan_terakhir' => 'required',
                    'foto' => 'mimes:jpg,png,jpeg,gif,svg,pdf,doc,docx,txt,odt,xls,xlsx,ppt,pptx',
                    'pekerjaan' => 'required|string|max:255',
                    'pesan' => 'required|string'
                ]);

            $mas_id = Str::uuid()->toString();

            $mas_data = new dataMasyarakat(); 
            $mas_data->id = $mas_id;
            $mas_data->nama_lengakap = $request->get('nama_lengakap');
            $mas_data->jenis_kelamin = $request->get('jenis_kelamin');
            $mas_data->alamat = $request->get('alamat');
            $mas_data->nomor_telepon = $request->get('nomor_telepon');
            $mas_data->pendidikan_terakhir = $request->get('pendidikan_terakhir');
            $mas_data->pekerjaan = $request->get('pekerjaan');
            $mas_data->usia = $request->get('usia');


            $kritik_dan_saran_data = new kritikDanSaran();
            $kritik_dan_saran_data->id = Str::uuid()->toString();
            $kritik_dan_saran_data->ks_instansi_id = $request->get('ks_instansi_id');
            $kritik_dan_saran_data->masyarakat_id = $mas_id;
            $kritik_dan_saran_data->pesan = $request->get('pesan');
            $kritik_dan_saran_data->status = 'pending';        

        if($isValid){
            $mas_data->save();
            if($request->foto){
                $destinationPath = 'assets_masyarakat/kritikdansaran/files/';
                $kds = date('YmdHis') . "." . $request->foto->getClientOriginalExtension();
                $request->foto->move($destinationPath, $kds);
                $kritik_dan_saran_data->foto = $kds;
                $kritik_dan_saran_data->save();    
            } else {
                $kritik_dan_saran_data->save();  
            }
            
            $notif = new notifikasi();
            foreach($jenis_notif = DB::table('jenis_notifikasi')->select('*')->where('nama_notifikasi','Kritik dan Saran')->get() as $data_notif ){
                $notif->n_instansi_id  = $request->get('ks_instansi_id');
                $notif->n_jenis_notif_id  = $data_notif->id;
                $notif->isi_notifikasi = 'Kritik dan Saran Baru';
                $notif->status = 'unseen';
                $notif->admin_status = 'unseen';
                $notif->save();
            }

            return Redirect::to('/public/kds/kritik-dan-saran')->with('success','Kritik dan Saran Anda Berhasil dikirim');
        } else {
            return Redirect::to('/public/kds/kritik-dan-saran')->with('error','Data Gagal disimpan, Periksa Kembali Data Anda!');
        }

    }

    /*---------------------------------------------------------------------*/
    /*---------------------------------------------------------------------*/
    /*------------------------------RATING---------------------------------*/
    /*---------------------------------------------------------------------*/
    /*---------------------------------------------------------------------*/

    public function showRatingForm(){
        $datas = DB::table('instansi')
                    ->select('*')
                    ->get();
        return view('people.rating',['datas'=>$datas]);
    }

    public function getAllRatingTag($id){
        $datas = DB::table('survei_questions')
                    ->select('survei_tag')
                    ->distinct()
                    ->where('sq_instansi_id',$id)
                    ->get();
        return view('people.rating-form-lists',['datas'=>$datas]);
    }

    public function getSelectedInstansi(Request $request){
        return Redirect::to('/public/rating/rating-category/'.$request->id);
    }


    public function getFormOne(Request $request, $tag){
        $tag_one = $tag;
        return view('people.rating-form-one',compact('tag_one'));
    }


    public function getUserDataFormOne(Request $request,$tag_one){
        $tag = $tag_one;
        $request->validate([
            'nama_lengakap' => 'required|string|max:255',
            'jenis_kelamin' => 'required',
            'usia' => 'required',
            'nomor_telepon' => 'required',
            'alamat' => 'required|string',
            'pendidikan_terakhir' => 'required',
            'pekerjaan' => 'required|string|max:255'
        ]);

        $data_user = [
            'id' => Str::uuid()->toString(),
            'nama_lengakap' => $request->get('nama_lengakap'),
            'jenis_kelamin' => $request->get('jenis_kelamin'),
            'alamat' => $request->get('alamat'),
            'nomor_telepon' => $request->get('nomor_telepon'),
            'pendidikan_terakhir' => $request->get('pendidikan_terakhir'),
            'pekerjaan' => $request->get('pekerjaan'),
            'usia' => $request->get('usia')
        ];

        return view('people.rating-form-two',compact('data_user','tag'));
    }

    public function postData(Request $request, $tag){

        $data_user = [
            'id' => $request->get('id'),
            'nama_lengakap' => $request->get('nama_lengakap'),
            'jenis_kelamin' => $request->get('jenis_kelamin'),
            'alamat' => $request->get('alamat'),
            'nomor_telepon' => $request->get('nomor_telepon'),
            'pendidikan_terakhir' => $request->get('pendidikan_terakhir'),
            'pekerjaan' => $request->get('pekerjaan'),
            'usia' => $request->get('usia')
        ];

        DB::table('data_masyarakat')->insert($data_user);

        foreach( $item = DB::table('survei_questions')
                                    ->select('*')
                                    ->where('survei_tag',$tag)
                                    ->get() as $key=>$iterator) {
                $result_datas = [
                    'id' => Str::uuid()->toString(),
                    'hsm_masyarakat_id' => $request->get('id'),
                    'hsm_instansi_id' => $iterator->sq_instansi_id,
                    'question_tag' => $tag,
                    'question_number' => $key+1,
                    'penilaian_user' => $request->get('nilai'.$key)
                ];

                DB::table('hasil_survei_masyarakat')->insert($result_datas);
                $this->countRating($tag,$iterator->sq_instansi_id);
        }

        return Redirect::to('/public/rating/instansi');
    }


    public function countRating($tag,$instansi_id){
        $marks = DB::table('hasil_survei_masyarakat')->where('question_tag','=',$tag)->sum('penilaian_user');
        $number_of_responds = DB::table('hasil_survei_masyarakat')->where('question_tag','=',$tag)->count();

        if(!DB::table('hasil_penilaian_instansi')->select('*')->where('question_tag','=',$tag)->exists()){
            DB::table('hasil_penilaian_instansi')->insert([
                'id' => Str::uuid()->toString(),
                'hpi_instansi_id' => $instansi_id,
                'question_tag' => $tag,
                'jumlah_rating' => $marks/$number_of_responds
            ]);
        } else {
            DB::table('hasil_penilaian_instansi')
                        ->where('question_tag',$tag)
                        ->update(['jumlah_rating'=> $marks/$number_of_responds]);
        }
    }


    public function showRatingResults(){
        $datas = DB::table('hasil_penilaian_instansi')->select('*')->get();
        return view('people.rating-results',compact('datas'));
    }

}

