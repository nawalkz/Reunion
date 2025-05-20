@extends('admin.layout.app')

@section('content')
<div class="container mt-5">
    <h1>Modifier le participant pour {{ $reunion->titre }}</h1>

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('admin.participants.update', $participant->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="reunion_id" value="{{ $reunion->id }}">
        <div class="mb-3">
            <label for="user_id" class="form-label">Utilisateur</label>
            <select name="user_id" id="user_id" class="form-control" required>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $user->id == $participant->user_id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Statut</label>
            <select name="status" id="status" class="form-control" required>
                <option value="pending" {{ $participant->status == 'pending' ? 'selected' : '' }}>En attente</option>
                <option value="accepted" {{ $participant->status == 'accepted' ? 'selected' : '' }}>Accepté</option>
                <option value="refused" {{ $participant->status == 'refused' ? 'selected' : '' }}>Refusé</option>
                <option value="attended" {{ $participant->status == 'attended' ? 'selected' : '' }}>Présent</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection