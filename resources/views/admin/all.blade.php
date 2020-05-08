@extends('layout')

@section('content')
<div class="container">
  <h2>全データ一覧</h2>
  @foreach ($eventRecords as $eventRecord)
  <div class="container">
    <h3> <span class="label label-default">{{ $eventRecord['eventName'] }}</span> <small></small> </h3>
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
                <td>{{$entryRecord['recordTime']}}</td>
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
  </div>
  @endforeach
</div>
@endsection
