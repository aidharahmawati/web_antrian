@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">

    <div class="card shadow-sm">
        <div class="card-body">

            <h3 class="mb-4">Profil User</h3>

            <div class="row">
                <div class="col-md-4 text-center">
                    <img src="https://ui-avatars.com/api/?name={{ $user->name }}" 
                         class="rounded-circle mb-3" width="120">

                    <h5>{{ $user->name }}</h5>
                    <p class="text-muted">{{ $user->email }}</p>
                </div>

                <div class="col-md-8">

                    <div class="mb-3">
                        <label>Nama</label>
                        <input type="text" class="form-control" value="{{ $user->name }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label>Email</label>
                        <input type="text" class="form-control" value="{{ $user->email }}" readonly>
                    </div>

                    <a href="{{ route('profil.edit') }}" class="btn btn-primary">
                        <i class="fas fa-edit"></i> Edit Profil
                    </a>

                </div>
            </div>

        </div>
    </div>

</div>
@endsection