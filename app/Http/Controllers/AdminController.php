<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('Admin.login', [
            'title' => 'Login'
        ]);
    }

    public function login(Request $request)
    {
        $data = Admin::where('nik', $request->nik)->first();
        print_r($request->nik);
        die();
        if (is_null($data)) {
            return response()->json($dataKembali = 1, 500);
        } elseif ($data->password != $request->password) {
            return response()->json($dataKembali = 2, 500);
        } else {
            return response()->json($data, 200);
        }
    }
}
