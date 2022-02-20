<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// modelのデータを持ってくる
use App\Models\Test;

class TestController extends Controller
{
    //
    public function index()
    {
        $values = Test::all();

        // die + var_dump  中身確認に便利
        // dd($values);

        return view('tests.test', compact('values'));
    }
}
