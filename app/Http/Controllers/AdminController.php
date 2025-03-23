<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class AdminController extends Controller
{
    public function index()
    {
        $contacts = Contact::all(); // すべての問い合わせデータを取得
        return view('admin.index', compact('contacts'));
    }
}
