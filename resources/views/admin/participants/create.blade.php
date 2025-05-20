@extends('admin.layout.app')
@section('content')
<div class="container mt-5">
    <h1>Ajouter un participant à {{ $reunion->titre }}</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('admin.participants.store') }}" method="POST">
        @csrf
        <input type="hidden" name="reunion_id" value="{{ $reunion->id }}">

        <div class="mb-3">
            <label for="user_id" class="form-label">Utilisateur</label>
            <select name="user_id" id="user_id" class="form-control @error('user_id') is-invalid @enderror" required>
                <option value="">Sélectionner un utilisateur</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
            @error('user_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Statut</label>
            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" required>
               <option value="confirmed" {{ old('status') == 'confirmed' ? 'selected' : '' }}>Confirmé</option>
    <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>En attente</option>
    <option value="declined" {{ old('status') == 'declined' ? 'selected' : '' }}>Refusé</option>
    <option value="attended" {{ old('status') == 'attended' ? 'selected' : '' }}>Présent</option> </select>
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
@endsection