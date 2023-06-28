@extends('layouts.main')
@section('content')


<!-- MAIN Stats-->
<section class="statistic statistic2">
  <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-3">
            <div class="statistic__item statistic__item--orange">
                <h2 class="number">P {{ $all_salesTotal }}</h2>
                <span class="desc">all sales</span>
                <div class="icon">
                    <i class="zmdi zmdi-shopping-cart"></i>
                </div>
            </div>
        </div>
          <div class="col-md-6 col-lg-3">
              <div class="statistic__item statistic__item--green">
                  <h2 class="number">P {{ $today_salesTotal }}</h2>
                  <span class="desc">today sales</span>
                  <div class="icon">
                      <i class="zmdi zmdi-account-o"></i>
                  </div>
              </div>
          </div>
          
          <div class="col-md-6 col-lg-3">
              <div class="statistic__item statistic__item--blue">
                  <h2 class="number">P {{ $week_salesTotal }}</h2>
                  <span class="desc">this week</span>
                  <div class="icon">
                      <i class="zmdi zmdi-calendar-note"></i>
                  </div>
              </div>
          </div>
          <div class="col-md-6 col-lg-3">
              <div class="statistic__item statistic__item--red">
                  <h2 class="number">P {{ $month_salesTotal }}</h2>
                  <span class="desc">this month</span>
                  <div class="icon">
                      <i class="zmdi zmdi-money"></i>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
<!-- END MAIN Stats-->











<!-- Best Seller CHART-->
<section class="statistic-chart">
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <h3 class="title-5 m-b-35">Best Sellers</h3>
          </div>
      </div>
      <div class="row">
          
          
          <div class="col-md-12 col-lg-12">
              <!--  MENU-->
              <div class="top-campaign">
                  <h3 class="title-3 m-b-30">Menu</h3>
                  <div class="table-responsive">
                      <table class="table table-top-campaign">
                        <thead>
                            <th>Name</th>
                            <th style="text-align:center">Total Items Sold</th>
                            <th style="text-align:end;">Total Sales</th>
                        </thead>
                        <tbody>
                            @if(empty($best_sellers))
                                <tr>
                                    <td colspan="2">No records found</td>
                                </tr>
                            @else
                                @foreach ($best_sellers as $menu)
                                    <tr>
                                        <td>{{ $menu->name }}</td>
                                        <td style="text-align:center">{{ $menu->total_items_sold }}</td>
                                        <td><span class="text-success" style="font-weight: bold">P</span> {{ $menu->total_sales }}</td>
                                    </tr>

                                @endforeach
                                
                            @endif
                            
                            
                        </tbody>
                      </table>
                  </div>
              </div>
              <!-- END MENU-->
          </div>
          
          
      </div>
  </div>
</section>
<!-- END Best Seller  CHART-->

<!-- Highest Sales TABLE-->
<section class="p-t-20">
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <h3 class="title-5 m-b-35">Highest Sales</h3>
              
              <div class="table-responsive table-responsive-data2">
                  <table class="table table-data2">
                      <thead>
                          <tr class="text-center">
                              
                              <th>order id</th>
                              <th>Total payment</th>
                              <th>Order Date</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($highest_sales as $sales)
                          <tr class="tr-shadow text-center">
                            @foreach($users_all as $us)
                                <?php 
                                    if($sales->user_id == $us->id){
                                        $user_name = $us->name;
                                    }
                                   
                                ?>
                            @endforeach
                            {{-- 
                              <td>{{ $user_name }}</td>
                               --}}
                               <td>{{ $sales->id }}</td>
                              <td><span class="text-success" style="font-weight: bold">P</span> {{ $sales->total_payment }}</td>
                              @php 
                                    $d = strtotime($sales->created_at);
                                @endphp
                              <td>{{ date('Y-M-D h:i:a',$d) }}</td>
                          </tr>
                        @endforeach
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>
</section>
<!-- END Highest Sales TABLE-->









<!-- Sales-->
<section class="statistic-chart">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- DATA TABLE -->
                <h3 class="title-5 m-b-35 py-4">Sales Data Table</h3>
                <div class="table-data__tool">
                    <div class="table-data__tool-left">
                        <form action="/admin/sales/sales_report" method="post">
                            @csrf
                            <div class="rs-select2--light rs-select2--sm" style="min-width: 190px;">
                                <select class="js-select2" name="sales_date">
                                    <option selected="selected" value="">Select Date Filter</option>
                                    <option  value="today">Today</option>
                                    <option value="this_week">This Week</option>
                                    <option value="this_month">This Month</option>
                                    <option value="all">All Sales</option>
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                            <button type="submit" class="au-btn-filter">
                                <i class="zmdi zmdi-filter-list"></i>filters</button>
                                
                        </form>
                    </div>
                    <div class="table-data__tool-right">
                        <p class="au-btn-filter"> Total Sales : <span class="text-success" style="font-weight: bold">P</span> {{ $salesTotal }}</p>
                    </div>
                </div>
                <div class="table-responsive table-responsive-data2">
                    <table class="table table-data2">
                        <thead>
                            <tr class="text-center">
                                
                                <th>order id</th>
                                <th>Total payment</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($all_sales as $sale)
                            <tr class="tr-shadow text-center">
                              @foreach($users_all as $us)
                                  <?php 
                                      if($sale->user_id == $us->id){
                                          $user_name = $us->name;
                                      }
                                     
                                  ?>
                              @endforeach
                              {{-- 
                                <td>{{ $user_name }}</td>
                                 --}}

                                 <td>{{ $sale->id }}</td>
                                <td><span class="text-success" style="font-weight: bold">P</span> {{ $sale->total_payment }}</td>

                                @php 
                                    $d = strtotime($sale->created_at);
                                @endphp
                                <td>{{ date('Y-M-D h:i:a',$d) }}</td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- END DATA TABLE -->
            </div>
        </div>
    </div>
</section>
<!--end of Sales-->





@endsection