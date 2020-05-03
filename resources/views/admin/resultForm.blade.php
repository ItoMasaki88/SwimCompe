@extends('layout')

@section('content')
<div class="container">
  <div class="row">
    <div class="col col-md-offset-3 col-md-6">
      <nav class="panel panel-default">
        <div class="panel-heading">結果入力</div>
        <div class="panel-body">
          @if($errors->any())
            <div class="alert alert-danger">
              @foreach($errors->all() as $message)
                <p>{{ $message }}</p>
              @endforeach
            </div>
          @endif
          <!-- @csrf -->
          {{ csrf_field() }}
          <h3>エントリー種目</h3>
          <div class="table-responsive">
            <table class="table table-light">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>種目名</th>
                  <th>性別</th>
                  <th>年齢区分</th>
                  <th>出場形態</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
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
              </tbody>
            </table>
          </div>

        </div>
      </nav>
    </div>
  </div>
</div>
@endsection
