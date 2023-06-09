@extends('layouts.admin')
@section('content')
    <h1 class="text-center mt-3 mb-5">Titolo: {{$project->title}}</h1>
    <div class="d-flex justify-content-center">
        @if ($project->image)
            <img class="myImageIndex" src="{{asset('storage/' . $project->image)}}" alt="">
         @else
            <img class="myImageIndex" src="https://www.prolococisanobg.it/wp-content/uploads/2017/10/Non-disponibile-_04.jpg" alt="">
      @endif
    </div>
    <h3 class="text-center mt-3 mb-5">Tipologia: {{$project->type?$project->type->name:'Nessuna tipologia assegnata'}}</h3>
    <div class="text-center">
        <span>Tecnlologie usate per il progetto: </span>
        @foreach ($project->technologies as $technology)
            <span class="badge rounded-pill text-bg-primary">{{$technology->name}}</span>
        @endforeach
    <p class="ms-3 me-3"><span class="fw-bold">Descrizione:</span> {{$project->description}}</p>
    <a href="{{route('admin.projects.index')}}" class="btn btn-primary">Torna alla lista progetti</a>
    </div>
   
@endsection