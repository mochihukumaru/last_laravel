<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <a class="header__logo">
                FashionablyLate</a>
    <div class="container">
        <h2>Contact</h2>
        <form action="/contacts/confirm" method="POST">
            @csrf
            <div class="form-group">
                <label for="last_name">お名前 ※</label>
                <div class="name-fields">
                    <input type="text" name="last_name" id="last_name" placeholder="例: 山田" value="{{ old('last_name') }}">
                    <input type="text" name="first_name" id="first_name" placeholder="例: 太郎" value="{{ old('first_name') }}">
                </div>
                @error('last_name')
                    <div class="error">{{ $message }}</div>
                @enderror
                @error('first_name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>性別 ※</label>
                <input type="radio" name="gender" value="1" {{ old('gender') == 1 ? 'checked' : '' }}> 男性
                <input type="radio" name="gender" value="2" {{ old('gender') == 2 ? 'checked' : '' }}> 女性
                <input type="radio" name="gender" value="3" {{ old('gender') == 3 ? 'checked' : '' }}> その他
                @error('gender')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">メールアドレス ※</label>
                <input type="email" name="email" id="email" placeholder="例: test@example.com" value="{{ old('email') }}">
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="tell">電話番号 <span class="text-danger">※</span></label>
                <div class="d-flex">
                    <input type="text" name="fast_tell" class="form-control" maxlength="4" placeholder="例: 090" value="{{ old('fast_tell') }}">
                    <span class="mx-2">-</span>
                    <input type="text" name="middle_tell" class="form-control" maxlength="4" placeholder="例: 1234" value="{{ old('middle_tell') }}">
                    <span class="mx-2">-</span>
                    <input type="text" name="last_tell" class="form-control" maxlength="4" placeholder="例: 5678" value="{{ old('last_tell') }}">
                </div>
            @if ($errors->has('tell'))
            <span class="text-danger">{{ $errors->first('tell') }}</span>
            @endif
            </div>

            <div class="form-group">
                <label for="address">住所 ※</label>
                <input type="text" name="address" id="address" placeholder="例: 東京都渋谷区" value="{{ old('address') }}">
                @error('address')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="building">建物名</label>
                <input type="text" name="building" id="building" placeholder="例: 千駄ヶ谷マンション101" value="{{ old('building') }}">
            </div>

            <div class="form-group">
                <label for="category_id">お問い合わせの種類 ※</label>
                <select name="category_id" id="category_id">
                    <option value="">選択してください</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->content }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="detail">お問い合わせ内容 ※</label>
                <textarea name="detail" id="detail" placeholder="お問い合わせをご記載ください">{{ old('detail') }}</textarea>
                @error('detail')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="submit-btn">確認画面</button>
        </form>
    </div>
</body>
</html>