<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <a class="header__logo">
                FashionablyLate</a>
    <div class="container">
        <h2>Contact</h2>

<div class="container">
    <h2>お問い合わせ内容の確認</h2>

    <form method="POST" action="/thanks">
        @csrf

        <!-- 姓名 -->
        <div class="form-group">
            <label for="name">お名前</label>
            <p>{{ $request->last_name }} {{ $request->first_name }}</p>
            <input type="hidden" name="first_name" value="{{ $request->first_name }}">
            <input type="hidden" name="last_name" value="{{ $request->last_name }}">
        </div>

        <!-- 性別 -->
        <div class="form-group">
            <label for="gender">性別</label>
            <p>
                @if ($request->gender == 1)
                    男性
                @elseif ($request->gender == 2)
                    女性
                @else
                    その他
                @endif
            </p>
            <input type="hidden" name="gender" value="{{ $request->gender }}">
        </div>

        <!-- メールアドレス -->
        <div class="form-group">
            <label for="email">メールアドレス</label>
            <p>{{ $request->email }}</p>
            <input type="hidden" name="email" value="{{ $request->email }}">
        </div>

        <!-- 電話番号 -->
        <div class="form-group">
            <label for="tell">電話番号</label>
            <p>{{ $request->tell_part1 }}-{{ $request->tell_part2 }}-{{ $request->tell_part3 }}</p>
            <input type="hidden" name="tell" value="{{ $request->tell_part1 . $request->tell_part2 . $request->tell_part3 }}">
        </div>

        <!-- 住所 -->
        <div class="form-group">
            <label for="address">住所</label>
            <p>{{ $request->address }}</p>
            <input type="hidden" name="address" value="{{ $request->address }}">
        </div>

        <!-- 建物名 -->
        <div class="form-group">
            <label for="building">建物名</label>
            <p>{{ $request->building }}</p>
            <input type="hidden" name="building" value="{{ $request->building }}">
        </div>

        <!-- お問い合わせの種類 -->
        <div class="form-group">
            <label for="category_id">お問い合わせの種類</label>
            <p>
                @switch($request->category_id)
                    @case(1)
                        商品のお届けについて
                        @break
                    @case(2)
                        商品の交換について
                        @break
                    @case(3)
                        商品トラブル
                        @break
                    @case(4)
                        ショップへのお問い合わせ
                        @break
                    @case(5)
                        その他
                        @break
                @endswitch
            </p>
            <input type="hidden" name="category_id" value="{{ $request->category_id }}">
        </div>

        <!-- お問い合わせ内容 -->
        <div class="form-group">
            <label for="detail">お問い合わせ内容</label>
            <p>{{ $request->detail }}</p>
            <input type="hidden" name="detail" value="{{ $request->detail }}">
        </div>

        <!-- 修正と送信ボタン -->
        <div class="form-group">
            <a href="{{ route('contact.form') }}" class="btn btn-secondary">修正</a>
            <button type="submit" class="btn btn-primary">送信</button>
        </div>
    </form>
</div>
@endsection