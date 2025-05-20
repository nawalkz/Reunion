@extends('layoute.app')

@section('content')
<!-- Section Hero -->
<div class="container-fluid bg-light py-5 text-center">
    <div class="container">
        <h1 class="display-4 fw-bold">Bienvenue sur votre espace de gestion de réunions</h1>
        <p class="lead">Planifiez, gérez et suivez vos réunions en toute simplicité.</p>
        <form class="d-flex justify-content-center mt-4">
            <input class="form-control w-50 me-2" type="search" placeholder="Rechercher une réunion..." aria-label="Search">
            <button class="btn btn-primary">Rechercher</button>
        </form>
    </div>
</div>

<!-- Section Réunions rapides -->
<div class="container py-5 text-center">
    <div class="row">
        <div class="col-md-4">
            <div class="card h-100">
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
        <div class="col-md-4">
            <div class="card h-100">
                <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Réunion aujourd’hui</h5>
                    <a href="{{ route('users.reunions.semaine') }}" class="btn btn-primary">Voir</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100">
                <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Réunion bientôt</h5>
                     <a href="{{ route('users.reunions.semaine_prochaine') }}" class="btn btn-primary">Voir</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100">
                <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Réunion importante</h5>
                     <a href="{{ route('users.reunions.importantes') }}" class="btn btn-primary">Voir</a>
                </div>
            </div>
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
                <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Blog image">
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

<!-- Section Témoignages -->
<div class="container text-center py-5 bg-light">
    <h2 class="mb-4">Témoignages</h2>
    <div class="row">
        <div class="col-md-4">
            <blockquote class="blockquote">
                <p>"Ce système change tout, je l’adore !"</p>
                <footer class="blockquote-footer">Alex Turner</footer>
            </blockquote>
        </div>
        <div class="col-md-4">
            <blockquote class="blockquote">
                <p>"Simple, rapide, efficace !"</p>
                <footer class="blockquote-footer">Inès Martin</footer>
            </blockquote>
        </div>
        <div class="col-md-4">
            <blockquote class="blockquote">
                <p>"Excellent outil de travail collaboratif."</p>
                <footer class="blockquote-footer">Omar Bensalem</footer>
            </blockquote>
        </div>
    </div>
</div>
@endsection
