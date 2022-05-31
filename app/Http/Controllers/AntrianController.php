<?php

namespace App\Http\Controllers;

use DB;
use PDF;
use Carbon\Carbon;
use App\Models\Antrian;
use App\Models\Pengunjung;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as FacadesDB;

class AntrianController extends Controller
{
    private $getData = "";
    public function index()
    {
        return view('loket', "masuk");
    }
    public function store(Request $request)
    {
        $savePengunjung = new Pengunjung;
        $savePengunjung->nik = $request->nik;
        $savePengunjung->nama = $request->nama;
        $savePengunjung->save();


        $changeDate = strtr($_REQUEST['tanggal'], '/', '-');
        $newTanggal = date("Y-m-d", strtotime($changeDate));
        $namaPengunjung = DB::table('pengunjungs')->select('nama')->where('nik', $request->nik)->value('nama');
        $banyakAntrian = DB::table('antrians')->where('loket', $request->loket)
            ->whereDate('diambil', $newTanggal)
            ->orderBy('created_at', 'DESC')
            ->first();
        if (empty($banyakAntrian)) {
            $antrianNew = 1;
            $antri = new Antrian;
            $antri->pengunjung_nik = $request->nik;
            $antri->diambil = $newTanggal;
            $antri->nomorAntri = $antrianNew;
            $antri->loket = $request->loket;
            $antri->status = $request->status;
            $antri->panggil = $request->panggil;
            $antri->save();
        } else {
            if ((int)$banyakAntrian->nomorAntri >= 5) {
                return response()->json(['tanggal' => $changeDate], 500);
            } else {
                $antrianNew = (int)$banyakAntrian->nomorAntri + 1;
                $antri = new Antrian;
                $antri->pengunjung_nik = $request->nik;
                $antri->diambil = $newTanggal;
                $antri->nomorAntri = $antrianNew;
                $antri->loket = $request->loket;
                $antri->status = $request->status;
                $antri->panggil = $request->panggil;
                $antri->save();
            }
        }

        switch ($request->loket) {
            case "A":
                $loketNew = "1";
                break;
            case "B":
                $loketNew = "2";
                break;
            case "C":
                $loketNew = "3";
                break;
            case "D":
                $loketNew = "4";
                break;
            case "E":
                $loketNew = "5";
                break;
            case "F":
                $loketNew = "6";
                break;
            case "G":
                $loketNew = "7";
                break;
            case "H":
                $loketNew = "8";
                break;
            case "I":
                $loketNew = "9";
                break;
            case "J":
                $loketNew = "10";
                break;

            default:
                $loketNew = "ra masuk";
                break;
        }

        // print_r($banyakAntrian->pengunjung->nik);
        // die();

        $data = [
            'pengunjung_nik'    => $request->nik,
            'nama' => $namaPengunjung,
            'diambil'     => $newTanggal,
            'nomorAntri' => $antrianNew,
            'banyakAntrian' => $banyakAntrian,
            'loket' => $loketNew
        ];

        // print_r($nama);
        return response()->json($data, 200);
    }

    public function realTime(Request $request)
    {
        $convDate = $_REQUEST['tanggalSekarang'];
        $curDate = date("Y-m-d", strtotime($convDate));
        $tomorrow = strtotime("+1 day");
        $tomorrowDate = date("Y-m-d", $tomorrow);
        $yesterday = strtotime("-1 day");
        $yesterdayDate = date("Y-m-d", $yesterday);
        // print_r($tomorrowDate);

        if ($curDate < $tomorrowDate) {
            $antrianBesokLoketA = Antrian::select('nomorAntri')->where('loket', 'A')->whereDate('diambil', $tomorrowDate)->orderBy('created_at', 'DESC')->value('nomorAntri');
            if (is_null($antrianBesokLoketA)) {
                $antrianBesokLoketA = 0;
            }
            $antrianBesokLoketB = Antrian::select('nomorAntri')->where('loket', 'B')->whereDate('diambil', $tomorrowDate)->orderBy('created_at', 'DESC')->value('nomorAntri');
            if (is_null($antrianBesokLoketB)) {
                $antrianBesokLoketB = 0;
            }
            $antrianBesokLoketC = Antrian::select('nomorAntri')->where('loket', 'C')->whereDate('diambil', $tomorrowDate)->orderBy('created_at', 'DESC')->value('nomorAntri');
            if (is_null($antrianBesokLoketC)) {
                $antrianBesokLoketC = 0;
            }
            $antrianBesokLoketD = Antrian::select('nomorAntri')->where('loket', 'D')->whereDate('diambil', $tomorrowDate)->orderBy('created_at', 'DESC')->value('nomorAntri');
            if (is_null($antrianBesokLoketD)) {
                $antrianBesokLoketD = 0;
            }
            $antrianBesokLoketE = Antrian::select('nomorAntri')->where('loket', 'E')->whereDate('diambil', $tomorrowDate)->orderBy('created_at', 'DESC')->value('nomorAntri');
            if (is_null($antrianBesokLoketE)) {
                $antrianBesokLoketE = 0;
            }
            $antrianBesokLoketF = Antrian::select('nomorAntri')->where('loket', 'F')->whereDate('diambil', $tomorrowDate)->orderBy('created_at', 'DESC')->value('nomorAntri');
            if (is_null($antrianBesokLoketF)) {
                $antrianBesokLoketF = 0;
            }
            $antrianBesokLoketG = Antrian::select('nomorAntri')->where('loket', 'G')->whereDate('diambil', $tomorrowDate)->orderBy('created_at', 'DESC')->value('nomorAntri');
            if (is_null($antrianBesokLoketG)) {
                $antrianBesokLoketG = 0;
            }
            $antrianBesokLoketH = Antrian::select('nomorAntri')->where('loket', 'H')->whereDate('diambil', $tomorrowDate)->orderBy('created_at', 'DESC')->value('nomorAntri');
            if (is_null($antrianBesokLoketH)) {
                $antrianBesokLoketH = 0;
            }
            $antrianBesokLoketI = Antrian::select('nomorAntri')->where('loket', 'I')->whereDate('diambil', $tomorrowDate)->orderBy('created_at', 'DESC')->value('nomorAntri');
            if (is_null($antrianBesokLoketI)) {
                $antrianBesokLoketI = 0;
            }
            $antrianBesokLoketJ = Antrian::select('nomorAntri')->where('loket', 'J')->whereDate('diambil', $tomorrowDate)->orderBy('created_at', 'DESC')->value('nomorAntri');
            if (is_null($antrianBesokLoketJ)) {
                $antrianBesokLoketJ = 0;
            }
        }
        $data = [
            'antrianA' => $antrianBesokLoketA,
            'antrianB' => $antrianBesokLoketB,
            'antrianC' => $antrianBesokLoketC,
            'antrianD' => $antrianBesokLoketD,
            'antrianE' => $antrianBesokLoketE,
            'antrianF' => $antrianBesokLoketF,
            'antrianG' => $antrianBesokLoketG,
            'antrianH' => $antrianBesokLoketH,
            'antrianI' => $antrianBesokLoketI,
            'antrianJ' => $antrianBesokLoketJ,
        ];
        // if ($curDate < $tomorrowDate) {
        // $ambilNik = DB::table('antrians')->whereDate('diambil', '<', $curDate)->pluck('pengunjung_nik')->all();
        // $deleted = DB::table('pengunjungs')->whereIn('nik', $ambilNik)->delete();
        // $ambilPengunjung = Pengunjung::pluck('nik')->all();
        // foreach ($ambilPengunjung as $k => $val) {
        //     $cekAntrian = DB::table('antrians')->where('pengunjung_nik', $val)->first();
        //     if (empty($cekAntrian)) {
        //         DB::table('pengunjungs')->where('nik', $val)->delete();
        //     }
        // }
        // print_r($ambilPengunjung);
        return response()->json($data, 200);
        // }
    }
    public function cekAntrian(Request $request)
    {
        $cek = Antrian::select('pengunjung_nik',  'nomorAntri', 'loket')->where('pengunjung_nik', $request->nik)->first();
        $diambilCek = Antrian::select('diambil')->where('pengunjung_nik', $request->nik)->value('diambil');
        $newDiambil = date("d M Y", strtotime($diambilCek));

        switch ($cek->loket) {
            case "A":
                $loketNew = "1";
                break;
            case "B":
                $loketNew = "2";
                break;
            case "C":
                $loketNew = "3";
                break;
            case "D":
                $loketNew = "4";
                break;
            case "E":
                $loketNew = "5";
                break;
            case "F":
                $loketNew = "6";
                break;
            case "G":
                $loketNew = "7";
                break;
            case "H":
                $loketNew = "8";
                break;
            case "I":
                $loketNew = "9";
                break;
            case "J":
                $loketNew = "10";
                break;

            default:
                $loketNew = "ra masuk";
                break;
        }

        $data = [
            'pengunjung_nik'    => $cek->pengunjung_nik,
            'nama' => $cek->pengunjung->nama,
            'diambil'     => $newDiambil,
            'nomorAntri' => $cek->nomorAntri,
            'loket' => $cek->loket,
            'loketnew' => $loketNew,
        ];
        // print_r($cek);
        return response()->json($data, 200);
    }
    public function cetak(Request $request)
    {

        $data = Antrian::where('pengunjung_nik', $request->nik)->first();
        $diambilCek = Antrian::select('diambil')->where('pengunjung_nik', $request->nik)->value('diambil');
        $newDiambil = date("d M Y", strtotime($diambilCek));

        switch ($data->loket) {
            case "A":
                $loketNew = "1";
                break;
            case "B":
                $loketNew = "2";
                break;
            case "C":
                $loketNew = "3";
                break;
            case "D":
                $loketNew = "4";
                break;
            case "E":
                $loketNew = "5";
                break;
            case "F":
                $loketNew = "6";
                break;
            case "G":
                $loketNew = "7";
                break;
            case "H":
                $loketNew = "8";
                break;
            case "I":
                $loketNew = "9";
                break;
            case "J":
                $loketNew = "10";
                break;

            default:
                $loketNew = "ra masuk";
                break;
        }

        $show = [
            'pengunjung_nik'    => $request->nik,
            'nama' => $data->pengunjung->nama,
            'diambil'     => $newDiambil,
            'nomorAntri' => $data->nomorAntri,
            'loket' => $data->loket,
            'loketNew' => $loketNew
        ];
        // $pdf = PDF::loadview('antriCetak', ['show' => $show])->setOptions(['defaultFont' => 'sans-serif', 'Arial', 'Helvetica']);
        // return $pdf->download('Antrian_' . $request->nik . '.pdf');
        return response()->json($show, 200);
    }
}
