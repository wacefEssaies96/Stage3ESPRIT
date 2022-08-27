@extends('layout.admin')
@section('title', 'Messages')
@section('content')
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Messages</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Acceuil</a></li>
                        <li class="breadcrumb-item active">Messages</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
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
                    <div class="card-tools">

                        <form method="POST" action="{{ route('contact.search') }}">
                            @csrf
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="search" class="form-control float-right"
                                    placeholder="Search">

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
                    @if ($contacts->isNotEmpty())
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nom</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $item)
                                    <tr>

                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>
                                            <div style="display: grid; grid-template-columns: auto auto;">
                                                <a href="{{ route('contact.show', $item->id) }}">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                                <form method="POST"
                                                    action="{{ route('contact.destroy', $item->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        style="background: none; border: none;"><i
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
    <!-- /.content -->
@endsection