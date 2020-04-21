@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">
          <div class="panel-heading">会員登録</div>
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
                <label class="control-label" for="sex">性別</label>
                <div class="custom-control custom-radio">
                  <input type="checkbox" class="custom-control-input" id="custom-radio-1">
                  <label class="custom-control-label" for="custom-radio-1">男性</label>
                </div>
                <div class="custom-control custom-radio">
                  <input type="checkbox" class="custom-control-input" id="custom-radio-2">
                  <label class="custom-control-label" for="custom-radio-2">女性</label>
                </div>
              </div>
              <div class="form-group">
                <label for="age">年齢</label>
                <select class="custom-select custom-select-lg">
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
