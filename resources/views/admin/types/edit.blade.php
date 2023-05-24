@extends('layouts.admin')

@section('content')
<div class="container">
  <h1 class="mb-3">Modifica Tipo</h1>
  
  <form action="{{route('admin.types.update', $type)}}" method="POST">
    @csrf
    @method('PUT')
  
  
    <div class="mb-3">
        
      <label for="name">Nome</label>
      <input id="name" name="name" class="form-control @error('name') is-invalid @enderror" type="text" value="{{old('name') ?? $type->name}}">
      @error('name')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror

    </div>
  
    <div class="mb-3">

      <label for="description">Descrizione</label>
      <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror">{{old('description') ?? $type->description}}</textarea>
      @error('description')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror

    </div>

    <button class="btn btn-primary" type="submit">Aggiungi</button>
  
  </form>

</div>

@endsection