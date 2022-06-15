@extends('layouts.app')

@section('stylesheet')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css ') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
@endsection

@section('title', 'Add Restaurant')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Register Restaurant</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Restaurant Details</h3>
                        </div>
                        <form action="#">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Restaurant Name</label>
                                    <input id="inputName" type="text" name="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Location</label>
                                    <input id="inputName" type="text" name="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Opening Time</label>
                                    <input id="inputName" type="text" name="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Closing Time</label>
                                    <input id="inputName" type="text" name="" class="form-control">
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row justify-content-center">
                                    <div class="col-5">
                                        <a href="#" class="btn btn-secondary">Cancel</a>
                                        <input id="submitForm" type="submit" value="Register"
                                                class="btn btn-primary float-right">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
@endsection