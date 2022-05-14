<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function index(Request $request)
    {
        $data = Antrian::where('panggil', 1)->orderBy('updated_at', 'desc')->limit(10)->get();
        if ($request->ajax()) {
            return response()->json($data, 200);
        }
        return view('panel');
    }
}
