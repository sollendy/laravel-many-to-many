@extends('layouts/admin')

@section('content')

<div class="main pt-5">
  <h1>{{$project->title}}</h1>
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