@extends('layouts.main')
@section('content')

<?php
  $main = "Pending Orders";
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
                <h3 class="title-5 m-b-35">Pending Orders</h3>
                
                <div class="table-responsive table-responsive-data2">
                    <table class="table table-data2">
                        <thead>
                            <tr class="text-center">
                                
                                <th>Order ID</th>
                                <th>Total Payment</th>
                                <th>Order Status</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @empty(!($pending_orders))
                                @foreach ($pending_orders as $order)
                                    <tr class="tr-shadow">
                                        @foreach($users as $user)
                                            <?php 
                                                if($user->id == $order->user_id){
                                                    $user_name = $user->name;
                                                }
                                            ?>
                                        @endforeach
                                        {{-- 
                                        <td>{{ $user_name }}</td>
                                         --}}

                                         <td>{{ $order->id }}</td>
                                        <td><span class="text-success" style="font-weight: bold">P</span> {{ $order->total_payment }}</td>
                                        <form action="/admin/order/update_order_status" method="post">
                                            @csrf
                                            <input type="hidden" name="order_id" value="{{ $order->id }}">
                                            {{--  
                                            
                                                <?php
                                                /*
                                                    switch ($order->status) {
                                                        case 'pending':
                                                            $txtcolor = "warning";
                                                            break;
                                                        case 'completed':
                                                            $txtcolor = "success";
                                                            break;
                                                        case 'danger':
                                                            $txtcolor = "danger";
                                                            break;
                                                        default:
                                                            # code...
                                                            break;
                                                    }
                                                    */
                                                    ?>
                                            --}}
                                            <td style="font-size: 1rem;">
                                                <select name="order_status" id="" class="form-control text-center " required>
                                                    <option {{ ($order->status == 'pending' ) ? 'selected' : '' }} value="pending" class="bg-dark text-warning">pending</option>
                                                    <option {{ ($order->status == 'completed' ) ? 'selected' : '' }} value="completed" class="bg-dark text-success">completed</div></option>
                                                    <option {{ ($order->status == 'denied' ) ? 'selected' : '' }} value="denied" class="bg-dark text-danger">reject</div></option>
                                                </select>
                                                

                                            </td>
                                            <td>
                                                <button type="submit" class="btn btn-info" title="Save Order Status"><i class="fa fa-save"></i></button>
                                            </td>

                                        </form>
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