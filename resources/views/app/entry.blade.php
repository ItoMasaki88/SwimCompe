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
        @if (Auth::check())
        <th>エントリー状況</th>
        @endif
      </tr>
      @foreach($eventsAndStatuses as $eventAndStatus)
      <tr>
        <td>{{$eventAndStatus['event']->id}}</td>
        <td>{{$eventAndStatus['event']->event_name}}</td>
        <td>{{$eventAndStatus['event']->sex}}</td>
        <td>{{$eventAndStatus['event']->age_division}}</td>
        <td>{{$eventAndStatus['event']->player_type}}</td>
        <td>0/{{$eventAndStatus['event']->persons}}</td>
        @if (Auth::check())
        <td>
          @if ($eventAndStatus['status']==1)
          <div class="btn btn-primary">
            エントリーする
          </div>
          @elseif ($eventAndStatus['status']==2)
          <div class="btn btn-warninng" disabled>
            エントリー済
          </div>
          @elseif ($eventAndStatus['status']==0)
          <div class="btn btn-danger" disabled>
            エントリー不可
          </div>
          @else

          @endif
        </td>
        @endif
      </tr>
      @endforeach
    </table>
  </div>
@endsection
