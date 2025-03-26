<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use Illuminate\Support\Facades\Response;

class AdminController extends Controller
{
    public function index(Request $request)

    {
        if ($request->has('reset')) {
            return redirect()->route('admin.index');
        }

        $query = Contact::query();

        if ($request->filled('keyword')) {
            $query->where(function ($q) use ($request) {
                $q->where('last_name', 'like', '%' . $request->keyword . '%')
                    ->orWhere('first_name', 'like', '%' . $request->keyword . '%')
                    ->orWhereRaw("CONCAT(last_name, first_name) LIKE ?", ['%' . $request->keyword . '%'])
                    ->orWhere('email', 'like', '%' . $request->keyword . '%');
            });
        }

        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        $contacts = $query->with('category')->latest()->paginate(7);
        $categories = Category::all();

        return view('admin.index', compact('contacts', 'categories'));
    }

    public function export(Request $request)
    {
        $query = Contact::with('category');

        // 絞り込み条件があるときだけ適用
        if ($request->filled('keyword')) {
            $keyword = $request->input('keyword');
            $query->where(function ($q) use ($keyword) {
                $q->where('first_name', 'like', "%$keyword%")
                    ->orWhere('last_name', 'like', "%$keyword%")
                    ->orWhere('email', 'like', "%$keyword%");
            });
        }

        if ($request->filled('gender')) {
            $query->where('gender', $request->input('gender'));
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->input('category_id'));
        }

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->input('date'));
        }

        $contacts = $query->orderBy('created_at', 'desc')->get();

        // 以下、CSV出力処理は同じ
        $csvHeader = [
            'ID',
            '姓',
            '名',
            '性別',
            'メールアドレス',
            '電話番号',
            '住所',
            '建物名',
            'お問い合わせの種類',
            'お問い合わせ内容',
            '登録日時'
        ];

        $csvData = $contacts->map(function ($contact) {
            return [
                $contact->id,
                $contact->last_name,
                $contact->first_name,
                $contact->gender == 1 ? '男性' : ($contact->gender == 2 ? '女性' : 'その他'),
                $contact->email,
                $contact->tel,
                $contact->address,
                $contact->building,
                optional($contact->category)->name ?? '未設定',
                $contact->detail,
                $contact->created_at->format('Y-m-d H:i:s')
            ];
        });

        $csvOutput = implode(',', $csvHeader) . "\n";
        foreach ($csvData as $row) {
            $csvOutput .= implode(',', array_map(fn($v) => '"' . str_replace('"', '""', $v) . '"', $row)) . "\n";
        }

        $filename = 'contacts_filtered_' . now()->format('Ymd_His') . '.csv';
        return response($csvOutput)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', "attachment; filename={$filename}");
    }
}
