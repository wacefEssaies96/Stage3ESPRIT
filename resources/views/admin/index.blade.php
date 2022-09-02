@extends('layout.admin')
@section('title', 'Gestion des projets')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Gestion des projets</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Acceuil</a></li>
                        <li class="breadcrumb-item active">Gestion des projets</li>
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

                    <div class="card-tools">
                        <form method="POST" action="{{ route('project.search') }}">
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
                    @if (count($projects) > 0)
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Titre</th>
                                    <th>Implantation</th>
                                    <th>Description</th>
                                    <th>Industries</th>
                                    <th>Technologie</th>
                                    <th>Status</th>
                                    <th>Dossier</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projects as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->proTitle }}</td>
                                        <td>{{ $item->proImp }}</td>
                                        <td>{{ $item->proDesc }}</td>
                                        <td>{{ $item->proInteg }}</td>
                                        <td>{{ $item->proTech }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td><a href="{{ route('download.zip', [$item->data]) }}">{{ $item->data }}</a>
                                        </td>
                                        <td>
                                            <form method="POST" action="{{ route('project.validate.admin') }}">
                                                @csrf
                                                <input type="text" hidden style="display: none;" name="id" value="{{$item->id}}">
                                                <button type="submit"
                                                    style="background: none; border: none;">
                                                    <i class="fa fa-check" aria-hidden="true"
                                                        style="color: rgb(0, 207, 38);"></i>
                                                </button>
                                            </form>
                                            <form method="POST" action="{{ route('remove-file', $item->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" style="background: none; border: none;">
                                                    <i class="fa fa-trash" aria-hidden="true" style="color: red;"></i>
                                                </button>
                                            </form>
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
