<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問い合わせフォーム</title>
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="text-center my-4">
    </div>

    <div class="contact-wrapper">

        <h1>FashionablyLate</h1>
        <p>Contact</p>

        <form method="POST" action="{{ route('confirm') }}">
            @csrf

            <div class="form-group">
                <label>お名前 ※：</label>
                <div class="form-row">
                    <input type="text" name="last_name" placeholder="姓" value="{{ old('last_name') }}">
                    <input type="text" name="first_name" placeholder="名" value="{{ old('first_name') }}">
                </div>
                @error('last_name') <div class="error">{{ $message }}</div> @enderror
                @error('first_name') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label>性別 ※：</label>
                <div class="gender-options">
                    <label><input type="radio" name="gender" value="1" {{ old('gender', '1') == '1' ? 'checked' : '' }}> 男性</label>
                    <label><input type="radio" name="gender" value="2" {{ old('gender') == '2' ? 'checked' : '' }}> 女性</label>
                    <label><input type="radio" name="gender" value="3" {{ old('gender') == '3' ? 'checked' : '' }}> その他</label>
                </div>
                @error('gender') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label>メールアドレス ※：</label>
                <input type="email" name="email" value="{{ old('email') }}">
                @error('email') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label>電話番号 ※：</label>
                <input type="text" name="tel" value="{{ old('tel') }}">
                @error('tel') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label>住所 ※：</label>
                <input type="text" name="address" value="{{ old('address') }}">
                @error('address') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label>建物名：</label>
                <input type="text" name="building" value="{{ old('building') }}">
            </div>

            <div class="form-group">
                <label>お問い合わせの種類 ※：</label>
                <select name="category_id">
                    <option value="">選択してください</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>
                @error('category_id') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label>お問い合わせ内容 ※：</label>
                <textarea name="detail" rows="3">{{ old('detail') }}</textarea>
                @error('detail') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="button-wrap">
                <button type="submit" class="btn btn-secondary">確認画面へ</button>
            </div>
        </form>

    </div>

</body>

</html>