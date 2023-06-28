<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Menu;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function welcome(){
        //get the members online aside from the admin
        $users = DB::table('users')->where('id','!=','1')->count();
        
        //get all the items sold, total weekl earning, total earnings
        $total_items_sold = 0;
        $total_earnings_this_week = 0;
        $total_earnings = 0;
        $orders = Order::where('status','completed')->get();
        foreach ($orders as $order) {
            $menus = OrderMenu::where('order_id',$order->id)->get();
            foreach($menus as $menu){
                $total_items_sold += $menu->menu_quantity;

                $sunday = strtotime("Sunday").date("Y-m-d h:i:sa");
                $monday = strtotime("Monday").date("Y-m-d h:i:sa");

                $menu_creation_date = ($menu->created_at).date("Y-m-d h:i:sa");
                
                /*
                //if the earning is just on this week
                if(mktime($menu_creation_date)  <= mktime($sunday) || mktime($menu_creation_date->created_at)  >= mktime($monday) ){
                    $total_earnings_this_week += $menu->menu_total_payment;
                }*/

                $total_earnings_this_week += $menu->menu_total_payment;
                $total_earnings += $menu->menu_total_payment;
            }
        }

        return view('welcome_admin',compact('users','total_items_sold','total_earnings_this_week','total_earnings'));

    }



    public function sales(){

        //MAIN Stats
            //get the members online aside from the admin
            $users = DB::table('users')->where('id','!=','1')->count();
            
            //get all the items sold, total weekl earning, total earnings
            $total_items_sold = 0;
            $total_earnings_this_week = 0;
            $total_earnings = 0;
            $orders = Order::where('status','completed')->get();
            foreach ($orders as $order) {
                $menus = OrderMenu::where('order_id',$order->id)->get();
                foreach($menus as $menu){
                    $total_items_sold += $menu->menu_quantity;

                    $sunday = strtotime("Sunday").date("Y-m-d h:i:sa");
                    $monday = strtotime("Monday").date("Y-m-d h:i:sa");

                    $menu_creation_date = ($menu->created_at).date("Y-m-d h:i:sa");
                    
                    /*
                    //if the earning is just on this week
                    if(mktime($menu_creation_date)  <= mktime($sunday) || mktime($menu_creation_date->created_at)  >= mktime($monday) ){
                        $total_earnings_this_week += $menu->menu_total_payment;
                    }*/

                    $total_earnings_this_week += $menu->menu_total_payment;
                    $total_earnings += $menu->menu_total_payment;
                }
            }
        //end of for Main Stats


        //Best Sellers
        //check if there are 
        $best_sellers = Menu::where('total_sales','>',0)->orderBy('total_sales','DESC')->take(5)->get(); 
        //end of Best Sellers


        //Highest Sales
        $highest_sales = Order::where('status','completed')->orderBy('total_payment','DESC')->take(5)->get();
        $users_all = User::all();
        //end of 

        $salesTotal = 0;
        $all_sales = Order::all();
        foreach($all_sales as $sale){
            $salesTotal += $sale->total_payment;
        }
        

        $today_salesTotal = 0;
        $week_salesTotal = 0;
        $month_salesTotal = 0;
        $all_salesTotal = 0;

        //Sales
            $TODAY_sales = Order::whereDate('created_at', today())->get();
            foreach($TODAY_sales as $sale){
                $today_salesTotal += $sale->total_payment;
            }
            
            $WEEK_sales = Order::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->get();
            foreach($WEEK_sales as $sale){
                $week_salesTotal += $sale->total_payment;
            }
            
            $MONTH_sales = Order::whereMonth('created_at', now()->month)->get();
            foreach($MONTH_sales as $sale){
                $month_salesTotal += $sale->total_payment;
            }
            
            $ALL_sales = Order::all();
            foreach($ALL_sales as $sale){
                $all_salesTotal += $sale->total_payment;
            }
        //end of Sales
        


        
        return view('admin.sales.index',compact('users','total_items_sold','total_earnings_this_week','total_earnings','best_sellers','highest_sales','users_all','all_sales','salesTotal','today_salesTotal','week_salesTotal','month_salesTotal','all_salesTotal'));
        

    }


    //search function on sales
    public function search_sales(Request $request){
        //dd($request->all());

        //MAIN Stats
            //get the members online aside from the admin
            $users = DB::table('users')->where('id','!=','1')->count();
            
            //get all the items sold, total weekl earning, total earnings
            $total_items_sold = 0;
            $total_earnings_this_week = 0;
            $total_earnings = 0;
            $orders = Order::where('status','completed')->get();
            foreach ($orders as $order) {
                $menus = OrderMenu::where('order_id',$order->id)->get();
                foreach($menus as $menu){
                    $total_items_sold += $menu->menu_quantity;

                    $sunday = strtotime("Sunday").date("Y-m-d h:i:sa");
                    $monday = strtotime("Monday").date("Y-m-d h:i:sa");

                    $menu_creation_date = ($menu->created_at).date("Y-m-d h:i:sa");
                    
                    /*
                    //if the earning is just on this week
                    if(mktime($menu_creation_date)  <= mktime($sunday) || mktime($menu_creation_date->created_at)  >= mktime($monday) ){
                        $total_earnings_this_week += $menu->menu_total_payment;
                    }*/

                    $total_earnings_this_week += $menu->menu_total_payment;
                    $total_earnings += $menu->menu_total_payment;
                }
            }
        //end of for Main Stats


        //Best Sellers
        //check if there are 
        $best_sellers = Menu::where('total_sales','>',0)->orderBy('total_sales','DESC')->take(5)->get(); 
        //end of Best Sellers


        //Highest Sales
        $highest_sales = Order::where('status','completed')->orderBy('total_payment','DESC')->take(5)->get();
        $users_all = User::all();
        //end of 

        $salesTotal = 0;

        //check the request
        if($request->sales_date == 'today'){
            $all_sales = Order::whereDate('created_at', today())->get();
            foreach($all_sales as $sale){
                $salesTotal += $sale->total_payment;
            }
        }else if($request->sales_date == 'this_week'){
            $all_sales = Order::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->get();
            foreach($all_sales as $sale){
                $salesTotal += $sale->total_payment;
            }
        }else if($request->sales_date == 'this_month'){
            $all_sales = Order::whereMonth('created_at', now()->month)->get();
            foreach($all_sales as $sale){
                $salesTotal += $sale->total_payment;
            }
        }else if($request->sales_date == 'all'){
            $all_sales = Order::all();
            foreach($all_sales as $sale){
                $salesTotal += $sale->total_payment;
            }
        }
        

        $today_salesTotal = 0;
        $week_salesTotal = 0;
        $month_salesTotal = 0;
        $all_salesTotal = 0;

        //Sales
            $TODAY_sales = Order::whereDate('created_at', today())->get();
            foreach($TODAY_sales as $sale){
                $today_salesTotal += $sale->total_payment;
            }
            
            $WEEK_sales = Order::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->get();
            foreach($WEEK_sales as $sale){
                $week_salesTotal += $sale->total_payment;
            }
            
            $MONTH_sales = Order::whereMonth('created_at', now()->month)->get();
            foreach($MONTH_sales as $sale){
                $month_salesTotal += $sale->total_payment;
            }
            
            $ALL_sales = Order::all();
            foreach($ALL_sales as $sale){
                $all_salesTotal += $sale->total_payment;
            }
        //end of Sales
    
        
        return view('admin.sales.index',compact('users','total_items_sold','total_earnings_this_week','total_earnings','best_sellers','highest_sales','users_all','all_sales','salesTotal','today_salesTotal','week_salesTotal','month_salesTotal','all_salesTotal'));
        

    }

}

