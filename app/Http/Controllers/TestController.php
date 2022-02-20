<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// modelのデータを持ってくる
use App\Models\Test;

// DBファサードをインポート
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    //
    public function index()
    {
        $values = Test::all();

        $collection = collect([1, 2, 3, 4, 5, 6, 7]);

        $chunks = $collection->chunk(4);

        $chunks->toArray();

        // die + var_dump  中身確認に便利
        // dd($values);
        // dd($chunks);

        $tests = DB::table('tests')
        // ->select('id', 'text')
        ->get();

        dd($tests);

        return view('tests.test', compact('values'));
    }
}
