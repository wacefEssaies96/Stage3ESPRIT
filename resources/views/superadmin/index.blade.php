@extends('layout.admin')
@section('title', 'Gestion des utilisateurs')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Gestion des utilisateurs</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Acceuil</a></li>
                        <li class="breadcrumb-item active">Gestion des utilisateurs</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Succés !</strong> {{ $message }}.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Erreur !</strong> {{ $message }}.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('user.create') }}"><i class="fa fa-plus" aria-hidden="true"></i>
                        Ajouter
                        un nouveau utilisateur</a>
                    <div class="card-tools">
                        @if (Auth::user()->type == 'Super admin')
                            <form method="POST" action="{{ route('user.search') }}">
                            @else
                                <form method="POST" action="{{ route('user.search.admin') }}">
                        @endif
                        @csrf
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="search" class="form-control float-right" placeholder="Search">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    @if ($users->isNotEmpty())
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nom</th>
                                    <th>Email</th>
                                    <th>Sexe</th>
                                    <th>Type</th>
                                    <th>Ville</th>
                                    <th>Num tel</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->gender }}</td>
                                        <td>{{ $user->type }}</td>
                                        <td>{{ $user->state }}</td>
                                        <td>{{ $user->phoneNbr }}</td>
                                        <td>
                                            <div style="display: grid; grid-template-columns: auto auto;">
                                                <a href="{{ route('user.edit', $user->id) }}"><i class="fas fa-edit"
                                                        aria-hidden="true"></i></a>
                                                <form method="POST" action="{{ route('user.destroy', $user->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" style="background: none; border: none;"><i
                                                            class="fa fa-trash" aria-hidden="true"
                                                            style="color: red;"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <center>
                            <h3 class="text-danger">Aucun résultat trouvé !</h3>
                        </center>
                    @endif
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
