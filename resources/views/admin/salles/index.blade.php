@extends('layout.app')
@section('content')
<style>

    .custom-pagination {
        /* color: #0fb6cc;
        border: 1px solid #7e1414; */
        margin: 0 2px;
    }
    /* .custom-pagination  {
        background-color: #0fb6cc;
        border-color: #0fb6cc;
        color: white;
    } */

    .custom-pagination .pagination {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }
    .card-header {
    height: auto; /* Or a specific value like 60px */
}

#add-btn {
    position: absolute;
    right: 10px;
    /* top: 10px; */
}


</style>
<div class="app-content mt-5">
    <!--begin::Container-->
    <div class="container-fluid">
      <!--begin::Row-->
      <div class="row">
        <div class="col-md">
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title mb-0" style="margin-bottom: 0;">Liste des salles</h3>
                <a href="{{ route('salles.create') }}" id="add-btn" class="btn btn-primary" style="margin: 0;">Ajouter</a>
            </div>


            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">Id</th>
                     <th style="width: 10px">designation</th>
                      <th style="width: 10px">capacite</th>
                       <th style="width: 10px">localisation</th>
                        <th style="width: 10px">action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($salles as $salle)

                    <tr class="align-middle">
                        <td>{{ $salle->id }}</td>
                        <td>{{ $salle->designation }}</td>
                         <td> {{$salle->capacite}} <td>
                        <td> {{$salle->localisation}} <td>
                        <td>
                          <div class="btn-group" style="column-gap: 0.5rem">
                            <a href="{{ route('salles.edit', $salle->id)}}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-fill"></i></a>
                            <form action="{{ route('salles.destroy', $salle->id) }}" onsubmit="return confirm('Are you sure?')" method="POST">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></button>
                            </form>
                          </div>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
            {{-- <div class="card-footer clearfix">
                <div class=" custom-pagination pagination-sm m-0 float-end">
                    {{ $salles->links('pagination::bootstrap-5') }}
                </div>
            </div> --}}

          </div>
        </div>
      </div>
    </div>

</div>
@endsection
