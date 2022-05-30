<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function index(Request $request)
    {
        // $data = Antrian::where('panggil', 1)->orderBy('updated_at', 'desc')->limit(11)->get();
        $loket0 = Antrian::where('panggil', 1)->orderBy('updated_at', 'desc')->first();
        $loketA = Antrian::where('panggil', 1)->where('loket', 'A')->orderBy('updated_at', 'desc')->first();
        $loketB = Antrian::where('panggil', 1)->where('loket', 'B')->orderBy('updated_at', 'desc')->first();
        $loketC = Antrian::where('panggil', 1)->where('loket', 'C')->orderBy('updated_at', 'desc')->first();
        $loketD = Antrian::where('panggil', 1)->where('loket', 'D')->orderBy('updated_at', 'desc')->first();
        $loketE = Antrian::where('panggil', 1)->where('loket', 'E')->orderBy('updated_at', 'desc')->first();
        $loketF = Antrian::where('panggil', 1)->where('loket', 'F')->orderBy('updated_at', 'desc')->first();
        $loketG = Antrian::where('panggil', 1)->where('loket', 'G')->orderBy('updated_at', 'desc')->first();
        $loketH = Antrian::where('panggil', 1)->where('loket', 'H')->orderBy('updated_at', 'desc')->first();
        $loketI = Antrian::where('panggil', 1)->where('loket', 'I')->orderBy('updated_at', 'desc')->first();
        $loketJ = Antrian::where('panggil', 1)->where('loket', 'J')->orderBy('updated_at', 'desc')->first();
        if (empty($loketA)) {
            $lokA = "-";
        } else {
            $lokA = $loketA->loket .= $loketA->nomorAntri;
        }
        if (empty($loketB)) {
            $lokB = "-";
        } else {
            $lokB = $loketB->loket .= $loketB->nomorAntri;
        }
        if (empty($loketC)) {
            $lokC = "-";
        } else {
            $lokC = $loketC->loket .= $loketC->nomorAntri;
        }
        if (empty($loketD)) {
            $lokD = "-";
        } else {
            $lokD = $loketD->loket .= $loketD->nomorAntri;
        }
        if (empty($loketE)) {
            $lokE = "-";
        } else {
            $lokE = $loketE->loket .= $loketE->nomorAntri;
        }
        if (empty($loketF)) {
            $lokF = "-";
        } else {
            $lokF = $loketF->loket .= $loketF->nomorAntri;
        }
        if (empty($loketG)) {
            $lokG = "-";
        } else {
            $lokG = $loketG->loket .= $loketG->nomorAntri;
        }
        if (empty($loketH)) {
            $lokH = "-";
        } else {
            $lokH = $loketH->loket .= $loketH->nomorAntri;
        }
        if (empty($loketI)) {
            $lokI = "-";
        } else {
            $lokI = $loketI->loket .= $loketI->nomorAntri;
        }
        if (empty($loketJ)) {
            $lokJ = "-";
        } else {
            $lokJ = $loketJ->loket .= $loketJ->nomorAntri;
        }
        if ($request->ajax()) {
            return response()->json($data = [
                'loket0' => $loket0,
                'loketA' => $lokA,
                'loketB' => $lokB,
                'loketC' => $lokC,
                'loketD' => $lokD,
                'loketE' => $lokE,
                'loketF' => $lokF,
                'loketG' => $lokG,
                'loketH' => $lokH,
                'loketI' => $lokI,
                'loketJ' => $lokJ,

            ], 200);
        }

        return view('panel');
    }
}
