<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>新規登録</title>
</head>

<body>
    <h1>新規登録</h1>
    <form method="POST" action="/register">
        @csrf
        <label>名前：</label>
        <input type="text" name="name" required><br>

        <label>メールアドレス：</label>
        <input type="email" name="email" required><br>

        <label>パスワード：</label>
        <input type="password" name="password" required><br>

        <label>パスワード（確認）：</label>
        <input type="password" name="password_confirmation" required><br>

        <button type="submit">登録</button>
    </form>
</body>

</html>