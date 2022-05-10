<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Pengunjung;
use Illuminate\Http\Request;
use Auth;
use Redirect;
use Datatables;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->hasRole('administrator')) {
                return redirect::back();
            } else {
                return view('dashboard');
            }
            // return view('home');
        } else {
            return redirect('/login');
            // return view('auth.loginauth');
        }
    }

    public function dataTabel($loket)
    {
        $curDate = date("Y-m-d");
        $data = Antrian::where('loket', $loket)->whereDate('diambil', $curDate)->with('Pengunjung')->get();
        // return response()->json($ambidata, 200);
        return DataTables::make($data)->make(true);
    }

    public function update(Request $request)
    {
        $data = Antrian::where('pengunjung_nik', $request->nik)->update(['status' => 1]);
        // $data->save();
    }
    public function panggil(Request $request)
    {
        $data = Antrian::where('pengunjung_nik', $request->nik)->update(['panggil' => 1]);
        // $data->save();
    }
}
