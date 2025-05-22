@extends('admin.layout.app')

@section('content')
<style>

    .card-header {
        height: auto;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    #add-btn {
        margin: 0;
    }
</style>

<div class="app-content mt-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md">
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title mb-0">Liste des participants</h3>
                        <!-- Adjust the create link to require a reunion_id -->
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Statut</th>
                                    <th>Utilisateur</th>
                                    <th>Réunion</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($participants as $participant)
                                    <tr class="align-middle">
                                        <td>{{ $participant->id }}</td>
                                        <td>{{ $participant->status }}</td>
                                        <td>{{ $participant->user->name ?? 'N/A' }}</td>
                                        <td>{{ $participant->reunion->titre ?? 'N/A' }}</td>
                                        <td>
                                            <div class="btn-group" style="column-gap: 0.5rem">
                                                <a href="{{ route('admin.participants.edit', $participant->id) }}" class="btn btn-warning btn-sm">
                                                    <i class="bi bi-pencil-fill"></i>
                                                </a>
                                                <form action="{{ route('admin.participants.destroy', $participant->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr ?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="bi bi-trash-fill"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">Aucun participant trouvé.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection