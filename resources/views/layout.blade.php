<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Swiming Competition App</title>
  @yield('styles')
  <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
<header>
  <nav class="my-navbar">
    <a class="my-navbar-brand" href="/">Swiming Competition App</a>
    <ul class="nav navbar-nav">
      <li><a class="my-navbar-item" href="/entry">種目一覧（エントリー）</a></li>
      @if(Auth::check())
      @if(Auth::user()->admin == 1)
      <li><a class="my-navbar-item" href="/all">全データ</a></li>
      <li><a class="my-navbar-item" href="/event">種目登録</a></li>
      <li><a class="my-navbar-item" href="/users">ユーザー一覧</a></li>
      @endif
      @endif
    </ul>

    <div class="my-navbar-control">
      @if(Auth::check())
        <span class="my-navbar-item">
          ようこそ, {{ Auth::user()->name }}さん
           <a href="/mypage">マイページ</a>
        </span>
        ｜
        <a href="#" id="logout" class="my-navbar-item">ログアウト</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
        </form>
      @else
        <a class="my-navbar-item" href="{{ route('login') }}">ログイン</a>
        ｜
        <a class="my-navbar-item" href="{{ route('register') }}">選手登録</a>
      @endif
    </div>
  </nav>
</header>
<main>
  @yield('content')
</main>
@if(Auth::check())
  <script>
    document.getElementById('logout').addEventListener('click', function(event) {
      event.preventDefault();
      document.getElementById('logout-form').submit();
    });
  </script>
@endif
@yield('scripts')
</body>
</html>
