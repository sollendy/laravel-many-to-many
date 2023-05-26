@extends('layouts.admin')

@section('content')

  <div class="container py-3">
    <h1>Tecnologie</h1>

    <table class="table table-striped">

      <thead>
        <th>Nome</th>
        <th>Progetti Correlati</th>
      </thead>

      <tbody>

        @foreach($technologies as $technology)
        
          <tr>
            <td>{{$technology->name}}</td>
            <td>{{ count($technology->projects) }}</td>
            <td><a href="{{route('admin.technologies.show', $technology)}}"><i class="fa-solid fa-magnifying-glass"></i></a></td>
          </tr>

        @endforeach

      </tbody>

    </table>

    <div class="d-flex justify-content-center py-3">
      <a href="{{route('admin.technologies.create')}}" class="btn btn-primary">Aggiungi una tecnologia</a>
    </div>
  </div>

@endsection 