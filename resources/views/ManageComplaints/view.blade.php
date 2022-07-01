@extends('layouts.app')

@section('stylesheet')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css ') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
@endsection

@section('title', 'Complaint Details')

@section('content')
    <div class="modal fade" id="approval-status">
        <div class="modal-dialog modal-xs">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Make a Complaint</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#" id="approval-form" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="inputTechniques">Set approval status</label>
                            <select class="form-control" name="status_approval">
                                <option value="">-- Set status --</option>
                                <option value="1">Approved</option>
                                <option value="2">Pending</option>
                                <option value="3">Rejected</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" onclick="event.preventDefault(); document.getElementById('approval-form').submit()" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Manage Complaint</h1>
                </div>
                    
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Complaint Details</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputName">Description</label>
                            @if (!is_null($delivery->complaints))
                                <p>{{ $delivery->complaints->description }}</p>
                            @else
                                <p>None</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">type</label>
                            @if (!is_null($delivery->complaints))
                                <p>{{ $delivery->complaints->type }}</p>
                            @else
                                <p>None</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            @if (!is_null($delivery->complaints))
                                <p>{{ $delivery->complaints->status }}</p>
                            @else
                                <p>None</p>
                            @endif
                        </div>
                        
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <div class="row justify-content-center">
                            <div class="col-6">
                                @hasanyrole('customer')
                                    @if (!is_null($delivery->complaints))
                                        <a href="{{ route('manage-complaint.create', $delivery->delivery_list_id) }}" class="btn btn-warning">Edit Complaint</a>
                                    @else
                                        <a href="{{ route('manage-complaint.create', $delivery->delivery_list_id) }}" class="btn btn-primary">Make a Complaint</a>
                                    @endif
                                @endhasanyrole
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
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
