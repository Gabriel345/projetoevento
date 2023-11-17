@extends('layouts.main')
@section('title', $event->title)
@section('content')

    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div id="image-container" class="col-md-6">
                <img src="/img/events/{{ $event->image }}" alt="capa do evento {{ $event->title }}" class="img-fluid">
            </div>
            <div id="info-container" class="col-md-6">
                <h1>{{ $event->title }}</h1>
                <p class="event-city"><ion-icon name="location-outline"></ion-icon>{{ $event->city }}</p>
                <p class="event-participants"><ion-icon name="people-outline"></ion-icon>x-participantes</p>
                <p class="event-owner"><ion-icon name="star-outline"></ion-icon>{{$eventOwner['name']}}</p>
                <a href="http://" class="btn btn-primary">Confirmar Presença</a>
            </div>
            <div class="col-md-12" id="description-container">
                <h3>Sobre o evento:</h3>
                <p class="event-escription">Dia do Evento {{date('d/m/Y',strtotime($event->date))}}</p>
                <p class="event-escription">{{$event->description}}</p>
            </div>

        </div>
</div>
 @endsection
