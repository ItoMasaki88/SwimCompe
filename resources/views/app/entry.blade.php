@extends('layout')

@section('content')
  <div class="container">
    <h2>種目一覧</h2>
    <div class="table-responsible">
      <table class="table table-light">
        <thead>
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
        </thead>
        <tbody>
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
              <form action="{{ route('submitEntry', [
                'user_id' => Auth::user()->id,
                'event_id' => $eventAndStatus['event']->id,
                ]) }}" method="POST">
                {{ csrf_field() }}
                <input class="btn btn-primary" type="submit" value="エントリーする">
              </form>
              @elseif ($eventAndStatus['status']==2)
              <div class="btn btn-success" disabled>
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
        </tbody>
      </table>
    </div>
  </div>
@endsection
