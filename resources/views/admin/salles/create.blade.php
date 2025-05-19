@extends('admin.layout.app')
@section('content')
<div class="app-content mt-5">
    <!--begin::Container-->
    <div class="app-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Ajouter une nouveau salle</h3>
                        </div>
                      
                        <div class="card-body">
                            <form action="{{ route('salles.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="designation">designation</label>
                                    <input type="text" class="form-control" id="designation" name="designation" required>
                                </div>
                                 <div class="form-group">
                                    <label for="capacite">capacite</label>
                                    <input type="numbre" class="form-control" id="capacite" name="capacite" required>
                                </div>
                                <div class="form-group">
                                    <label for="localisation">localisation</label>
                                    <input type="text" class="form-control" id="localisation" name="localisation" required>
                                </div>
                                
                               
                                <button type="submit" class="btn btn-primary mt-3">Ajouter</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
