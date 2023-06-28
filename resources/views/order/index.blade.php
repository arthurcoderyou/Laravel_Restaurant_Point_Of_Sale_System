@extends('layouts.main')
@section('content')

<?php
  $main = "All Orders";
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
                    
                    
                </div>
                <div class="table-responsive table-responsive-data2">
                    <table class="table table-data2">
                        <thead>
                            <tr class="text-center">
                                <th>Total Payment</th>
                                <th>Order Status</th>
                                
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @empty(!($orders))
                                @foreach ($orders as $order)
                                    <tr class="tr-shadow">
                                        <td><span class="text-success" style="font-weight: bold">P</span> {{ $order->total_payment }}</td>
                                        <td style="font-size: 1rem;">
                                            @if($order->status == 'pending' )
                                                <div class="badge badge-warning">{{ $order->status  }}</div>
                                            @elseif($order->status == 'completed' )
                                                <div class="badge badge-success">{{ $order->status  }}</div>
                                            @elseif($order->status == 'denied' )
                                                <div class="badge badge-danger">{{ $order->status  }}</div>
                                            @endif

                                        </td>
                                        <td class="w-25"><a href="/admin/order/order_details/{{ $order->id }}" class="btn btn-info">Order Menu Details</a></td>
                                        
                                    </tr>
                                @endforeach
                                
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