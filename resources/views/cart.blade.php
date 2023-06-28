@extends('layouts.main')
@section('content')

<?php
  $main = "All Cart Items";
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
                <h3 class="title-5 m-b-35">Cart</h3>
                <div class="table-data__tool">
                  <div class="table-data__tool-left">
                    @auth
                    <a href="/admin/cart/checkout/{{ auth()->user()->id }}" class="au-btn au-btn-icon bg-warning au-btn--green au-btn--small">
                        <i class="zmdi zmdi-money"></i>Checkout</a>
                    @else
                    <a href="/admin/cart/checkout/2" class="au-btn au-btn-icon bg-warning au-btn--green au-btn--small">
                        <i class="zmdi zmdi-money"></i>Checkout</a>
                    @endauth

                    
                </div>
                    <div class="table-data__tool-right">
                        <a href="/admin/menu/index" class="au-btn au-btn-icon au-btn--green au-btn--small">
                            <i class="zmdi zmdi-plus"></i>add more</a>
                        
                    </div>
                </div>
                <div class="table-responsive table-responsive-data2">
                    <table class="table table-data2">
                        <thead>
                            <tr class="text-center">
                                
                              <th>Photo</th>
                              <th>name</th>
                              <th>price</th>
                              <th>stocks</th>
                              <th class="">available</th>
                              <th>Quantity</th>
                                {{-- 
                                
                                
                                
                                 --}}
                                 <th class="" colspan=""></th>
                            </tr>
                        </thead>
                        @auth
                            <x-cart-sum :user_id="auth()->user()->id"/>
                        @else
                            <x-cart-sum :user_id="2"/>
                        @endauth
                        <tbody class="text-center">
                            @empty(!($cart_items))

                                @foreach ($cart_items as $item)

                                    <tr class="tr-shadow">
                                    
                                      <x-cart-row :menu_id="$item->menu_id">

                                        <form action="/admin/cart/update" method="post">
                                          @csrf
                                          <td><input type="number" class="form-control text-center"  name="quantity" value="{{ !empty($item->quantity) ? $item->quantity : 0 }}"></td>

                                          <td style="max-width: 30px;">

                                            <input type="hidden" name="cart_item_id" value="{{ $item->id }}">
                                            <button type="submit" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="Update">
                                                <i class="zmdi zmdi-save"></i>
                                            </button>
                                            
                                          </td>
                                        </form>

                                      </x-cart-row>

                                      
                                      <td style="max-width: 30px;">
                                        <form action="/admin/cart/delete" method="post">
                                            @csrf
                                            <input type="hidden" name="cart_item_id" value="{{ $item->id }}">
                                            <button href="#" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                                <i class="zmdi zmdi-delete"></i>
                                            </button>
                                        </form>
                                      </td>
                                      
                                    </tr>

                                @endforeach
                                
                            @else
                                <tr class="tr-shadow">
                                    <td class="text-center" colspan="5">
                                        No Cart Items Found
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