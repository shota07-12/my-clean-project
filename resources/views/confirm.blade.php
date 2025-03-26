<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>確認画面</title>
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <div class="text-center my-4">
        <h1 class="title">FashionablyLate</h1>
        <p class="sub-title">Confirm</p>
    </div>
</head>

<body>

    <div class="form-wrapper">
        <form method="POST" action="/thanks">
            @csrf

            <div class="form-group">
                <label>お名前：</label>
                <p>{{ $data['last_name'] }} {{ $data['first_name'] }}</p>
                <input type="hidden" name="last_name" value="{{ $data['last_name'] }}">
                <input type="hidden" name="first_name" value="{{ $data['first_name'] }}">
            </div>

            <div class="form-group">
                <label>性別：</label>
                <p>{{ $data['gender'] == 1 ? '男性' : ($data['gender'] == 2 ? '女性' : 'その他') }}</p>
                <input type="hidden" name="gender" value="{{ $data['gender'] }}">
            </div>

            <div class="form-group">
                <label>メールアドレス：</label>
                <p>{{ $data['email'] }}</p>
                <input type="hidden" name="email" value="{{ $data['email'] }}">
            </div>

            <div class="form-group">
                <label>電話番号：</label>
                <p>{{ $data['tel'] }}</p>
                <input type="hidden" name="tel" value="{{ $data['tel'] }}">
            </div>

            <div class="form-group">
                <label>住所：</label>
                <p>{{ $data['address'] }}</p>
                <input type="hidden" name="address" value="{{ $data['address'] }}">
            </div>

            <div class="form-group">
                <label>建物名：</label>
                <p>{{ $data['building'] }}</p>
                <input type="hidden" name="building" value="{{ $data['building'] }}">
            </div>

            <div class="form-group">
                <label>お問い合わせの種類：</label>
                <p>{{ $data['category_id'] }}</p>
                <input type="hidden" name="category_id" value="{{ $data['category_id'] }}">
            </div>

            <div class="form-group">
                <label>お問い合わせ内容：</label>
                <p>{{ $data['detail'] }}</p>
                <input type="hidden" name="detail" value="{{ $data['detail'] }}">
            </div>

            <div class="button-wrap">
                <button type="submit" class="btn btn-secondary">送信</button>
            </div>
        </form>

        <div class="button-wrap">
            <button onclick="history.back()" class="btn btn-secondary">戻る</button>
        </div>
    </div>
</body>

</html>