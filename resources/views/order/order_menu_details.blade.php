@extends('layouts.main')
@section('content')

<?php
  $main = "All Order Menu Details";
  $action = "/admin/menu/index";
  $placeholder = "Search for menu...";
?>

<x-breadcrumb :main_link="$main" :action_link="$action" :placeholder_value="$placeholder"/>

  <!-- TRANSACTIONS TABLE-->
  <section class="p-t-20">
    <div class="container">
        <div class="row">

            @if(session()->has('success'))

                <div class="col-md-12">
                    <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
                        <span class="badge badge-pill badge-primary">Success</span>
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                </div>
            @endif

            @if($errors->any())
                @foreach ($errors->all() as $error)
                  <div class="col-md-12">
                    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                        <span class="badge badge-pill badge-danger">Error</span>
                        {{ $error }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                  </div>
                @endforeach
                
            @endif

            <div class="col-md-12">
                <h3 class="title-5 m-b-35">Orders</h3>
                <div class="table-data__tool">
                    <div class="col-6">
                      <a href="/admin/order/orders" class="btn btn-success"> Back to Orders</a>
                    </div>
                    
                </div>
                <div class="table-responsive table-responsive-data2">
                    <table class="table table-data2">
                        <thead>
                            <tr class="text-center">
                                <th>Menu Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @empty(!($order_details))
                                @foreach ($order_details as $order)
                                    <tr class="tr-shadow">
                                        <td>{{ $order->menu_name }}</td>
                                        <td>{{ $order->menu_price }}</td>
                                        <td>{{ $order->menu_quantity }}</td>
                                        <td><span class="text-success" style="font-weight: bold">P</span> {{ $order->menu_total_payment }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                  <td colspan="3">Total: </td>
                                  <td><span class="text-success" style="font-weight: bold">P</span> {{ $order_main->total_payment }}</td>
                                </tr>
                                
                            @else
                                <tr class="tr-shadow">
                                    <td class="text-center" colspan="5">
                                        No Menus Found
                                    </td>
                                    
                                </tr>
                            @endempty

                            
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
  </section>
  <!-- END TRANSACTIONS TABLE-->


@endsection