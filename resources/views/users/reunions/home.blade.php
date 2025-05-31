@extends('layoute.app')

@section('content')
<!-- Section Hero -->
<div class="container-fluid bg-light py-5 text-center">
    <div class="container">
        <h1 class="display-4 fw-bold">Bienvenue sur votre espace de gestion de réunions</h1>
        <p class="lead">Planifiez, gérez et suivez vos réunions en toute simplicité.</p>
        <form action="{{ route('users.reunions.search') }}" method="GET" class="d-flex" role="search">
            <input class="form-control me-2" type="search" name="query" placeholder="Rechercher une réunion" aria-label="Search">
            <button class="btn btn-outline-primary" type="submit">Rechercher</button>
        </form>

    </div>
</div>

<!-- Section Réunions rapides -->
<div class="container py-5 text-center">
    <div class="row">
        
        <div class="col-md-4">
            <div class="card h-100">
                <img src="{{ asset('dist/assets/img/WhatsApp Image 2025-05-22 at 15.58.30_e8a7e283.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Réunion aujourd’hui</h5>
                    <a href="{{ route('users.reunions.semaine') }}" class="btn btn-primary">Voir</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100">
                <img src="{{ asset('dist/assets/img/WhatsApp Image 2025-05-22 at 15.48.38_3f63a0bb.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Réunion bientôt</h5>
                    <a href="{{ route('users.reunions.semaineProchaine') }}" class="btn btn-primary">Voir</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100">
                <img src="{{ asset('dist/assets/img/WhatsApp Image 2025-05-22 at 15.58.01_43be7721.jpg
') }}" class="card-img-top" alt="...">
                <div class="card-body">

                    <h5 class="card-title">Réunion importante</h5>
                    <a href="{{ route('users.reunions.importantes') }}" class="btn btn-primary">Voir</a>
                </div>
            </div>
        </div>
        <div class="card h-100">
                <img src="{{ asset('dist/assets/img/WhatsApp Image 2025-05-22 at 16.11.11_409a7ffb.jpg') }}" class="card-img-top" alt="...">
                <a href="{{ route('users.reunions.documentation') }}" class="text-decoration-none">
                    <div class="card h-100">
                        <div class="card-body">
                            <h3>Documentation</h3>
                            <p>Règles à suivre et erreurs à éviter dans les réunions</p>
                        </div>
                    </div>
                </a>

            </div>
    </div>
</div>

<!-- Section Annonce -->
<div class="container-fluid bg-primary text-white text-center py-5">
    <h2 class="mb-3">Annonce importante</h2>
    <p class="lead">Cliquez ici pour consulter les nouvelles réunions planifiées.</p>
    <a href="#" class="btn btn-light">Consulter</a>
</div>

<!-- Section Blog -->
<div class="container py-5">
    <h2 class="text-center mb-4">Derniers Articles</h2>
    <div class="row">
        @for($i = 1; $i <= 3; $i++)
            <div class="col-md-4">
            <div class="card mb-4">
                <img src="{{ asset('dist/assets/img/WhatsApp Image 2025-05-22 at 15.48.18_6d3c60ee.jpg') }}" class="card-img-top" alt="Blog image">
                <div class="card-body">
                    <h5 class="card-title">Article {{ $i }}</h5>

                    <p class="card-text">Petit résumé de l'article ou actualité liée aux réunions...</p>
                    <a href="#" class="btn btn-primary">Lire plus</a>
                </div>
            </div>
    </div>
    @endfor
</div>
</div>


@endsection