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
        box-shadow: 0 10px 20px rgba(0,0,0,0.15);
    }

    .meeting-icon {
        font-size: 30px;
        color: #0d6efd;
    }

    .meeting-header {
        background: linear-gradient(135deg, #0d6efd, #6610f2);
        color: white;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
        padding: 10px 15px;
    }
</style>

<div class="container mt-5">
    <h2 class="text-center mb-4 text-primary fw-bold">📅 Réunions d'haujourd'hui</h2>

    <div class="row">
        @forelse($reunions as $reunion)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card meeting-card shadow-sm">
                    <div class="meeting-header">
                        <h5 class="mb-0">{{ $reunion->titre }}</h5>
                    </div>
                    <div class="card-body">
                        <p><i class="bi bi-calendar3"></i> <strong>Date:</strong> {{ $reunion->date }}</p>
                        <p><i class="bi bi-geo-alt"></i> <strong>Lieu:</strong> {{ $reunion->lieu }}</p>
                        <p><i class="bi bi-door-open"></i> <strong>Salle:</strong> {{ $reunion->salle->nom ?? 'N/A' }}{{ $reunion->salle->localisation }}</p>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <div class="alert alert-info">Aucune réunion prévue pour aujourd’hui..</div>
            </div>
        @endforelse
    </div>
</div>
@endsection
