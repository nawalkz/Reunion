@extends('layout.app')
@section('content')
<div class="app-content mt-5">
    <!--begin::Container-->
    <div class="app-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Ajouter une nouveau notification</h3>
                        </div>
                        @php
                            $reunions = \App\Models\Reunion::all();
                        @endphp
                         @php
                            $users = \App\Models\User::all();
                        @endphp
                        <div class="card-body">
                            <form action="{{ route('notifications.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="message">message</label>
                                    <input type="text" class="form-control" id="message" name="message" required>
                                </div>
                                 <div class="form-group">
                                    <label for="lu">lu</label>
                                    <input type="text" class="form-control" id="lu" name="lu" required>
                                </div>
                                
                                  <div class="form-group">
                                    <label for="reunion_id">reunion</label>
                                    <select class="form-control" id="reunion_id" name="reunion_id" required>
                                        @foreach ($reunions as $reunion)
                                            <option value="{{ $reunion->id }}">{{ $reunion->titre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                  <div class="form-group">
                                    <label for="user_id">user</label>
                                    <select class="form-control" id="user_id" name="user_id" required>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                               
                                <button type="submit" class="btn btn-primary mt-3">Ajouter</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
