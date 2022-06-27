@extends('layouts.app')

@section('stylesheet')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css ') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
@endsection

@section('title', 'Available Deliveries')
    
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Available Deliveries</h1>
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
                            <th>No</th>
                            <th>Food Name</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Address</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th style="width: 2%" class="text-center">Action</th>    
                        </tr>    
                    </thead>    
                    <tbody>
                        @foreach ($deliveries as $delivery)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $delivery->order->menu->food_name }}</td>
                                <td>{{ $delivery->order->menu->restaurant->restaurant_name }}</td>
                                <td>{{ $delivery->order->cart->owner->user->full_name }}</td>
                                <td>{{ $delivery->order->cart->owner->address }}</td>
                                <td>{{ $delivery->order->quantity }}</td>
                                <td>{{ $delivery->order->menu->price }}</td>

                                
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary">Action</button>
                                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu" role="menu">
                                            <a class="dropdown-item" href="#">Select Order</a>
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