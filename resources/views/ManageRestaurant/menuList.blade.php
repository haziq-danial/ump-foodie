@extends('layouts.app')

@section('stylesheet')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css ') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

@endsection

@section('title', 'My Restaurants')

@section('content')

    <div class="modal fade" id="add-menu-form">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add a menu</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('manage-menu.add') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Food Name</label>
                            <input type="text" name="food_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Food Category</label>
                            <input type="text" name="category" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Food Price</label>
                            <input type="number" step="any" name="price" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="food_status" class="form-control custom-select">
                                <option value="0" selected>Select one</option>
                                <option value="1">Available</option>
                                <option value="2">Unavailable</option>
                            </select>
                        </div>
                        <input type="hidden" name="restaurant_id" value={{ $restaurant_id }}>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Menu List for {{ $restaurant_name }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#add-menu-form">
                                <i class="fa fa-plus"></i>
                                Add Menu
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
                <h3 class="card-title">All Items</h3>

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
                                Food Name
                            </th>
                            <th class="text-center" style="width: 1%">
                                Category
                            </th>
                            <th class="text-center" style="width: 1%">
                                Price
                            </th>
                            <th class="text-center" style="width: 1%">
                                Status
                            </th>
                            <th style="width: 2%" class="text-center">
                                Action
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($menu_lists as $menu_list)
                            <tr>
                                <td>
                                    {{ ++$count }}
                                </td>
                                <td>
                                    {{ $menu_list->food_name }}
                                </td>
                                <td class="text-center">
                                    {{ $menu_list->category }}
                                </td>
                                <td class="text-center">
                                    {{ $menu_list->price }}
                                </td>
                                <td class="text-center">
                                    {{ $menu_list->food_status }}
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


@endsection