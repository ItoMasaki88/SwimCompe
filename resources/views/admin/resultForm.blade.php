@extends('layout')

@section('content')
<div class="container">
  <h2>全データ一覧</h2>
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
                    <th>レーン</th>
                    <th>氏名</th>
                    <th>年齢</th>
                    <th>記録</th>
                    <th>順位</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($raceRecord['entryRecords'] as $entryRecord)
                <tr>
                  <td>1</td>
                  <td>{{$entryRecord['playerName']}}</td>
                  <td>{{$entryRecord['age']}}</td>
                  <td>
                  	<div class="form-group">
                      <label class="sr-only" for="min[{{ $entryRecord['entryId'] }}]">分</label>
                  		<input type="text" class="form-control" id="min[{{$entryRecord['entryId']}}]" name="min[{{$entryRecord['entryId']}}]">
                      <span>分</span>
                  		<label class="sr-only" for="sec[{{ $entryRecord['entryId'] }}]">秒</label>
                  		<input type="text" class="form-control" id="sec[{{ $entryRecord['entryId'] }}]" name="sec[{{ $entryRecord['entryId'] }}]">
                      <span>.</span>
                  		<label class="sr-only" for="msec[{{ $entryRecord['entryId'] }}]">ミリ秒</label>
                  		<input type="text" class="form-control" id="msec[{{ $entryRecord['entryId'] }}]" name="msec[{{ $entryRecord['entryId'] }}]">
                      <span>秒</span>
                  	</div>
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
      <input class="btn btn-primary" type="submit" value="送信">
    </form>
  </div>
</div>
@endsection
