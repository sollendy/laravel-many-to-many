@extends('layouts/admin')

@section('content')

<h1 class="text-center mt-3">Il tuo elenco</h1>
<table class="mt-5 table table-striped">
  <thead>
    <th>
      Titolo
    </th>
    <th>Contenuto</th>
    <th>
      Slug
    </th>
    <th>
      Comandi
    </th>
  </thead>

  <tbody>

    @foreach($projects as $project)
    <tr >
      <td>{{$project->title}}</td>
      <td>{{$project->content}}</td>
      <td>{{$project->slug}}</td>
      <td><a href="{{route('admin.projects.show', $project->slug)}}"><i class="fa-solid fa-magnifying-glass"></i></a></td>
    </tr>
    @endforeach
</tbody>
</table>
<div class="end-btn mb-3 d-flex justify-content-center">
    <a href="{{route("admin.projects.create")}}">
        <button class="btn btn-primary">Aggiungi Progetto</button>
    </a>
</div>
@endsection