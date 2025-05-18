@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">📅 Réunions de la semaine prochaine</h2>

    @if($reunions->isEmpty())
        <p>Aucune réunion prévue pour la semaine prochaine.</p>
    @else
        @foreach ($reunions as $reunion)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">📌 {{ $reunion->titre }}</h5>
                    <p class="card-text">🗓️ Date : {{ $reunion->date }}</p>
                    <p class="card-text">🏢 Salle : {{ $reunion->salle->nom }} ({{ $reunion->salle->localisation }})</p>
                </div>
            </div>
        @endforeach
    @endif
</div>
@endsection
