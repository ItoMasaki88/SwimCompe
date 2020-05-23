<!DOCTYPE html>
<html lang="ja">
<body>
<main>
  <h3>SwimComep App</h3>
  <p>
    <a href="{{ route('password.reset', ['token' => $token]) }}">ここ</a>からパスワード再設定を行ってください。 <br>
  </p>
  <p>
    本メールに心当たりがない場合は、お手数ですが廃棄していただくようお願いします。
  </p>
</main>
</body>
</html>
