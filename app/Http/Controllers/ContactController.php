<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;

class ContactController extends Controller
{
    public function index()
    {
        $categories = \App\Models\Category::all();
        return view('contact', ['categories' => $categories]);
    }

    public function confirm(Request $request)
    {

        // バリデーション
        $request->validate([
        'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'gender' => 'required|in:1,2,3',
            'email' => 'required|email|max:255',
            'tel' => 'required|numeric|digits_between:10,11',
            'address' => 'nullable|string|max:255',
            'building' => 'nullable|string|max:255',
            'category_id' => 'required|integer',
            'detail' => 'required|string|max:120',
        ], [
            'last_name.required' => '姓を入力してください',
            'first_name.required' => '名を入力してください',
            'gender.required' => '性別を選択してください',
            'email.required' => 'メールアドレスを入力してください',
            'tel.required' => '電話番号を入力してください',
            'address.required' => '住所を入力してください',
            'category_id.required' => 'お問い合わせの種類を選択してください',
            'detail.required' => 'お問い合わせ内容を入力してください',
        ]);

        // 入力内容を確認画面へ送る
        return view('confirm', ['data' => $request->all()]);
    }

    public function store(Request $request)
    {

        // データをDBに保存
        Contact::create($request->all());

        // サンクスページを表示
        return view('thanks');
    }
}
