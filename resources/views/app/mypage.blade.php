@extends('layout')

@section('content')
  <div class="container">
    <h2>{{Auth::user()->name}}さんのマイページ</h2>
    <table>
      <tr>
        <td>性別</td>
        <td>:</td>
        <td>{{Auth::user()->sex}}</td>
      </tr>
      <tr>
        <td>年齢</td>
        <td>:</td>
        <td>{{Auth::user()->age}}</td>
      </tr>
    </table>
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
