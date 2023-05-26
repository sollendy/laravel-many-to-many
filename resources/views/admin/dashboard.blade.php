@extends('layouts/admin')

@section('content')
  <h1 class="text-center">Il tuo spazio personale</h1>

  <hr>

  <ul>
    <li><a href="{{route('admin.projects.index')}}">Mostra tutti i progetti</a></li>
    <li><a href="{{route('admin.types.index')}}">Mostra tutti i tipi correlati</a></li>
    <li><a href="{{route('admin.technologies.index')}}">Mostra tutte le tecnologie applicate</a></li>
  </ul>
@endsection