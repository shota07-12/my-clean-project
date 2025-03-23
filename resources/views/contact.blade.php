<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問い合わせフォーム</title>
</head>

<body>
    <h1>お問い合わせフォーム</h1>

    <form action="/confirm" method="POST">
        @csrf
        <label>姓：</label>
        <input type="text" name="last_name" required><br>

        <label>名：</label>
        <input type="text" name="first_name" required><br>

        <label>性別：</label>
        <input type="radio" name="gender" value="1" checked> 男性
        <input type="radio" name="gender" value="2"> 女性
        <input type="radio" name="gender" value="3"> その他<br>

        <label>メールアドレス：</label>
        <input type="email" name="email" required><br>

        <label>電話番号：</label>
        <input type="text" name="tel" required><br>

        <label>住所：</label>
        <input type="text" name="address"><br>

        <label>建物名：</label>
        <input type="text" name="building"><br>

        <label>お問い合わせの種類：</label>
        <select name="category_id" required>
            <option value="">選択してください</option>
            <option value="1">商品のお届けについて</option>
            <option value="2">商品の交換について</option>
            <option value="3">商品トラブル</option>
            <option value="4">ショップへのお問い合わせ</option>
            <option value="5">その他</option>
        </select><br>

        <label>お問い合わせ内容：</label>
        <textarea name="detail" required></textarea><br>

        <button type="submit">確認画面へ</button>
    </form>
</body>

</html>