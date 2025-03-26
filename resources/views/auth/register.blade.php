<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <div class="text-center position-relative mb-4 header">
        <div class="header-inner">
            <h1>FashionablyLate</h1>
        </div>

        <div class="header-link">
            <a href="{{ route('login') }}" class="btn-register">login</a>
        </div>
    </div>

    <div class="page-title">
        <p>Register</p>
    </div>
</head>

<body>
    <div class="login-wrapper">
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
    </div>
</body>

</html>