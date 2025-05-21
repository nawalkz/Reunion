@extends('layoute.app')

@section('content')
<style>
    .meeting-card {
        border: none;
        border-radius: 15px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .meeting-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    }

    .meeting-header {
        background: linear-gradient(135deg, #dc3545, #c82333);
        color: white;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
        padding: 10px 15px;
    }

    .important-icon {
        color: #dc3545;
        font-size: 1.5rem;
    }
</style>

<div class="container mt-5">
    <h2 class="text-center mb-4 text-danger fw-bold">
        <i class="bi bi-exclamation-triangle-fill important-icon"></i> Réunions importantes
    </h2>

    <div class="row">
        @forelse($reunions as $reunion)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card meeting-card shadow-sm">
                    <div class="meeting-header">
                        <h5 class="mb-0">{{ $reunion->titre }}</h5>
                    </div>
                    <div class="card-body">
                        <p><i class="bi bi-calendar-event"></i> <strong>Date:</strong> {{ $reunion->date }}</p>
                        <p><i class="bi bi-geo-alt-fill"></i> <strong>Lieu:</strong> {{ $reunion->lieu }}</p>
                        <p><i class="bi bi-door-open-fill"></i> <strong>Salle:</strong> {{ $reunion->salle->nom ?? 'N/A' }} {{ $reunion->salle->localisation }}
                    </p>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <div class="alert alert-warning">Aucune réunion importante trouvée.</div>
            </div>
            <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('users.reunion.home') }}" class="btn btn-outline-secondary shadow-sm">
                <i class="bi bi-arrow-left"></i> Retourn
            </a>
        @endforelse
    </div>
</div>
@endsection
