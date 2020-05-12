@extends('layout')

@section('content')
  <div class="container">
    <h2>ユーザー一覧</h2>
    <div class="container">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th class="col-xs-1">ID</th>
              <th class="col-xs-3">氏名</th>
              <th class="col-xs-1">性別</th>
              <th class="col-xs-1">年齢</th>
              <th class="col-xs-3">メールアドレス</th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $user)
            <tr>
              <td>{{$user->id}}</td>
              <td>{{$user->name}}</td>
              <td>{{$user->text_sex}}</td>
              <td>{{$user->age}}</td>
              <td>{{$user->email}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
