@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">
          <div class="panel-heading">選手登録</div>
          <div class="panel-body">
            @if($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $message)
                  <p>{{ $message }}</p>
                @endforeach
              </div>
            @endif
            <form action="{{ route('register') }}" method="POST">
              <!-- @csrf -->
              {{ csrf_field() }}
              <div class="form-group">
                <label for="email">メールアドレス</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" />
              </div>
              <div class="form-group">
                <label for="name">選手名</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" />
              </div>
              <div class="form-group">
                <label class="control-label">性別</label>
                    <div class="form-check">
                      <input type="radio" value="male" class="custom-check-input" id="male" name="sex">
                      <label class="custom-check-label" for="male">男性</label>
                    </div>
                    <div class="form-check">
                      <input type="radio" value="female" class="custom-check-input" id="female" name="sex">
                      <label class="custom-check-label" for="female">女性</label>
                    </div>
              </div>
              <div class="form-group">
                <label for="age">年齢</label>
                <select class="form-control" id="age" name="age">
                  <option selected>選択してください</option>
                  @for ($i=6; $i<=100; $i++)
                    <option value="{{$i}}">{{$i}}</option>
                  @endfor
                </select>
              </div>
              <div class="form-group">
                <label for="password">パスワード</label>
                <input type="password" class="form-control" id="password" name="password">
              </div>
              <div class="form-group">
                <label for="password-confirm">パスワード（確認）</label>
                <input type="password" class="form-control" id="password-confirm" name="password_confirmation">
              </div>
              <div class="text-right">
                <button type="submit" class="btn btn-primary">送信</button>
              </div>
            </form>
          </div>
        </nav>
      </div>
    </div>
  </div>
@endsection
