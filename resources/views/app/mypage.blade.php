@extends('layout')

@section('content')
  <div class="container">
    <h2>{{Auth::user()->name}}さんのマイページ</h2>
    <table>
      <tr>
        <td>性別</td>
        <td>:</td>
        <td>{{Auth::user()->text_sex}}</td>
      </tr>
      <tr>
        <td>年齢</td>
        <td>:</td>
        <td>{{Auth::user()->age}}</td>
      </tr>
    </table>
    <h3>エントリー種目</h3>
    <div class="table-responsible">
      <table class="table table-light">
        <thead>
          <tr>
            <th>レースID</th>
            <th>種目</th>
            <th>時間</th>
            <th>記録</th>
            <th>順位</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($entries as $entry)
          <tr>
            <td>{{$entry->race->id}}</td>
            <td>{{$entry->race->event->event_name}}</td>
            <td>{{$entry->race->start_time}}</td>
            <td>{{$entry->record_time}}</td>
            <td>{{$entry->rank}}</td>
            <td>
              <form action="{{ route('deleteEntry', ['entry_id' => $entry->id,]) }}" method="POST">
                {{ csrf_field() }}
                <input class="btn btn-danger" type="submit" value="辞退する">
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection
