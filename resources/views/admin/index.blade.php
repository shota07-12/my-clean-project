<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理画面 - お問い合わせ一覧</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>

<body>

    <!-- ロゴとログアウト -->
    <!-- ヘッダー全体 -->
    <div class="text-center position-relative mb-4">
        <h1 class="mb-1">FashionablyLate</h1>
        <p class="mb-0">Admin</p>

        <!-- ログアウトボタン -->
        <form method="POST" action="{{ route('logout') }}" class="logout-button">
            @csrf
            <button type="submit" class="btn btn-logout">logout</button>
        </form>
    </div>


    <!-- ✅ containerをここでラップ -->
    <div class="wrapper">
        <!-- 検索フォーム -->
        <form method="GET" action="{{ route('admin.index') }}" class="mb-2">
            <div class="row g-3 align-items-end">
                <!-- フォーム項目たち -->
                <div class="col-md-3">
                    <input type="text" name="keyword" class="form-control" placeholder="名前またはメールアドレスを入力してください" value="{{ request('keyword') }}">
                </div>

                <div class="col-md-1">
                    <label class="form-label">性別：</label>
                    <select name="gender" class="form-select">
                        <option value="">全て</option>
                        <option value="1" @if(request('gender')=='1' ) selected @endif>男性</option>
                        <option value="2" @if(request('gender')=='2' ) selected @endif>女性</option>
                        <option value="3" @if(request('gender')=='3' ) selected @endif>その他</option>
                    </select>
                </div>

                <div class="col-md-2">
                    <label class="form-label">お問い合わせの種類：</label>
                    <select name="category_id" class="form-select">
                        <option value="">全て</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if(request('category_id')==$category->id) selected @endif>
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-2">
                    <label class="form-label">日付：</label>
                    <input type="date" name="date" class="form-control" value="{{ request('date') }}">
                </div>

                <!-- ✅ 検索ボタン -->
                <div class="col-md-1 d-grid">
                    <button type="submit" class="btn btn-secondary">検索</button>
                </div>

                <!-- リセットボタン -->
                <div class="col-md-2 d-grid">
                    <button type="button" onclick="location.href='{{ route('admin.index') }}'" class="btn btn-secondary">リセット</button>
                </div>

            </div>
        </form>

        <!-- ✅ エクスポート＆ページネーション -->
        <div class="wrapper mx-auto">
            <div class="export-pagination">
                <form method="GET" action="{{ route('admin.export') }}">
                    <input type="hidden" name="keyword" value="{{ request('keyword') }}">
                    <input type="hidden" name="gender" value="{{ request('gender') }}">
                    <input type="hidden" name="category_id" value="{{ request('category_id') }}">
                    <input type="hidden" name="date" value="{{ request('date') }}">
                    <button type="submit" class="btn btn-outline-secondary btn-sm">エクスポート</button>
                </form>
                <div>
                    {{ $contacts->appends(request()->query())->links() }}
                </div>
            </div>

            <!-- ✅ テーブル -->
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>お名前</th>
                        <th>性別</th>
                        <th>メールアドレス</th>
                        <th>電話番号</th>
                        <th>お問い合わせの種類</th>
                        <th></th>
                    </tr>
                </thead>
                @foreach ($contacts as $contact)
                <tr>
                    <td>{{ $contact->id }}</td>
                    <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
                    <td>
                        @if ($contact->gender == 1)
                        男性
                        @elseif ($contact->gender == 2)
                        女性
                        @else
                        その他
                        @endif
                    </td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->tel }}</td>
                    <td>{{ $contact->category->name ?? '未設定' }}</td>

                    <td>
                        <!-- 詳細ボタン -->
                        <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#modal{{ $contact->id }}">
                            詳細
                        </button>

                        <!-- モーダル -->
                        <div class="modal fade" id="modal{{ $contact->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $contact->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">お問い合わせ詳細</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
                                    </div>

                                    <div class="modal-body text-start">
                                        <p><strong>お名前：</strong> {{ $contact->last_name }} {{ $contact->first_name }}</p>
                                        <p><strong>性別：</strong>
                                            @if ($contact->gender == 1) 男性
                                            @elseif ($contact->gender == 2) 女性
                                            @else その他
                                            @endif
                                        </p>
                                        <p><strong>メールアドレス：</strong> {{ $contact->email }}</p>
                                        <p><strong>電話番号：</strong> {{ $contact->tel }}</p>
                                        <p><strong>住所：</strong> {{ $contact->address }}</p>
                                        <p><strong>建物名：</strong> {{ $contact->building }}</p>
                                        <p><strong>お問い合わせの種類：</strong> {{ $contact->category->name ?? '未設定' }}</p>
                                        <p><strong>お問い合わせ内容：</strong><br>{{ $contact->detail }}</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>

                </tr>
                @endforeach
            </table>
        </div>
</body>

</html>