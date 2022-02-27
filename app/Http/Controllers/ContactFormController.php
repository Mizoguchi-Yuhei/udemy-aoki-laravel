<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ContactForm;  // コンタクトフォームのデータを入力するため
use Illuminate\Support\Facades\DB;  // DBのファサード クエリビルダーの使用のため
use App\Services\CheckFormData;
use App\Http\Requests\StoreContactForm;  // バリデーションの呼び出し
class ContactFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // データを全て持ってくる
        // Eloquent ORマッパー
        // $contacts = ContactForm::all();
        // dd($contacts);

        // クエリビルダー
        $contacts = DB::table('contact_forms')
            ->select('id', 'your_name', 'title', 'created_at')
            ->orderBy('created_at', 'desc')
            ->get();

        // dd('$contacts');

        return view('contact.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactForm $request)
    {
        $contact = new ContactForm;
        // $input = $request->all();  // 全てのデータを持ってくる
        $contact->your_name = $request->input('your_name');
        $contact->title = $request->input('title');
        $contact->email = $request->input('email');
        $contact->url = $request->input('url');
        $contact->gender = $request->input('gender');
        $contact->age = $request->input('age');
        $contact->contact = $request->input('contact');

        $contact->save();

        return redirect('contact\index');

        // dd($your_name, $title);
        // dd($contact->your_name, $contact->title);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * ユーザー詳細表示
     */
    public function show($id)
    {
        //
        $contact = ContactForm::find($id);

        // 性別
        $gender = CheckFormData::checkGender($contact);
        //年代
        $age = CheckFormData::checkAge($contact);

        // dd($contact);
        return view('contact.show',
        compact('contact', 'gender', 'age'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 編集画面
     */
    public function edit($id)
    {
        $contact = ContactForm::find($id);

        return view('contact.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 更新
     */
    public function update(Request $request, $id)
    {
        $contact = ContactForm::find($id);
        // $input = $request->all();  // 全てのデータを持ってくる
        $contact->your_name = $request->input('your_name');
        $contact->title = $request->input('title');
        $contact->email = $request->input('email');
        $contact->url = $request->input('url');
        $contact->gender = $request->input('gender');
        $contact->age = $request->input('age');
        $contact->contact = $request->input('contact');

        $contact->save();

        return redirect('contact\index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * データの削除
     */
    public function destroy($id)
    {
        $contact = ContactForm::find($id);
        $contact->delete();

        return redirect('contact/index');
    }
}
