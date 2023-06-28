@extends('layouts.main')
@section('content')


<?php
  $main = "Add Menu";
  $action = "/admin/menu/index";
  $placeholder = "Search for menu...";
?>

<x-breadcrumb :main_link="$main" :action_link="$action" :placeholder_value="$placeholder"/>

<div class="main_content">
  <div class="section__content section__content--p30">

    @if($errors->any())
      @foreach($errors as $error)
        <div class="col-md-12">
          <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
              <span class="badge badge-pill badge-danger">Error</span>
              {{ $error->message }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
          </div>
        </div>
      @endforeach
    @endif

    <div class="card w-75 mx-auto">
      <div class="card-header">
          <strong>Add</strong> Menu
      </div>
      <form action="/admin/menu/create_store" method="post" enctype="multipart/form-data" class="form-horizontal">
        @csrf
        <div class="card-body card-block">
            
                
          <div class="row form-group">
            <div class="col col-md-3">
                <label for="text-input" class=" form-control-label">Menu Name</label>
            </div>
            <div class="col-12 col-md-9">
                <input type="text" id="text-input" name="menu_name" placeholder="Enter menu name..." class="form-control" required>
                <small class="form-text text-muted"></small>
            </div>
          </div>

          <div class="row form-group">
            <div class="col col-md-3">
                <label for="text-input" class=" form-control-label">Menu Price</label>
            </div>
            <div class="col-12 col-md-9">
                <input type="number" id="text-input" name="menu_price" placeholder="Enter menu price..." class="form-control" required>
            </div>
          </div>

          <div class="row form-group">
            <div class="col col-md-3">
                <label for="text-input" class=" form-control-label">Menu Stocks</label>
            </div>
            <div class="col-12 col-md-9">
                <input type="number" id="text-input" name="menu_stocks" placeholder="Enter menu stocks..." class="form-control" required>
            </div>
          </div>

          <div class="row form-group">
            <div class="col col-md-3">
                <label for="text-input" class=" form-control-label">Menu Available</label>
            </div>
            <div class="col-12 col-md-9">
              <select name="menu_available" id="" class="form-control">
                <option value="">Select</option>
                <option value="1">Available</option>
                <option value="0">Unavailable</option>
              </select>
            </div>
          </div>

          
          <div class="row form-group">
            <div class="col col-md-3">
                <label for="file-input" class=" form-control-label">Menu Photo</label>
            </div>
            <div class="col-12 col-md-9">
                <input type="file" id="file-input" name="menu_photo" class="form-control-file" required>
            </div>
          </div>
                
            
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-sm">
                <i class="fa fa-dot-circle-o"></i> Submit
            </button>
        </div>
      </form>

      
    </div>
  </div>
</div>

@endsection