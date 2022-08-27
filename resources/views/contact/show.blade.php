@extends('layout.admin')
@section('title', 'Message')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1>Messages</h1> --}}
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
                        <form method="POST" action="{{ route('contact.destroy', $contact->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background: none; border: none;"><i class="fa fa-trash"
                                    aria-hidden="true" style="color: red;"></i></button>
                        </form>
                    </div>
                    <h3>Messages</h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <div style="margin: 5% 5% 5% 5%; ">
                        <div style="margin-left: 5%;">
                            <p><b>Nom : </b>{{ $contact->name }}</p>
                            <p><b>Email : </b> {{ $contact->email }}</p>
                            <label>Message : </label><br>
                            <textarea disabled style="width: 100%; min-height: 100px;">{{ $contact->message }}</textarea>
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
