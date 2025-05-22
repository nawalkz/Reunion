@extends('layoute.app')

@section('content')
<div class="container">
    <h2>Résultat de recherche pour : "{{ $query }}"</h2>

    @if($reunions->count() > 0)
        <ul class="list-group mt-3">
            @foreach($reunions as $reunion)
                <li class="list-group-item">
                    <strong>{{ $reunion->titre }}</strong><br>
                    Date : {{ $reunion->date }} <br>
                    Salle : {{ $reunion->salle->nom ?? 'Non assignée' }}
                </li>
            @endforeach
            
        </ul>
    @else
        <p class="mt-3">Aucune réunion trouvée.</p>
    @endif
</div>
@endsection
