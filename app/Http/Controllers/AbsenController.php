<?php

namespace App\Http\Controllers;

use App\Models\AbsenModel;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbsenController extends Controller
{

    public function __construct()
    {
        $this->AbsenModel = new AbsenModel();
        $this->middleware('auth');
    }

    public function index()
    {
        return view('absen.absenmasuk');
    }

    public function log()
    {
        $data = AbsenModel::latest()->paginate(10);
        return view('absen.log', ['logs'=>$data]);
    }

    public function insert(Request $request)
    {
        //cek array
        //dd($request->all());
        $timezone = "Asia/Jakarta";
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('Y-m-d');
        $localtime = $date->format('H:i:s');
        $timestamp = $date->format('Y-m-d H:i:s');

        $data = [
            'nama' => $request->nama,
            'perusahaan' => $request->perusahaan,
            'ruang' => $request->ruang,
            'kegiatan' => implode(',', $request->kegiatan),
            'tanggung_jawab' => $request->tanggung_jawab,
            'tglmasuk' => $tanggal,
            'jammasuk' => $localtime,
            'created_at' => $timestamp,

        ];
        DB::table('absen')->insert($data);
        //AbsenModel::create($data);
        return redirect()->route('masuk')->with('pesan', 'Sudah Absen Masuk');

    }

    public function keluar()
    {
        //$data = AbsenModel::all();
        $data = AbsenModel::latest()->paginate(10);
        //$data = DB::table('absen')->orderBy('id', 'DESC');
        return view('absen.absenkeluar', ['logs'=>$data]);
    }

    public function update(Request $request, $id)
    {
        $timezone = "Asia/Jakarta";
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('Y-m-d');
        $localtime = $date->format('H:i:s');

        $data = [
            'tglkeluar' => $tanggal,
            'jamkeluar' => $localtime,

        ];
        //DB::table('absen')->update($id, $data);
        DB::table('absen')
            ->where('id', $id)
            ->update($data);

        return redirect()->back()->with('pesan', 'Sudah Absen Keluar');;

    }

    public function search(Request $request)
    {
        if (isset($_GET['search'])) {

            $search = $_GET['search'];
            $logs = DB::table('absen')
                ->where('nama', 'LIKE', '%'.$search.'%')
                ->orwhere('perusahaan', 'LIKE', '%'.$search.'%')
                ->orwhere('ruang', 'LIKE', '%'.$search.'%')
                ->orwhere('kegiatan', 'LIKE', '%'.$search.'%')
                ->orwhere('tanggung_jawab', 'LIKE', '%'.$search.'%')
                ->orwhere('tglmasuk', 'LIKE', '%'.$search.'%')
                ->orwhere('jammasuk', 'LIKE', '%'.$search.'%')
                ->orwhere('tglkeluar', 'LIKE', '%'.$search.'%')
                ->orwhere('jamkeluar', 'LIKE', '%'.$search.'%')
                ->paginate(10);
            return view('absen.log', ['logs'=>$logs]);

        }else{
            return view('absen.log');
        }
    }

    public function lihat($id)
    {
        if (!$this->AbsenModel->detailData($id)) {
            abort(404);
        }
        $data = [
            'detail' => $this->AbsenModel->detailData($id),
        ];
        return view('absen.detail', $data);
    }











    public function store(Request $request)
    {

        $timezone = "Asia/Jakarta";
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('Y-m-d');
        $localtime = $date->format('H:i:s');

        Request()->validate([
            //'user_id' => ['required', 'bigInteger', 'max:11'],
            'nama' => ['required', 'string', 'max:255'],
            'perusahaan' => ['required', 'string', 'max:255'],
            'ruang' => ['required', 'string', 'max:255'],
            'kegiatan' => ['required', 'string', 'max:255'],
            'tanggung_jawab' => ['required', 'string', 'max:255'],

        ]);

       $data = [
        //'user_id' => auth()->user()->id,
        'nama' => Request()->nama,
        'perusahaan' => Request()->perusahaan,
        'ruang' => Request()->ruang,
        'kegiatan' => implode(',', $request->kegiatan),
        'tanggung_jawab' => Request()->tanggung_jawab,
        'tgl' => $tanggal,
        'jammasuk' => $localtime,
       ];

        DB::table('absen')->insert($data);
        return view('absen.keluar', ['tampil'=>$data])->with('pesan', 'Data Berhasil Di Tambahkan');

    }
}
