<?php

namespace App\Http\Controllers;

use App\Models\berita;
use App\Models\kritikDanSaran;
use App\Models\questions;
use App\Models\requestAkun;
use App\Models\standarPelayanan;
use App\Models\redirectKritikDanSaran;
use App\Models\notifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Crypt;

class userController extends Controller
{
    /*-------------------------------------------------------------------- */
    /*-------------------------------------------------------------------- */
    /*-----------------------------News----------------------------------- */
    /*-------------------------------------------------------------------- */
    /*-------------------------------------------------------------------- */
    
    public function createBerita(Request $request){
        $request->validate([
            'judul' => 'required|string|max:255',
            'link' => 'required|string',
            'berita_description' => 'required',
            'berita_foto' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);

        $berita_foto = $request->berita_foto->getClientOriginalName() . '-HUMBAHAS-BERITA-' . time()
                                 . '.' . $request->berita_foto->extension();

        $request->berita_foto->move(public_path('assets_user/berita/pictures'),$berita_foto);

        $data =  new berita();
        $data->berita_instansi_id = Auth::user()->instansiID;
        $data->judul = $request->get('judul');
        $data->link = $request->get('link');
        $data->berita_description = $request->get('berita_description');
        $data->berita_foto = $berita_foto;
        $data->save();

        return Redirect::to('/berita/create-berita')->with('success','Berita berhasil ditambahkan');
    }

    public function updateBerita(Request $request,$id){
        $request->validate([
            'judul' => 'required|string|max:255',
            'link' => 'required|string',
            'berita_description' => 'required',
        ]);

        $data = berita::find($id);
        if($request->hasFile('berita_foto')){
            $request->validate([
              'berita_foto' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);

            $destinationPath = 'assets_user/berita/pictures/';
            $berita_image = date('YmdHis') . "." . $request->berita_foto->getClientOriginalExtension();
            $request->berita_foto->move($destinationPath, $berita_image);
            $data->berita_foto = $berita_image;
        }
       
        $data->berita_instansi_id = Auth::user()->instansiID;
        $data->judul = $request->get('judul');
        $data->link = $request->get('link');
        $data->berita_description = $request->get('berita_description');
        $data->save();

        return Redirect::to('/berita/all-news/content/'.$id)->with('success','Berita berhasil diupdate');
    }

    public function deleteBerita($id){
        $picture = DB::table('berita')
                    ->select('*')
                    ->where('id',$id)
                    ->get();
                    
        //File::delete('/user/assets_user/berita/pictures/'.$picture);
        foreach($picture  as $pics)
        {
            unlink('assets_user/berita/pictures/'.$pics->berita_foto);
        }
        
        berita::where("id", $id)->delete();
        
        return Redirect::to('/berita/all-news')->with('success','Berita Berhasil dihapus');
    }

    public function showBerita(){
        $data = DB::table('berita')
            ->select('*')

            ->get();

        return view("user.berita.berita", ["data"=>$data]);
    }

    public function showParticularBerita($id){
        $data = DB::table('berita')
            ->select('*')
            ->where('id',$id)
            ->get();
        return view("user.berita.show-berita", ["data"=>$data]);
    }

    public function updateBeritaView($id){
        $data = DB::table('berita')
            ->select('*')
            ->where('id',$id)
            ->get();
        return view("user.berita.update-berita", ["data"=>$data]);
    }

    

    /*-------------------------------------------------------------------- */
    /*-------------------------------------------------------------------- */
    /*----------------------Questions / Survey / Rating------------------*/
    /*-------------------------------------------------------------------- */
    /*-------------------------------------------------------------------- */

    public function showCreateRatingForm(){
        return view('user.rating.create-rating');
    }

    public function storeQuestions(Request $request){
        $request->validate([
             'survei_tag' =>'required|string|max:255',
             'judul' => 'required',
             'question' => 'required',
             'opsi_1' => 'required',
             'opsi_2' => 'required',
             'opsi_3' => 'required',
             'opsi_4' => 'required',
        ]);

        $survei_tag = $request->survei_tag;
        $judul = $request->judul;
        $question = $request->question;
        $opsi_1 = $request->opsi_1;
        $opsi_2 = $request->opsi_2;
        $opsi_3 = $request->opsi_3;
        $opsi_4 = $request->opsi_4;

        for ($i = 0; $i < count($question); $i++) {
            $saveData = [
                'survei_tag'      => $survei_tag,
                'question_number' => $i,
                'question'        => $question[$i],
                'sq_instansi_id'  => Auth::user()->instansiID,
                'sq_user_id'      => Auth::id(),
                'judul'           => $judul,
                'opsi_1'          => $opsi_1[$i],
                'opsi_2'          => $opsi_2[$i],
                'opsi_3'          => $opsi_3[$i],
                'opsi_4'          => $opsi_4[$i]
            ];
            DB::table('survei_questions')->insert($saveData);
        }
        return Redirect::to('/rating/create-form')->with('success','Data berhasil disimpan');
    }

    public function showRatingList(){
        $data = DB::table('survei_questions')
                    ->where('sq_instansi_id', Auth::user()->instansiID)
                    ->distinct()
                    ->get(['survei_tag']);

        return view('user.rating.rating',compact('data'))->with('i');
    }


    public function viewRatingDetail($survei_tag){
        $data = DB::table('survei_questions')
                    ->select('*')
                    ->where('survei_tag',$survei_tag)
                    ->get();
        $title = DB::table('survei_questions')
                    ->where('survei_tag',$survei_tag)
                    ->distinct()
                    ->get(['survei_tag','judul']);


        return view('user.rating.view-rating-detail',compact('data','title'))->with('i');
    }


    public function showEditForm($survei_tag){
        $data = DB::table('survei_questions')
                    ->select('*')
                    ->where('survei_tag',$survei_tag)
                    ->get();
        $title = DB::table('survei_questions')
                    ->where('survei_tag',$survei_tag)
                    ->distinct()
                    ->get(['survei_tag','judul']);
        return view('user.rating.edit-rating',compact('data','title'))->with('i');
    }

    public function storeEditedData(Request $request,$tag){
        $request->validate([
            'judul' => 'required',
            'question' => 'required',
            'opsi_1' => 'required',
            'opsi_2' => 'required',
            'opsi_3' => 'required',
            'opsi_4' => 'required',
       ]);

       $judul = $request->judul;
       $question = $request->question;
       $opsi_1 = $request->opsi_1;
       $opsi_2 = $request->opsi_2;
       $opsi_3 = $request->opsi_3;
       $opsi_4 = $request->opsi_4;

       for ($i = 0; $i < count($question); $i++) {
           $saveData = [
               'question_number' => $i,
               'question'        => $question[$i],
               'sq_instansi_id'  => Auth::user()->instansiID,
               'sq_user_id'      => Auth::id(),
               'judul'           => $judul,
               'opsi_1'          => $opsi_1[$i],
               'opsi_2'          => $opsi_2[$i],
               'opsi_3'          => $opsi_3[$i],
               'opsi_4'          => $opsi_4[$i]
           ];
           DB::table('survei_questions')->where('survei_tag',$tag)->update($saveData);
       }
       return back()->with('success','Update data berhasil');
    }
    /*-------------------------------------------------------------------- */
    /*-------------------------------------------------------------------- */
    /*---------------------------START REQUEST AKUN-------------------------*/
    /*-------------------------------------------------------------------- */
    /*-------------------------------------------------------------------- */
    
    public function requestAccount(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => ['required',Rules\Password::defaults()],
            'password_confirmation' => ['required',Rules\Password::defaults()]
        ]);

        if ($request->get('password') == $request->get('password_confirmation')){
            $data = new requestAkun();
            $data->name = $request->get('name');
            $data->ra_user_id = Auth::id();
            $data->ra_instansi_id = Auth::user()->instansiID;
            $data->email = $request->get('email');
            $data->password = Crypt::encryptString($request->get('password'));
            $data->status = "pending";
            $data->save();

            $notif = new notifikasi();
            foreach($jenis_notif = DB::table('jenis_notifikasi')->select('*')->where('nama_notifikasi','Request Akun Baru')->get() as $data_notif ){
                $notif->n_instansi_id  = Auth::user()->instansiID;
                $notif->n_jenis_notif_id  = $data_notif->id;
                $notif->isi_notifikasi = 'Pengajuan pembuatan akun baru';
                $notif->status = 'unseen';
                $notif->admin_status = 'unseen';
                $notif->save();
            }

            return Redirect::to('/request-akun/request-lists')->with('success','Request Berhasil dikirim');
        } else {
            return Redirect::to('/request-akun/request-lists')->with('error','Password tidak sama');
        }  
    }

    public function deleteRequestAccount($id){
        DB::table('request_akun')
        ->where('id',$id)
        ->update([
            'status' => "deleted"
        ]);
        return Redirect::to('/request-akun/request-lists')->with('success','Data berhasil di hapus');
    }

    public function updateRequestAccount(Request $request,$id){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => ['required',Rules\Password::defaults()],
            'password_confirmation' => ['required',Rules\Password::defaults()]
        ]);

        if ($request->get('password') == $request->get('password_confirmation')){
            DB::table('request_akun')
            ->where('id',$id)
            ->update([
                'name' => $request->get('name'),
                'ra_instansi_id' => Auth::user()->instansiID,
                'ra_user_id' => Auth::id(),
                'email' => $request->get('email'),
                'password' => $request->get('password'),
                'status' => "pending"
            ]);
            return Redirect::to('/request-akun/request-lists')->with('success','Request Berhasil diperbaharui');
        } else {
            return Redirect::to('/request-akun/request-lists')->with('error','Password tidak sama');
        }  
    }

    public function showRequestAccount(){
        $data = DB::table('request_akun')
                    ->select('*')
                    ->where([
                        ['ra_instansi_id',Auth::user()->instansiID],
                        ['status','pending']
                        ])
                    ->orWhere('status', 'accepted')
                    ->orderBy('created_at', 'desc')
                    ->get();

        return view('user.request_akun.request-akun',['data'=>$data]);
    }



    /*-------------------------------------------------------------------- */
    /*-------------------------------------------------------------------- */
    /*------------------------STANDAR PELAYANAN--------------------------- */
    /*-------------------------------------------------------------------- */
    /*-------------------------------------------------------------------- */

    public function createStandarPelayanan(Request $request){
        $data = new standarPelayanan();
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required',
            'foto' => 'image|mimes:jpg,png,jpeg,gif,svg|max:10240',
            'file' => 'mimes:pdf,doc,docx,txt,odt,xls,xlsx,ppt,pptx|max:10240'
        ]);

        if($request->foto){
            // Rename and store pictures to database
            $std_foto = $request->foto->getClientOriginalName() . '-HUMBAHAS-STANDARLAYANAN-' . time()
                                    . '.' . $request->foto->extension();

            $request->foto->move(public_path('assets_user/standarLayanan/pictures'),$std_foto);
            $data->foto = $std_foto;
        }
       
        if($request->file){
            // Rename and store file to database
            $std_file = $request->file->getClientOriginalName().time().'.'.$request->file->extension();
            $request->file->move(public_path('assets_user/standarLayanan/files'),$std_file);
            $data->file = $std_file;
        }

        // To store all datas to database
        $data->judul = $request->get('judul');
        $data->deskripsi = $request->get('deskripsi');
        $data->sl_instansi_id = Auth::user()->instansiID;
        $data->save();

        return Redirect::to('standar-layanan/create-stdl')->with('success','Standar Layanan Berhasil ditambahkan');
    }


    public function updateStandarLayanan(Request $request,$id){
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required',
        ]);

        $data = standarPelayanan::find($id);
        if($request->hasFile('foto') || $request->hasFile('file')){
            $request->validate([
                'foto' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048'
            ]);

            $path_foto = 'assets_user/standarLayanan/pictures/';
            $store_foto = date('YmdHis') . "." . $request->foto->getClientOriginalExtension();
            $request->foto->move($path_foto, $store_foto);
            $data->foto = $store_foto;

        }

        if($request->hasFile('file')) {
            $request->validate([
                'file' => 'mimes:pdf,doc,docx,txt,odt,xls,xlsx,ppt,pptx|max:10240'
            ]);

            $path_file = 'assets_user/standarLayanan/files/';
            $store_file = date('YmdHis') . "." . $request->file->getClientOriginalExtension();
            $request->file->move($path_file, $store_file);
            $data->file = $store_file;
        }


            $data->judul = $request->get('judul');
            $data->deskripsi = $request->get('deskripsi');
            $data->sl_instansi_id = Auth::user()->instansiID;
            $data->save();
            return Redirect::to('/standar-layanan/all-lists/'.$id)->with('success','Berita berhasil diupdate');
    }


    public function deleteStandarLayanan($id){
        $data = DB::table('standar_layanan')
        ->select('*')
        ->where('id',$id)
        ->get();

        //File::delete('/user/assets_user/berita/pictures/'.$picture);
        foreach($data  as $datas)
        {
            unlink('assets_user/standarLayanan/pictures/'.$datas->foto);
            unlink('assets_user/standarLayanan/files/'.$datas->file);
        }

        standarPelayanan::where("id", $id)->delete();
        return Redirect::to('/standar-layanan/all-lists')->with('success','Data Berhasil dihapus');
    }

    // Get all standar layanan
    public function showStandarLayanan(){
        $data = DB::table('standar_layanan')
                ->select('*')
                ->get();

        return view('user.standar_layanan.show-standar-layanan',['data'=>$data]);
    }

    // get particular standar layanan
    public function showParticularStandarLayanan($id){
        $data = DB::table('standar_layanan')
                ->select('*')
                ->where('id',$id)
                ->get();

        return view('user.standar_layanan.detail-standar-layanan',['data'=>$data]);
    }

    // get data to update and show
    public function showDataToUpdate($id){
        $data = DB::table('standar_layanan')
            ->select('*')
            ->where('id',$id)
            ->get();
        return view("user.standar_layanan.update-standar-pelayanan", ["data"=>$data]);
    }

    // download file standar layanan
    public function downloadFileSTD($file){
        return response()->download(public_path('assets_user/standarLayanan/files/'.$file));
    }

    // download foto standar layanan
    public function downloadFotoSTD($foto){
        return response()->download(public_path('assets_user/standarLayanan/pictures/'.$foto));
    }

    /*-------------------------------------------------------------------- */
    /*-------------------------------------------------------------------- */
    /*--------------------------Kritik dan saran-------------------------- */
    /*-------------------------------------------------------------------- */
    /*-------------------------------------------------------------------- */

    public function showKDSPublic($id){
        if ( (DB::table('kirik_dan_saran')->where([
            ['ks_instansi_id', Auth::user()->instansiID],
            ['status','public']
        ])->count()) > 0) {
            return back()->with('error','Maaf! hanya satu data yang bisa di tampilkan!');
        } else {
            DB::table('kirik_dan_saran')
            ->where('masyarakat_id',$id)
            ->update([
                'status' => "public"
            ]);
            return back()->with('success','Data sukses ditampilkan');
        }
    }


    public function showNewKritikDanSaran() {
        $kds_data = DB::table('kirik_dan_saran')
                        ->select('*')
                        ->where([
                            ['ks_instansi_id', Auth::user()->instansiID],
                            ['status','pending']
                        ])
                        ->orderBy('created_at','desc')
                        ->paginate(10);

        // $mas_data = DB::table('data_masyarakat')
        //             ->select('*')
        //             ->paginate(10);
                    
       return view('user.kritik_dan_saran.kritik-dan-saran-baru',['kds_data'=>$kds_data]);
    }

    public function acceptKritikdanSaran($id) {
        DB::table('kirik_dan_saran')
            ->where('id',$id)
            ->update([
                'status' => "accepted"
            ]);

            return Redirect::to('/kritik-dan-saran/all-lists');
    }

    public function rejectKritikdanSaran($id) {
        DB::table('kirik_dan_saran')
            ->where('id',$id)
            ->update([
                'status' => "rejected"
            ]);

        return Redirect::to('/kritik-dan-saran/all-lists');
    }
           

    public function detailKritikDanSaran($id){
        $data = DB::table('data_masyarakat')
                    ->select('*')
                    ->where('id',$id)
                    ->get();

        return view('user.kritik_dan_saran.detail-kritik-dan-saran',['data'=>$data]);
    }

    public function printPage($id){
        $data = DB::table('data_masyarakat')
                        ->select('*')
                        ->where('id',$id)
                        ->get();
        $pdf = PDF::loadview('user.kritik_dan_saran.print-kritik-dan-saran',compact('data'));
        return $pdf->download('kritik-dan-saran.pdf');
    }

    public function downloadFileKDS($file){
        return response()->download(public_path('/assets_masyarakat/kritikdansaran/files/'.$file));
    }

    public function redirectKDS(Request $request, $id){
        DB::table('kirik_dan_saran')
            ->where('id',$id)
            ->update([
                'status' => "redirected"
            ]);

        $get_kds_data = DB::table('kirik_dan_saran')
                            ->select('*')
                            ->where('id',$id)
                            ->get();

        foreach($get_kds_data as $items){
            $data = new redirectKritikDanSaran();
            $data->rkds_old_id = $items->id;
            $data->rkds_masyarakat_id = $items->masyarakat_id ;
            $data->rkds_instansi_id = $items->ks_instansi_id;
            $data->instansi_baru = $request->get('instansi_baru');
            $data->foto = $items->foto;
            $data->pesan = $items->pesan;
            $data->status = 'pending';
            $data->save();
        }

        $notif = new notifikasi();
        foreach($jenis_notif = DB::table('jenis_notifikasi')->select('*')->where('nama_notifikasi','Redirect Kritik dan Saran')->get() as $data_notif ){
            $notif->n_instansi_id  = $items->ks_instansi_id;
            $notif->n_jenis_notif_id  = $data_notif->id;
            $notif->isi_notifikasi = 'Redirect Kritik dan Saran';
            $notif->status = 'unseen';
            $notif->admin_status = 'unseen';
            $notif->save();
        }

        return Redirect::to('/kritik-dan-saran/all-lists')->with('success','Kritik dan saran berhasil dialihkan');
    }

    public function showAcceptedKritikDanSaran(){
        $kds_data = DB::table('kirik_dan_saran')
            ->select('*')
            ->where([
                ['ks_instansi_id', Auth::user()->instansiID],
                ['status','accepted']
            ])
            ->orWhere([
                ['ks_instansi_id', Auth::user()->instansiID],
                ['status','public']
            ])
            ->get();
    
        return view('user.kritik_dan_saran.kritik-dan-saran-terima',['kds_data'=>$kds_data]);
    }

    public function showRejectedKritikDanSaran(){
        $kds_data = DB::table('kirik_dan_saran')
            ->select('*')
            ->where([
                ['ks_instansi_id', Auth::user()->instansiID],
                ['status','rejected']
            ])
            ->get();

        return view('user.kritik_dan_saran.kritik-dan-saran-tolak',['kds_data'=>$kds_data]);
    }
    
    public function showRedirectKritikDanSaran(){
        $data = DB::table('redirect_kritik_dan_saran')
                    ->select('*')
                    ->where('instansi_baru',Auth::user()->instansiID)
                    -> paginate(5);
        return view('user.kritik_dan_saran.redirect-kritik-dan-saran',['data'=>$data]);
    }

    public function acceptRedirectedKritikdanSaran($id) {
        DB::table('redirect_kritik_dan_saran')
            ->where('id',$id)
            ->update([
                'status' => "accepted"
            ]);

            return Redirect::to('/kritik-dan-saran/redirect-lists');
    }

    public function rejectRedirectedKritikdanSaran($id) {
        DB::table('redirect_kritik_dan_saran')
            ->where('id',$id)
            ->update([
                'status' => "rejected"
            ]);

        return Redirect::to('/kritik-dan-saran/redirect-lists');
    }

    /*-------------------------------------------------------------------- */
    /*-------------------------------------------------------------------- */
    /*--------------------------Change Password-------------------------- */
    /*-------------------------------------------------------------------- */
    /*-------------------------------------------------------------------- */

    public function showChangePasswordForm() {
        return view('user.ubah-password');
    }

    public function saveNewPassword(Request $request){
        $user = Auth::user();
    
        $userPassword = $user->password;
        
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|same:confirm_password|min:6',
            'confirm_password' => 'required',
        ]);

        if (!Hash::check($request->current_password, $userPassword)) {
            return back()->with('error','password not match');
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('success','password berhasil di ganti');
    }

    /*-------------------------------------------------------------------- */
    /*-------------------------------------------------------------------- */
    /*--------------------------Notifikasi ------------------------------- */
    /*-------------------------------------------------------------------- */
    /*-------------------------------------------------------------------- */

    public function seenNotif($id){
        DB::table('notifikasi')
            ->where('id',$id)
            ->update(
                ['status' => 'seen']
            );
        return back();
    }
}

    
