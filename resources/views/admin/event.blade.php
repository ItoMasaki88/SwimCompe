@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">
          <div class="panel-heading">種目登録</div>
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
                <label for="age">泳法</label>
                <select class="form-control" id="age" name="age">
                  <option selected>選択してください</option>
                  <option value="1">自由形</option>
                  <option value="2">平泳ぎ</option>
                  <option value="3">背泳ぎ</option>
                  <option value="4">バタフライ</option>
                  <option value="5">メドレー</option>
                </select>
              </div>
              <div class="form-group">
                <label for="age">距離</label>
                <select class="form-control" id="age" name="age">
                  <option selected>選択してください</option>
                  <option value="1">50m</option>
                  <option value="2">100m</option>
                  <option value="3">200m</option>
                </select>
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
