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
            <form action="{{ route('makeEvent') }}" method="POST">
              <!-- @csrf -->
              {{ csrf_field() }}
              <div class="form-group">
                <label for="style">泳法</label>
                <select class="form-control" id="style" name="style">
                  <option selected>選択してください</option>
                  <option value="1">自由形</option>
                  <option value="2">平泳ぎ</option>
                  <option value="3">背泳ぎ</option>
                  <option value="4">バタフライ</option>
                  <option value="5">メドレー</option>
                </select>
              </div>
              <div class="form-group">
                <label for="age">年齢区分</label>
                <select class="form-control" id="age" name="age">
                  <option selected>選択してください</option>
                  <option value="1">小学生</option>
                  <option value="2">中学生</option>
                  <option value="3">高校生</option>
                  <option value="4">成人</option>
                  <option value="5">ミドル</option>
                  <option value="6">マスター</option>
                </select>
              </div>
              <div class="form-group">
                <label for="age">距離</label>
                <select class="form-control" id="distance" name="distance">
                  <option selected>選択してください</option>
                  <option value="1">50m</option>
                  <option value="2">100m</option>
                  <option value="3">200m</option>
                </select>
              </div>
              <div class="form-group">
                <label for="sex">性別</label>
                <select class="form-control" id="sex" name="sex">
                  <option selected>選択してください</option>
                  <option value="1">男子</option>
                  <option value="2">女子</option>
                  <option value="3">混合</option>
                </select>
              </div>
              <div class="form-group">
                <label class="control-label">出場形態</label>
                <div class="form-check">
                  <input type="radio" value="True" class="custom-check-input" id="individual" name="entryType">
                  <label class="custom-check-label" for="male">個人</label>
                </div>
                <div class="form-check">
                  <input type="radio" value="False" class="custom-check-input" id="team" name="entryType">
                  <label class="custom-check-label" for="female">団体</label>
                </div>
              </div>
              <div class="form-group">
                <label for="players">出場人数</label>
                <select class="form-control" id="players" name="players">
                  <option selected>選択してください</option>
                  @for ($i=1; $i < 51; $i++)
                  <option value="{{ $i }}">{{ $i }}人</option>
                  @endfor
                </select>
              </div>
              <label for="races">開始時間</label>
              <div class="form-group">
            		<label class="sr-only" for="date">日目</label>
            		<input type="text" class="form-control" id="date" name="date">
            	</div>
              <span>日目</span>
              <div class="form-group">
            		<label class="sr-only" for="hour">時</label>
            		<input type="text" class="form-control" id="hour" name="hour">
            	</div>
              <span>時</span>
              <div class="form-group">
            		<label class="sr-only" for="minute">分</label>
            		<input type="text" class="form-control" id="minute" name="minute">
            	</div>
              <span>分</span>
              <div class="text-right">
                <button type="submit" class="btn btn-primary">作成</button>
              </div>
            </form>
          </div>
        </nav>
      </div>
    </div>
  </div>
@endsection
