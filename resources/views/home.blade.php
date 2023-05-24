@extends('layouts.app')

@section('content')
<main>
    <div class="container">
    <h1 class="text-center text-danger py-2">I treni di oggi</h1>
        <table class="table mb-5">
            <thead>
              <tr class="bg-success">
                <th scope="col">Stazione di Partenza</th>
                <th scope="col">Stazione di Arrivo</th>
                <th scope="col">Orario di Partenza</th>
                <th scope="col">Orario di Arrivo</th>
                <th scope="col">Compagnia</th>
                <th scope="col">Codice treno</th>
                <th scope="col">Carrozza</th>
                <th scope="col">In orario</th>
                <th scope="col">Cancellato</th>
              </tr>
            </thead>
            @foreach ($trains as $train)
            <tbody>
              <tr class="text-center border-success">
                <td scope="row">{{$train->departure_station}}</td>
                <td>{{$train->arrival_station}}</td>
                <td>{{substr($train->departure_time, 0,-3)}}</td>
                <td>{{substr($train->arrival_time, 0,-3)}}</td>
                <td>{{$train->company}}</td>
                <td>{{$train->train_code}}</td>
                <td>{{$train->carriage_num}}</td>
                @if(!$train->cancelled)
                    @if($train->onTime)
                    <td class="bg-success">In Orario</td>
                    @else
                    <td class="bg-warning">In Ritardo</td>
                    @endif
                @else
                <td></td>
                <td class="bg-danger">Cancellato</td>
                @endif
              </tr>
            </tbody>
            @endforeach
          </table>
    </div>
</main>
@endsection
