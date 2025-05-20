@extends(admin.'layout.app')

@section('content')
<div class="app-content mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Ajouter une nouvelle réunion</h3>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        <form action="{{ route('reunions.store') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="titre">Titre</label>
                                <input type="text" class="form-control" id="titre" name="titre" value="{{ old('titre') }}" required>
                                @error('titre')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="date">Date</label>
                                <input type="datetime-local" class="form-control" id="date" name="date" value="{{ old('date') }}" required>
                                @error('date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="lieu">Lieu</label>
                                <input type="text" class="form-control" id="lieu" name="lieu" value="{{ old('lieu') }}" required>
                                @error('lieu')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="create_by">Créé par</label>
                                <input type="text" class="form-control" id="create_by" name="create_by" value="{{ old('create_by') }}" required>
                                @error('create_by')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="importance">Importance</label>
                                <select class="form-control" id="importance" name="importance" required>
                                    <option value="1" {{ old('importance') == '1' ? 'selected' : '' }}>Oui</option>
                                    <option value="0" {{ old('importance') == '0' ? 'selected' : '' }}>Non</option>
                                </select>
                                @error('importance')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="user_id">Utilisateur</label>
                                <select class="form-control" id="user_id" name="user_id" required>
                                    @forelse ($users as $user)
                                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                    @empty
                                        <option value="">Aucun utilisateur disponible</option>
                                    @endforelse
                                </select>
                                @error('user_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="salle_id">Salle</label>
                                <select class="form-control" id="salle_id" name="salle_id" required>
                                    @forelse ($salles as $salle)
                                        <option value="{{ $salle->id }}" {{ old('salle_id') == $salle->id ? 'selected' : '' }}>{{ $salle->designation }}</option>
                                    @empty
                                        <option value="">Aucune salle disponible</option>
                                    @endforelse
                                </select>
                                @error('salle_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Ajouter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection