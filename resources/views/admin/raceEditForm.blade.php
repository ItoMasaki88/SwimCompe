@extends('layout')

@section('content')
<div class="container">
  <h2>スケジュール編集</h2>
  <form class="form" action="{{ route('editRace') }}" method="post">
    {{ csrf_field() }}
    @foreach ($eventRecords as $eventRecord)
    <div class="container">
      <h3>
        <span class="label label-default">{{ $eventRecord['eventName'] }}</span>
      </h3>
      @foreach ($eventRecord['raceRecords'] as $raceRecord)
      <div class="container">
        <div class="row">
          <h5>
            <span class="label label-primary">第{{ $raceRecord['No'] }}レース</span>
            <span>　{{$raceRecord['startTime']}}　→　</span>
            <label class="sr-only" for="day[{{ $raceRecord['raceId'] }}]">日目</label>
            <input type="int" class="input-time" id="day[{{ $raceRecord['raceId'] }}]" name="day[{{ $raceRecord['raceId'] }}]">
            <span>日目　</span>
            <label class="sr-only" for="hour[{{ $raceRecord['raceId'] }}]">時間</label>
            <input type="int" class="input-time" id="hour[{{ $raceRecord['raceId'] }}]" name="hour[{{ $raceRecord['raceId'] }}]">
            <span>：</span>
            <label class="sr-only" for="min[{{ $raceRecord['raceId'] }}]">分</label>
            <input type="int" class="input-time" id="min[{{ $raceRecord['raceId'] }}]" name="min[{{ $raceRecord['raceId'] }}]">
          </h5>
        </div>
      </div>
      @endforeach
    </div>
    @endforeach
    <div class="col-xs-1 col-xs-offset-5">
      <input class="btn btn-warning" type="submit" value="送信">
    </div>
  </form>
</div>
@endsection
