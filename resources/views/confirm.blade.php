<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>確認画面</title>
</head>

<body>
    <h1>お問い合わせ内容の確認</h1>

    <table border="1">
        <tr>
            <th>姓</th>
            <td>{{ $data['last_name'] }}</td>
        </tr>
        <tr>
            <th>名</th>
            <td>{{ $data['first_name'] }}</td>
        </tr>
        <tr>
            <th>性別</th>
            <td>{{ $data['gender'] == 1 ? '男性' : ($data['gender'] == 2 ? '女性' : 'その他') }}</td>
        </tr>
        <tr>
            <th>メールアドレス</th>
            <td>{{ $data['email'] }}</td>
        </tr>
        <tr>
            <th>電話番号</th>
            <td>{{ $data['tel'] }}</td>
        </tr>
        <tr>
            <th>住所</th>
            <td>{{ $data['address'] }}</td>
        </tr>
        <tr>
            <th>建物名</th>
            <td>{{ $data['building'] }}</td>
        </tr>
        <tr>
            <th>お問い合わせの種類</th>
            <td>{{ $data['category_id'] }}</td>
        </tr>
        <tr>
            <th>お問い合わせ内容</th>
            <td>{{ $data['detail'] }}</td>
        </tr>
    </table>

    <form action="/thanks" method="POST">
        @csrf
        <input type="hidden" name="last_name" value="{{ $data['last_name'] }}">
        <input type="hidden" name="first_name" value="{{ $data['first_name'] }}">
        <input type="hidden" name="gender" value="{{ $data['gender'] }}">
        <input type="hidden" name="email" value="{{ $data['email'] }}">
        <input type="hidden" name="tel" value="{{ $data['tel'] }}">
        <input type="hidden" name="address" value="{{ $data['address'] }}">
        <input type="hidden" name="building" value="{{ $data['building'] }}">
        <input type="hidden" name="category_id" value="{{ $data['category_id'] }}">
        <input type="hidden" name="detail" value="{{ $data['detail'] }}">
        <button type="submit">送信</button>
    </form>

    <button onclick="history.back()">戻る</button>
</body>

</html>