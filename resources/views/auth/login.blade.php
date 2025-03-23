<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>ログイン</title>
</head>

<body>
    <h1>ログイン</h1>
    <form method="POST" action="/login">
        @csrf
        <label>メールアドレス：</label>
        <input type="email" name="email" required><br>

        <label>パスワード：</label>
        <input type="password" name="password" required><br>

        <button type="submit">ログイン</button>
    </form>
</body>

</html>