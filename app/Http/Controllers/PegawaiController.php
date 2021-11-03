<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
 
class PegawaiController extends Controller
{
    public function index(){
 
    	// mengambil data dari table pegawai
    	// $pegawai = DB::table('pegawai')->get();

        // paginate databasenya
        $pegawai = DB::table('pegawai')->paginate(10);
 
    	// mengirim data pegawai ke view index
    	return view('index',['pegawai' => $pegawai]);
 
    }

    // method untuk menampilkan view form tambah pegawai
    public function tambah()
    {
        // memanggil view tambah
        return view('tambah');
    }

    // method untuk insert data ke table pegawai
    public function store(Request $request)
    {
        // insert data ke table pegawai
        DB::table('pegawai')->insert([
            'pegawai_nama' => $request->nama,
            'pegawai_jabatan' => $request->jabatan,
            'pegawai_umur' => $request->umur,
            'pegawai_alamat' => $request->alamat
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/pegawai');

    }

    public function edit($id){
        //mengambil data pegawai yang dipilih
        $pegawai = DB::table('pegawai')->where('pegawai_id', $id)->get();
        return view ('edit',['pegawai' => $pegawai]);
    }

    public function update(Request $request){
        //update data pegawai
        DB::table('pegawai')->where('pegawai_id',$request->id)->update([
            'pegawai_nama' => $request->nama,
            'pegawai_jabatan' => $request-> jabatan,
            'pegawai_umur' => $request-> umur,
            'pegawai_alamat' => $request-> alamat,
        ]);

        return redirect('/pegawai');
    }

    public function hapus(Request $request){
        //hapus pegawai dari idnya
        DB::table('pegawai')->where('pegawai_id',$request->id)->delete();
        //kembali ke pegawai
        return redirect('/pegawai');
    }

    public function formulir(){

        return view('formulir');
    }

    public function proses(Request $request){
        $nama = $request -> input('nama');
        $alamat = $request -> input ('alamat');
        return 'Nama='.$nama.'Alamat='.$alamat;

    }
}

// tutor sampai 6 awal