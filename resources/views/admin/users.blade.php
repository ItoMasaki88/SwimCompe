@extends('layout')

@section('content')
  <div class="container">
    <h2>ユーザー一覧</h2>
    <table class="table table-light">
      <tr>
        <th>ID</th>
        <th>氏名</th>
        <th>性別</th>
        <th>年齢</th>
        <th>メールアドレス</th>
      </tr>
      @foreach($users as $user)
      <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->text_sex}}</td>
        <td>{{$user->age}}</td>
        <td>{{$user->email}}</td>
      </tr>
      @endforeach
    </table>
  </div>
@endsection
