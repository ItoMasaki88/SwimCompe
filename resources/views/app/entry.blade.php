@extends('layout')

@section('content')
  <div class="container">
    <h2>種目一覧</h2>
    <table class="table table-light">
      <tr>
        <th>ID</th>
        <th>種目名</th>
        <th>性別</th>
        <th>年齢区分</th>
        <th>出場形態</th>
        <th>エントリー数/出場枠</th>
        <th></th>
      </tr>
      @foreach($events as $event)
      <tr>
        <td>{{$event->id}}</td>
        <td>{{$event->event_name}}</td>
        <td>{{$event->sex}}</td>
        <td>{{$event->age_division}}</td>
        <td>{{$event->player_type}}</td>
        <td>0/{{$event->persons}}</td>
        <td> <div class="btn btn-primary">エントリーする</div> </td>
      </tr>
      @endforeach
    </table>
  </div>
@endsection
