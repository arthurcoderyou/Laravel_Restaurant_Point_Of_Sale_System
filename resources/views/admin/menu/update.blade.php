@extends('layouts.main')
@section('content')


<?php
  $main = "Update Menu";
  $action = "/admin/menu/index";
  $placeholder = "Search for menu...";
?>

<x-breadcrumb :main_link="$main" :action_link="$action" :placeholder_value="$placeholder"/>



<div class="main_content">
  <div class="section__content section__content--p30">
    <div class="card w-75 mx-auto">
      <div class="card-header">
          <strong>Update</strong> Menu
      </div>
      <form action="/admin/menu/update_store" method="post" enctype="multipart/form-data" class="form-horizontal">
        @csrf
        <input type="hidden" name="menu_id" value="{{ $menu->id }}">
        <div class="card-body card-block">
            
                
          <div class="row form-group">
            <div class="col col-md-3">
                <label for="text-input" class=" form-control-label">Menu Name</label>
            </div>
            <div class="col-12 col-md-9">
                <input value="{{ $menu->name }}" type="text" id="text-input" name="menu_name" placeholder="Enter menu name..." class="form-control" required>
                <small class="form-text text-muted"></small>
            </div>
          </div>

          <div class="row form-group">
            <div class="col col-md-3">
                <label for="text-input" class=" form-control-label">Menu Price</label>
            </div>
            <div class="col-12 col-md-9">
                <input value="{{ $menu->price }}" type="number" id="text-input" name="menu_price" placeholder="Enter menu price..." class="form-control" required>
            </div>
          </div>

          

          <div class="row form-group">
            <div class="col col-md-3">
                <label for="text-input" class=" form-control-label">Menu Stocks</label>
            </div>
            <div class="col-12 col-md-9">
                <input value="{{ $menu->stocks }}" type="number" id="text-input" name="menu_stocks" placeholder="Enter menu stocks..." class="form-control" required>
            </div>
          </div>

          <div class="row form-group">
            <div class="col col-md-3">
                <label for="text-input" class=" form-control-label">Menu Available</label>
            </div>
            <div class="col-12 col-md-9">
              <select name="menu_available" id="" class="form-control">
                <option value="">Select</option>
                <option {{ ($menu->available) ? 'selected' : '' }} value="1">Available</option>
                <option {{ !($menu->available) ? 'selected' : '' }} value="0">Unavailable</option>
              </select>
            </div>
          </div>

          
          <div class="row form-group">
            <div class="col col-md-3">
                <label for="file-input" class=" form-control-label">Menu Photo</label>
            </div>
            <div class="col-12 col-md-9">
                <input type="file" id="file-input" name="menu_photo" class="form-control-file" >
            </div>
          </div>
                
            
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-sm">
                <i class="fa fa-dot-circle-o"></i> Update
            </button>
        </div>
      </form>

      
    </div>
  </div>
</div>

@endsection