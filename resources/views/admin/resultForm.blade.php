@extends('layout')

@section('content')
<div class="container">
  <h2>結果入力</h2>
  <div class="container">
    <h3><span class="label label-default">{{ $eventRecord['eventName'] }}</span></h3>
    <form class="form" action="{{ route('submitResult', ['eventId' => $eventRecord['eventId'],]) }}" method="POST">
      {{ csrf_field() }}
      @foreach ($eventRecord['raceRecords'] as $raceRecord)
      <div class="container">
        <h4> <span class="label label-primary">第{{ $raceRecord['No'] }}レース</span>
          <span>{{$raceRecord['startTime']}}-</span></h4>
          @if (!is_null($raceRecord['entryRecords']))
          <div class="container">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th class="col-xs-1">レーン</th>
                    <th class="col-xs-3">氏名</th>
                    <th class="col-xs-2">年齢</th>
                    <th class="col-xs-3">記録</th>
                    <th class="col-xs-3">順位</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($raceRecord['entryRecords'] as $entryRecord)
                <tr>
                  <td>1</td>
                  <td>{{$entryRecord['playerName']}}</td>
                  <td>{{$entryRecord['age']}}</td>
                  <td>
                    <label class="sr-only" for="min[{{ $entryRecord['entryId'] }}]">分</label>
                    <input type="text" class="input-time" id="min[{{$entryRecord['entryId']}}]" name="min[{{$entryRecord['entryId']}}]">
                    <span>分</span>
                    <label class="sr-only" for="sec[{{ $entryRecord['entryId'] }}]">秒</label>
                    <input type="text" class="input-time" id="sec[{{ $entryRecord['entryId'] }}]" name="sec[{{ $entryRecord['entryId'] }}]">
                    <span>.</span>
                    <label class="sr-only" for="msec[{{ $entryRecord['entryId'] }}]">ミリ秒</label>
                    <input type="text" class="input-time" id="msec[{{ $entryRecord['entryId'] }}]" name="msec[{{ $entryRecord['entryId'] }}]">
                    <span>秒</span>
                  </td>
                  <td>{{$entryRecord['rank']}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        @endif
      </div>
      @endforeach
      <div class="col-xs-1 col-xs-offset-7">
        <input class="btn btn-warning" type="submit" value="結果送信">
      </div>
    </form>
  </div>
</div>
@endsection
