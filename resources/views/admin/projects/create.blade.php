@extends('layouts/admin')
@section('content')

<h1 class="text-center">Aggiungi Progetto</h1>
<div class="container w-50">
    <form action="{{route('admin.projects.store')}}" method="POST" class="py-5">
      @csrf
    
      <div class="mb-3">
        <label for="title">Titolo</label>
        <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{old('title')}}">
          @error('title')
            <div class="invalid-feedback">
              {{$message}}
            </div>
          @enderror
      </div>

      <div class="mb-3">
        <label for="type_id">Tipo</label>
        <select name="type_id" id="type_id" class="form-select @error('type_id') is-invalid @enderror">
  
          <option>Nessuna</option>
  
          @foreach ($types as $type)
              <option value="{{$type->id}}" {{$type->id == old('type_id') ? 'selected' : ''}}>{{$type->name}}</option>
          @endforeach
  
        </select>
        @error('type_id')
          <div class="invalid-feedback">
            {{$message}}
          </div>
        @enderror
      </div>

      <div class="mb-3 form-group">
        <h4>Tecnologie</h4>
  
        <div class="form-check">
          @foreach($technologies as $technology)
            <input class="@error('technology') is-invalid @enderror" id="technology_{{$technology->id}}" name="technologies[]" type="checkbox" value="{{$technology->id}}" @checked(in_array($technology->id, old('technologies', [])))>
            <label for="technology_{{$technology->id}}">{{$technology->name}}</label>
          @endforeach
        </div>
        @error("technologies")
        
        <div class="text-danger">
          {{$message}}
        </div>

        @enderror
  
      </div>
    
      <div class="mb-3">
        <label for="content">Contenuto</label>
        <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" value="{{old('content')}}"></textarea>
          @error('content')
            <div class="invalid-feedback">
              {{$message}}
            </div>
          @enderror
      </div>
    
      <button type="submit" class="btn btn-primary">Aggiungi</button>
    
    </form>
</div>

@endsection