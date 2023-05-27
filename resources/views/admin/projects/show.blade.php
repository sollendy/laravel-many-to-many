@extends('layouts/admin')

@section('content')

<div class="container">
  <div class="text-center pt-3">
    <img src="{{ asset('storage/' . $project->cover_image) }}" alt="" class="w-50">
  </div>

<div class="main px-3 pt-5">
  <h1>{{$project->title}}</h1>
  <h5>tipo: {{$project->type->name ?? 'nessuno'}}</h5>
  <h6>Tecnologie: @foreach ($project->technologies as $technology)
    {{$technology->name . ' '}}
@endforeach</h6>
  <hr>
  <p>
    {{$project->content}}
  </p>
</div>
<div class="row w-75 mx-auto mb-1">
  <div class="col-6">
    <a href="{{route('admin.projects.edit', $project->slug)}}">
      <button class="btn btn-primary">Modifica Progetto</button>
      </a>
  </div>
  <div class="col-6">

    <form action="{{route('admin.projects.destroy', $project->slug)}}" method="POST">
      @csrf
      @method('DELETE')
      <button class="btn btn-danger" type="submit">ELIMINA</button>
    </form>

  </div>
</div>
@endsection