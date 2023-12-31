@extends('layouts.template')
@section('title', 'User Profile')
@section('main')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User Profile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                    src="{{ asset('template/dist/img/user4-128x128.jpg') }}" alt="User profile picture">
                            </div>
                            <h3 class="profile-username text-center">{{ Str::title(Str::limit($user->name, 20, '.')) }}
                            </h3>
                            <p class="text-muted text-center">{{ $user->user_id }}</p>
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Jabatan</b> <a class="float-right">{{ $user->role }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Email</b> <a class="float-right">{{ $user->email }}</a>
                                </li>
                            </ul>
                            <a href="{{ url('user') }}" class="btn btn-primary btn-block"><b>Refresh</b></a>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#editprofile" data-toggle="tab">Edit
                                        Profile</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="#editpass" data-toggle="tab">Edit
                                        Password</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="editprofile">
                                    <form class="form-horizontal" action="{{ route('user.update', Auth::user()->id) }}"
                                        method="post">
                                        @csrf
                                        @method('put')
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="name" class="form-control" id="inputName"
                                                    placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" name="email" class="form-control" id="inputEmail"
                                                    placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="editpass">
                                    <form class="form-horizontal" action="{{ route('user.update', Auth::user()->id) }}"
                                        method="post">
                                        @csrf
                                        @method('put')
                                        <div class="form-group row">
                                            <label for="password" class="col-sm-4 col-form-label">New Password</label>
                                            <div class="col-sm-8">
                                                <input type="password" name="password" class="form-control" id="password"
                                                    placeholder="Create new password">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="confirmpassword" class="col-sm-4 col-form-label">Password
                                                Confirmation</label>
                                            <div class="col-sm-8">
                                                <input type="password" name="password_confirmation" class="form-control"
                                                    id="confirmpassword" placeholder="Confirmation your password">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-4 col-sm-8">
                                                <button type="submit" class="btn btn-danger">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
