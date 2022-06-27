@extends('layouts.app')

@section('stylesheet')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css ') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

    <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
@endsection

@section('title', 'My Restaurants')

@section('content')

    <div class="modal fade" id="add-restaurant-modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Item</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('manage-restaurant.store') }}" id="add-item-form" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Restaurant Name</label>
                            <input type="text" name="restaurant_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea name="location" class="form-control" rows="6"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Opening Time</label>
                            <div class="input-group date" id="opening_time" data-target-input="nearest">
                                <input type="text" name="opening_time" class="form-control datetimepicker-input" data-target="#opening_time"/>
                                <div class="input-group-append" data-target="#opening_time" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Closing Time</label>
                            <div class="input-group date" id="closing_time" data-target-input="nearest">
                                <input type="text" name="closing_time" class="form-control datetimepicker-input" data-target="#closing_time"/>
                                <div class="input-group-append" data-target="#closing_time" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" onclick="event.preventDefault(); document.getElementById('add-item-form').submit()" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>My Restaurants</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#add-restaurant-modal">
                                <i class="fa fa-plus"></i>
                                Add Restaurant
                            </button>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-header">

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 1%">
                                #
                            </th>
                            <th style="width: 10%">
                                Restaurant Name
                            </th>
                            <th class="text-center" style="width: 1%">
                                Address
                            </th>
                            <th class="text-center" style="width: 1%">
                                Contact Number
                            </th>
                            <th class="text-center" style="width: 1%">
                                Opening Time
                            </th>
                            <th class="text-center" style="width: 1%">
                                Closing Time
                            </th>
                            <th style="width: 2%" class="text-center">
                                Action
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($restaurants as $restaurant)
                            <tr>
                                <td>
                                    {{ ++$count }}
                                </td>
                                <td>
                                    {{ $restaurant->restaurant_name }}
                                </td>
                                <td class="text-center">
                                    {{ $restaurant->location }}
                                </td>
                                <td class="text-center">
                                    {{ $restaurant->contact_number }}
                                </td>
                                <td class="text-center">
                                    {{ $restaurant->opening_time }}
                                </td>
                                <td class="text-center">
                                    {{ $restaurant->closing_time }}
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary">Action</button>
                                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu" role="menu">
                                            <a class="dropdown-item" href="#">View</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="{{ route('manage-menu.view', $restaurant->restaurant_id) }}">View Menu</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer"></div>
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

    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>

    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <script type="text/javascript">
        $(function () {
            $('#opening_time').datetimepicker({
                format: 'LT'
            });
            $('#closing_time').datetimepicker({
                format: 'LT'
            });
        });
    </script>
@endsection