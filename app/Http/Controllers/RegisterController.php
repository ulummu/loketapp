<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class RegisterController extends Controller
{
    public function index()
    {
        return view('Admin.register');
    }

    public function store(Request $request)
    {
        $data = admin::create($request->all());
        return response()->json($data, 200);
    }
}
