<?php

namespace App\Http\Controllers;

use App\Models\berita;
use App\Models\User;
use App\Models\instansi;
use App\Models\notifikasi;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;
use PDF;



class adminController extends Controller
{
    /*-------------------------------------------------------------------- */
    /*-------------------------------------------------------------------- */
    /*--------------------------Kritik dan saran-------------------------- */
    /*-------------------------------------------------------------------- */
    /*-------------------------------------------------------------------- */

    public function showKritikDanSaran(){
        $data = DB::table('kirik_dan_saran')
                    ->select('*')
                    ->orderBy('created_at', 'desc')
                    ->paginate(20);
        return view('admin.kritik_dan_saran.kritik-dan-saran-baru',compact('data'))
        ->with('i', (request()->input('page', 1) - 1) * 20);
    }

    public function showKritikDanSaranDetail($id){
        $data = DB::table('kirik_dan_saran')
                    ->select('*')
                    ->where('id',$id)
                    ->get();
        return view('admin.kritik_dan_saran.kritik-dan-saran-detail',['data'=>$data]);
    }

    // download foto standar layanan
    public function downloadFotoSTD($foto){
        return response()->download(public_path('assets_user/standarLayanan/pictures/'.$foto));
    }

    public function printPage($id){
        $data = DB::table('data_masyarakat')
                        ->select('*')
                        ->where('id',$id)
                        ->get();
        $pdf = PDF::loadview('admin.kritik_dan_saran.print-kritik-dan-saran',compact('data'));
        return $pdf->download('kritik-dan-saran.pdf');
    }

    public function deleteKDS($id){
        DB::table('kirik_dan_saran')
                    ->where('masyarakat_id',$id)
                    ->delete();

        DB::table('data_masyarakat')
                    ->where('id',$id)
                    ->delete();
        return redirect('/kritik-dan-saran/kds-lists')->with('success','Data Berhasil dihapus');
    }

    /*-------------------------------------------------------------------- */
    /*-------------------------------------------------------------------- */
    /*--------------------------Kelola Pengguna--------------------------- */
    /*-------------------------------------------------------------------- */
    /*-------------------------------------------------------------------- */

    public function showUser(){
        $data = DB::table('users')->select('*')->where('status','!=','unactive')->paginate(10);
        return view('admin.kelola_pengguna.kelola-pengguna',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function showEditForm($id){
        $data = DB::table('users')
                    ->select('*')
                    ->where('id',$id)
                    ->get();
        return view('admin.kelola_pengguna.edit-data-pengguna',compact('data'));
    }

    public function updateUserRole(Request $request,$id){
         DB::table('role_user')
                ->where('user_id',$id)
                ->update(['role_id'=>$request->role_id]);
        $user = DB::table('users')->select('*')->where('id',$id)->get();
        
        return back()->with('success','Role user berhasil diubah');
    }



    /*-------------------------------------------------------------------- */
    /*-------------------------------------------------------------------- */
    /*------------------Verifikasi Request Akun--------------------------- */
    /*-------------------------------------------------------------------- */
    /*-------------------------------------------------------------------- */


    public function showVerPage() {
        $data = DB::table('request_akun')
                    ->select('*')
                    ->where('status','=','pending')
                    ->paginate(10);

        return view('admin.request_akun.ver-req-akun',['data'=>$data]);
    }

    public function showAcceptedPage() {
        $data = DB::table('request_akun')
                    ->select('*')
                    ->where('status','=','accepted')
                    ->paginate(10);

        
        return view('admin.request_akun.accepted-req',['data'=>$data]);
    }

    public function showRejectedPage() {
        $data = DB::table('request_akun')
                    ->select('*')
                    ->where('status','=','rejected')
                    ->paginate(10);
        return view('admin.request_akun.rejected-req',['data'=>$data]);
    }

    public function createUser($id) {
        foreach ($store = DB::table('request_akun')
                            ->select('*')
                            ->where('id',$id)
                            ->get() as $user_data) {
                                
            $user = User::create([
                'name' => $user_data->name,
                'instansiID' => $user_data->ra_instansi_id,
                'email' => $user_data->email,
                'password' => Hash::make(Crypt::decryptString($user_data->password)),
                'status' => 'active'
            ]);

            $user->attachRole('user');
            event(new Registered($user));

            DB::table('request_akun')
                            ->select('*')
                            ->where('id',$id)
                            ->update(['status'=>'accepted']);

            $notif = new notifikasi();
                    foreach($jenis_notif = DB::table('jenis_notifikasi')->select('*')->where('nama_notifikasi','Request Akun Baru')->get() as $data_notif ){
                        $notif->n_instansi_id  = $user_data->ra_instansi_id;
                        $notif->n_jenis_notif_id  = $data_notif->id;
                        $notif->isi_notifikasi = 'Request diterima';
                        $notif->status = 'unseen';
                        $notif->admin_status = 'unseen';
                        $notif->save();
                    }
            return back()->with('success','User baru berhasil di daftarkan');
        }
    }


    public function rejectRequestAccount($id){
        DB::table('request_akun')
                            ->select('*')
                            ->where('id',$id)
                            ->update(['status'=>'rejected']);

        return back()->with('success','Permohonan berhasil ditolak');
    }


    public function deleteUserAccount($id){
        DB::table('users')
                ->where('id',$id)
                ->update([
                    'status'=>'unactive'
                ]);

        return back()->with('success','User Berhasil dihapus');
    }

    /*-------------------------------------------------------------------- */
    /*-------------------------------------------------------------------- */
    /*--------------------------Ganti katasandi--------------------------- */
    /*-------------------------------------------------------------------- */
    /*-------------------------------------------------------------------- */


    public function showUbahPassword(){
        return view('admin.ubah_katasandi.ubah-katasandi');
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
                ['admin_status' => 'seen']
            );
        return back();
    }


    /*-------------------------------------------------------------------- */
    /*-------------------------------------------------------------------- */
    /*--------------------------Berita---- ------------------------------- */
    /*-------------------------------------------------------------------- */
    /*-------------------------------------------------------------------- */

    public function showNewsLits(){
        $beritas = DB::table('berita')
                        ->select('*')
                        ->orderBy('created_at','desc')
                        ->paginate(10);
         return view('admin.berita.lists-berita',compact('beritas'))
             ->with('i', (request()->input('page', 1) - 1) * 10);
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
        
        return Redirect::to('/berita/berita-lists');
    }

    public function showParticularBerita($id){
        $data = DB::table('berita')
            ->select('*')
            ->where('id',$id)
            ->get();
        return view("admin.berita.isi-berita", ["data"=>$data]);
    }


    /*-------------------------------------------------------------------- */
    /*-------------------------------------------------------------------- */
    /*-----------------Standar Layanan---- ------------------------------- */
    /*-------------------------------------------------------------------- */
    /*-------------------------------------------------------------------- */

    public function showSTDLits(){
        $stds = DB::table('standar_layanan')
                        ->select('*')
                        ->orderBy('created_at','desc')
                        ->paginate(10);
         return view('admin.standar-layanan.list-std-admin',compact('stds'))
             ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function showParticularStandarLayanan($id){
        $data = DB::table('standar_layanan')
                ->select('*')
                ->where('id',$id)
                ->get();

        return view('admin.standar-layanan.detail-std',['data'=>$data]);
    }

    // download file standar layanan
    public function downloadFileSTD($file){
        return response()->download(public_path('assets_user/standarLayanan/files/'.$file));
    }



    /*Controller untuk admin mengelola user, kegunaan setiap fugsi sesuai dengan penamaannya*/
    public function cretaeNewUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'instansiID' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'instansiID' => $request->instansiID,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->attachRole('user');
        event(new Registered($user));

        Auth::login($user);

        //return redirect(RouteServiceProvider::HOME)->with('status',"Berhasil ditambahkan");
    }

    public function deleteUser($id){
        DB::table('users')
        ->where('id', $id)
        ->delete();

        DB::table('role_user')
        ->where(['id = ?', $id])
        ->delete();
        return redirect(RouteServiceProvider::HOME)->with('status',"Berhasil dihapus");
    }


    /*Controller untuk instansi, kegunaan setiap fugsi sesuai dengan penamaannya*/
    public function cretaeNewInstansi(Request $request){
        $request->validate([
            'instansi_name' => 'required|string|max:255',
            'instansi_address' => 'required|string|max:255',
            'instansi_website_link' => 'required|string|max:255',
            'instansi_descriptions' => 'required'
        ]);

        $data = new instansi();
        $data->instansi_name = $request->get('instansi_name');
        $data->instansi_address = $request->get('instansi_address');
        $data->instansi_website_link = $request->get('instansi_website_link');
        $data->instansi_descriptions = $request->get('instansi_descriptions');
        $data->save();
    }

    public function deleteInstansi($intansi_id){
        DB::table('instansi')
            ->where('instansi_id', $intansi_id)
            ->delete();
            return redirect(RouteServiceProvider::HOME)->with('status',"Berhasil dihapus");
    }

    public function updateInstansi(Request $request, $instansi_id){
        $request->validate([
            'instansi_name' => 'required|string|max:255',
            'instansi_address' => 'required|string|max:255',
            'instansi_website_link' => 'required|string|max:255',
            'instansi_descriptions' => 'required'
        ]);

        DB::table('instansi')
            ->where('instansi_id', $instansi_id)
            ->update([
                'instansi_name' => $request->get('instansi_name'),
                'instansi_address' => $request->get('instansi_address'),
                'instansi_website_link' => $request->get('instansi_website_link'),
                'instansi_descriptions' => $request->get('instansi_descriptions'),
            ]);
    }
}
