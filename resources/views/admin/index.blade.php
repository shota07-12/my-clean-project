<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理画面 - お問い合わせ一覧</title>
</head>

<body>
    <h1>お問い合わせ一覧</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>氏名</th>
            <th>性別</th>
            <th>メールアドレス</th>
            <th>電話番号</th>
            <th>お問い合わせの種類</th>
            <th>詳細</th>
            <th>作成日</th>
        </tr>
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
            <td>{{ $contact->category_id }}</td>
            <td>{{ $contact->detail }}</td>
            <td>{{ $contact->created_at }}</td>
        </tr>
        @endforeach
    </table>
</body>

</html>