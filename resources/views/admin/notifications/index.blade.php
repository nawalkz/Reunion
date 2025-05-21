@extends('admin.layout.app')

@section('content')
<style>
    .card-header {
        height: auto;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    #mark-all-btn {
        margin: 0;
    }
    .notification-unread {
        background-color: #e6f3ff;
    }
    .notification-read {
        background-color: #f8f9fa;
    }
</style>

<div class="app-content mt-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md">
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title mb-0">Mes Notifications</h3>
                        @if ($notifications->where('lu', 0)->count() > 0)
                                @csrf
                                <button type="submit" id="mark-all-btn" class="btn btn-primary btn-sm">
                                    <i class="fas fa-check"></i> Tout marquer comme lu
                                </button>
                            </form>
                        @endif
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
                                    <th style="width: 10px">ID</th>
                                    <th>Message</th>
                                    <th style="width: 150px">Date</th>
                                    <th style="width: 150px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($notifications as $notification)
                                    <tr class="align-middle {{ $notification->lu ? 'notification-read' : 'notification-unread' }}">
                                        <td>{{ $notification->id }}</td>
                                        <td>{{ $notification->message }}</td>
                                        <td>{{ $notification->created_at->diffForHumans() }}</td>
                                        <td>
                                            @if (!$notification->lu)
                                                    @csrf
                                                    <button type="submit" class="btn btn-info btn-sm">
                                                        <i class="fas fa-check"></i> Marquer
                                                    </button>
                                                </form>
                                            @else
                                                <span class="text-muted">Lue</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">Aucune notification trouvée.</td>
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