<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Antrian;
use Illuminate\Http\Request;
use App\Models\loket;
use App\Models\pengunjung;
use Illuminate\Database\Eloquent\Model;

class LoketController extends Controller
{
    public function index()
    {
        $curDate = date("Y-m-d");
        $tomorrow = strtotime("+1 day");
        $tomorrowDate = date("Y-m-d", $tomorrow);
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

        if ($curDate < $tomorrowDate) {
            $ambilNik = DB::table('antrians')->whereDate('diambil', '<', $curDate)->pluck('pengunjung_nik')->all();
            $deleted = DB::table('pengunjungs')->whereIn('nik', $ambilNik)->delete();
        }
        return view('loket', [
            "antrian" => $data
        ]);
    }

    public function tampilSatu(Request $request)
    {
        $noUrut = Antrian::where('pengunjung_nik', $request->nik)->get();
        return $noUrut;
        return response()->json($noUrut, 200);
    }

    public function store(Request $request)
    {
        $data = pengunjung::create($request->all());
        return response()->json($data, 200);
    }

    public function show()
    {
        #
    }

    public function destroy($id)
    {
        model::destroy($id);

        return 'sukses';
    }

    public function table()
    {
        $data = pengunjung::get();

        return response()->json($data, 200);
    }
}
