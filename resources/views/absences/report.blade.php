@extends('layouts.app')

@section('content')
<div class="container">
  <div id="crud_box">
  <h2 id="crud_header">Absences</h2>
  <hr class="crud_hr"/>

  <div class="row">
    <div class="col table-responsive">
      <table class="table table-striped" id="recentTab">
        <thead class="crud_head">
    <tr>
      <th scope="col">Clock #</th>
      <th scope="col">Name</th>
      <th scope="col">Start Date</th>
      <th scope="col">End Date</th>
    </tr>
  </thead>
  <tbody>
      @foreach($absences as $absence)
        <tr>
          <td><h5>{{ $absence->clock_number }}</h5></td>
          <td><h5>{{ $absence->firstName }} {{ $absence->lastName }}</h5></th>
          <td><h5>{{ $absence->start }}</h5></td>
          <td><h5>
            @if ($absence->end == null)
              {{ $absence->start }}
            @else
            {{ $absence->end }}
            @endif
          </h5></td>
        </tr>
      @endforeach
    </tbody>
  </table>
    </div>
  </div>
  </div>
</div>
@endsection
