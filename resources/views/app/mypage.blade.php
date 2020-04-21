@extends('layout')

@section('content')
  <div class="container">
    <h2>マイページ</h2>
    <h3>エントリー種目</h3>
    <table class="table table-light">
      <tr>
        <th>ID</th>
        <th>種目名</th>
        <th>性別</th>
        <th>年齢区分</th>
        <th>出場形態</th>
        <th></th>
      </tr>
      @foreach($events as $event)
      <tr>
        <!-- <td>{{$entry->user_id}}</td> -->
        <td>{{$event->id}}</td>
        <td>{{$event->event_name}}</td>
        <td>{{$event->sex}}</td>
        <td>{{$event->age_division}}</td>
        <td>{{$event->player_type}}</td>
        <td> <div class="btn btn-danger">辞退する</div> </td>
      </tr>
      @endforeach
    </table>
  </div>
@endsection
