
@php 

    //get the user
    $total = 0;
    //$user = DB::table('users')->find($userId);
    
    $carts = DB::select('select * from carts where user_id = ? ', [$userId]);



    $total = 0;
    //$initial_cost = 0;
    foreach ($carts as $cart) {
        //$total += $cart->quantity;
        $menus = DB::select('select * from menus where id = ? ',[$cart->menu_id]);
        foreach ($menus as $menu) {
            $price = $menu->price;
        }
        
        $quantity = $cart->quantity;
        $initial_cost = $price * $quantity;
        $total += $initial_cost;

    }


@endphp

<p style="font-size:2rem;"><span class="text-success" style="font-weight: bold;">P</span> {{ $total }}</p>