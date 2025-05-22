@extends('layoute.app')

@section('content')
<div class="container">
    <h2>Mes Notifications</h2>

    @if ($notifications->count() > 0)
        <form action="{{ route('notifications.readAll') }}" method="POST" class="mb-3">
            @csrf
            <button type="submit" class="btn btn-sm btn-primary">Tout marquer comme lu</button>
        </form>

        <ul class="list-group">
            @foreach ($notifications as $notification)
                <li class="list-group-item d-flex justify-content-between align-items-center {{ $notification->lu == 0 ? 'fw-bold' : '' }}">
                    <div>
                        {{ $notification->message }}
                        <small class="text-muted d-block">{{ $notification->created_at->diffForHumans() }}</small>
                    </div>
                    @if($notification->lu == 0)
                        <form action="{{ route('notifications.read', $notification->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-success">Marquer comme lu</button>
                        </form>
                    @endif
                </li>
            @endforeach
        </ul>
    @else
        <p>Aucune notification pour le moment.</p>
    @endif
</div>
@endsection
