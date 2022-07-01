@extends('layouts.app')

@section('stylesheet')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css ') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
@endsection

@section('title', 'File a Complaint')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>File a Complaint</h1>
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
                            <h3 class="card-title">Complaint Form</h3>
                        </div>
                        <form action="{{ route('manage-complaint.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="delivery_list_id" value={{ $delivery_list_id }}>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Type</label>
                                    <input type="text" class="form-control" name="type">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Description</label>
                                    <textarea name="description" class="form-control" rows="6"></textarea>
                                </div>
                                
                            </div>
                            <div class="card-footer">
                                <div class="row justify-content-center">
                                    <div class="col-5">
                                        <a href="#" class="btn btn-secondary">Cancel</a>
                                        <input id="submitForm" type="submit" value="Submit"
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