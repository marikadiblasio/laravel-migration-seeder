@extends('layouts.app')

@section('content')
<main>
    <h1>I treni di oggi:</h1>
    <div class="container">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Stazione di Partenza</th>
                <th scope="col">Stazione di Arrivo</th>
                <th scope="col">Orario di Partenza</th>
                <th scope="col">Orario di Arrivo</th>
                <th scope="col">Compagnia</th>
                <th scope="col">Codice treno</th>
                <th scope="col">Carrozze</th>
                <th scope="col">In orario</th>
                <th scope="col">Cancellato</th>
              </tr>
            </thead>
            @foreach ($trains as $train)
            <tbody>
              <tr>
                <td scope="row">{{$train->departure_station}}</td>
                <td>{{$train->arrival_station}}</td>
                <td>{{substr($train->departure_time, 0,-3)}}</td>
                <td>{{substr($train->arrival_time, 0,-3)}}</td>
                <td>{{$train->company}}</td>
                <td>{{$train->train_code}}</td>
                <td>{{$train->carriage_num}}</td>
                <td>{{$train->onTime}}</td>
                <td>{{$train->cancelled}}</td>
              </tr>
            </tbody>
            @endforeach
          </table>
    </div>
</main>
@endsection
