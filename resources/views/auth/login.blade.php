<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>ログイン</title>
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <div class="header">
        <div class="header-inner">
            <h1>FashionablyLate</h1>
        </div>
        <div class="header-link">
            <a href="{{ route('register') }}" class="btn-register">register</a>
        </div>
    </div>

    <div class="page-title">
        <p>Login</p>
    </div>
</head>

<body>

    <div class="login-wrapper">

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label>メールアドレス：</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus>
                @error('email') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label>パスワード：</label>
                <input type="password" name="password" required>
                @error('password') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="button-wrap">
                <button type="submit" class="btn btn-secondary">ログイン</button>
            </div>
        </form>
    </div>
</body>

</html>