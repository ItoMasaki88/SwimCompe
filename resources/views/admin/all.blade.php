@extends('layout')

@section('content')
<div class="container">
  <h2>全データ一覧</h2>
  @foreach ($events as $event)
  <div class="container">
    <h3> <span class="label label-default">{{ $event->event_name }}</span></h3>
    @foreach ($event->races as $race)
    <div class="container">
      <h4> <span class="label label-primary">第{{ $race->number }}レース</span>
      <span>{{$race->startTime}}-</span></h4>
      @if (!is_null($race->entries))
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
              @foreach ($race->entries as $entry)
              <tr>
                <td>1</td>
                <td>{{optional($entry->player)->name}}</td>
                <td>{{optional($entry->player)->age}}</td>
                <td>{{$entry->record_time}}</td>
                <td>{{$entry->rank}}</td>
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
