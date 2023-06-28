@extends('layouts.main')
@section('content')

<?php
  $main = "Checkout";
  $action = "/admin/menu/index";
  $placeholder = "Search for menu...";
?>

<x-breadcrumb :main_link="$main" :action_link="$action" :placeholder_value="$placeholder"/>


<div class="container">
  <div class="">

    
    <div class="col-lg-12">
      <div class="card w-75 mx-auto">
          <div class="card-header">On Hand Payment</div>
          <div class="card-body">
              <div class="card-title p-2">
                  <h3 class="text-center title-2 mb-2">Pay Invoice</h3>
                  <div class="row mb-2">
                    <div class="col-6 ">
                      <p style="text-align: end; font-size:2rem;">Order ID: </p>
                    </div>
                    <div class="col-6">
                      <p style="font-size: 2rem; " class="text-success">{{ $order->id }}</p>
                    </div>
                  </div>
                  <div class="row mb-2">
                    <div class="col-6 ">
                      <p style="text-align: end; font-size:2rem;">Total Payment</p>
                    </div>
                    <div class="col-6" style="font-size: 2rem; ">
                      <p ><span class="text-success">P</span> {{ $order->total_payment }}</p> 
                      
                    </div>
                  </div>

                  <div class="row mb-2">
                    <div class="col-12">
                      <p style="text-align: center;">To Recieve your order, Just pay the ammount on the cashier and wait for the Food to Arrive</p>
                    </div>
                    
                  </div>

                  <div class="row mb-2">
                    <div class="col-12">
                      <p style="text-align: center;">Enjoy Your Meal :)</p>
                    </div>
                    
                  </div>
                  
              </div>
              <hr>
              
              

              <a href="/generate-pdf/{{ $order->id }}" id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                <i class="fa fa-print fa-lg"></i>&nbsp;
                <span id="payment-button-amount">Print Invoice</span>
                <span id="payment-button-sending" style="display:none;">Sending…</span>
              </a>
                  
          </div>
      </div>
    </div>


  </div>
</div>




@endsection