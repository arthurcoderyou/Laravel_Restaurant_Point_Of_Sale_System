@extends('layouts.main')
@section('content')

@auth
<?php
  $main = "All Menu";
  $action = "/admin/menu/index";
  $placeholder = "Search for menu...";
?>

<x-breadcrumb :main_link="$main" :action_link="$action" :placeholder_value="$placeholder"/>
@endauth
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

                @auth 
                    @php($p = '35')
                @endauth

                @guest
                    @php($p = '2')
                @endguest

                <h3 class="title-5 m-b-{{ $p }}">Menu</h3>
                @auth
                    @if(auth()->user()->role == 'admin')
                        <div class="table-data__tool">
                        
                                    <div class="table-data__tool-right">
                                        <a href="/admin/menu/create" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-plus"></i>add menu</a>
                                        
                                    </div>
                                
                        </div>
                    @endif

                @endauth
                <div class="table-responsive table-responsive-data2">
                    <table class="table table-data2">
                        <thead>
                            <tr class="text-center">
                                
                                <th>Photo</th>
                                <th>name</th>
                                <th>price</th>
                                @auth
                                <th>stocks</th>
                                @endauth
                                <th class="">available</th>
                                <th class="" colspan="2"></th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @empty(!($menus))
                                @foreach ($menus as $menu)
                                    <tr class="tr-shadow">
                                        <td>
                                            <img src="{{ (!empty($menu->photo)) ? url('uploads/'.$menu->photo) : url('uploads/no_image.jpg') }}" alt="menu-photo" class="w-50" style="max-width:200px; min-width:100px;">
                                        </td>
                                        <td>{{ $menu->name }}</td>
                                        
                                        <td><span style="font-weight: bold;" class="text-success">P</span> {{ $menu->price }}</td>
                                        @auth
                                        <td>{{ $menu->stocks }}</td>
                                        @endauth
                                        <td class="">
                                            <h3>
                                            @if($menu->available)
                                                <span class="badge badge-light">available</span>
                                            @else
                                                <span class="badge badge-dark">unavailable</span>
                                            @endif
                                            </h3>
                                        </td>
                                        
                                        @auth
                                            @if(auth()->user()->role == "admin")
                                                <td class="" style="max-width: 30px;">
                                                    <a href="/admin/menu/update/{{ $menu->id }}" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="Update">
                                                        <i class="zmdi zmdi-edit"></i>
                                                    </a>
                                                </td>
                                                <td style="max-width: 30px;">
                                                    <form action="/admin/menu/delete" method="post">
                                                        @csrf
                                                        <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                                                        <button href="#" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            @endif

                                            
                                        @endauth
                                        <td style="max-width: 30px;">
                                            <x-add-to-cart-btn :menu_id="$menu->id" :menu_available="$menu->available"/>
                                        </td>
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