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
                            <h3 class="card-title">Mettre a jour d'une reunion</h3>
                        </div>
                        @php
                            $salles = App\Models\salle::all();
                        @endphp
                         @php
                            $users = App\Models\user::all();
                        @endphp
                        <div class="card-body">
                            <form action="{{ route('reunions.update', $reunion->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="titre">titre</label>
                                    <input type="text" class="form-control" id="titre" name="titre" value="{{ $reunion->titre }}" required>
                                </div>
                                 <div class="form-group">
                                    <label for="date">date</label>
                                    <input type="date" class="form-control" id="date" name="date" value="{{ $reunion->date}}" required>
                                </div>
                                 <div class="form-group">
                                    <label for="lieu">lieu</label>
                                    <input type="text" class="form-control" id="lieu" name="lieu" value="{{ $reunion->lieu }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="create_by">create_by</label>
                                    <input type="text" class="form-control" id="create_by" name="create_by" value="{{ $reunion->create_by }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="importance">importance</label>
                                    <input type="text" class="form-control" id="importance" name="importance" value="{{ $reunion->importance }}" required>
                                </div>
                                
                                 <div class="form-group">
                                    <label for="user_id">user</label>
                                    <select class="form-control" id="user_id" name="user_id" required>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}" {{ $user->id == $user->user_id ? 'selected' : '' }}>{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                 <div class="form-group">
                                    <label for="salle_id">salle</label>
                                    <select class="form-control" id="salle_id" name="salle_id" required>
                                        @foreach ($salles as $salle)
                                            <option value="{{ $salle->id }}" {{ $salle->id == $salle->salle_id ? 'selected' : '' }}>{{ $salle->designation }}</option>
                                        @endforeach
                                    </select>
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

