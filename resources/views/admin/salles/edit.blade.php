@extends('layout.app')
@section('content')
<div class="app-content mt-5">
    <!--begin::Container-->
    <div class="app-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Mettre a jour d'une salle</h3>
                        </div>
                       
                        <div class="card-body">
                            <form action="{{ route('salles.update', $salle->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="designation">designation</label>
                                    <input type="text" class="form-control" id="designation" name="designation" value="{{ $salle->designation }}" required>
                                </div>
                                 <div class="form-group">
                                    <label for="capacite">capacite</label>
                                    <input type="text" class="form-control" id="capacite" name="capacite" value="{{ $salle->capacite}}" required>
                                </div>
                                 <div class="form-group">
                                    <label for="localisation">localisation</label>
                                    <input type="text" class="form-control" id="localisation" name="localisation" value="{{ $salle->localisation }}" required>
                                </div>
                                
                                <button type="submit" class="btn btn-primary mt-3">Mettre a jour</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

