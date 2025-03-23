<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;


class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
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
