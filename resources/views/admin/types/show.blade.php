@extends('layouts.admin')

@section('content')

<div class="container py-3">

  <h1>Tutti i post di categoria "{{$type->name}}"</h1>

  @if( count($type->projects) > 0)
  <table class="table table-striped mb-4">
    <thead>
      <th>
        Titolo
      </th>
      <th>
        Slug
      </th>
      <th>

      </th>
    </thead>

    <tbody>

      @foreach($type->projects as $project)
        <tr>
          <td>
            {{$project->title}}
          </td>
          <td>
            {{$project->slug}}
          </td>
          <td>
            <a href="{{route('admin.projects.show', $project)}}"><i class="fa-solid fa-magnifying-glass"></i></a>
          </td>
        </tr>
      @endforeach

    </tbody>
  </table>
  @else

    <em>Nessun project di questa categoria</em>
      
  @endif


  <hr>

  <div class="d-flex justify-content-around">
    <a href="{{route('admin.types.edit', $type)}}" class="btn btn-secondary">Modifica Tipo</a>

    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
      Elimina
    </button>
    
  </div>

</div>


<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="deleteModalLabel">Elimina la categoria</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Sei sicuro di voler eliminare la categoria {{$type->name}}?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
        
        <form action="{{route('admin.types.destroy', $type)}}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Elimina</button>
        </form>

      </div>
    </div>
  </div>
</div>


@endsection