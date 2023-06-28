@php    
    
    //$count = Cart::where('user')

    /*
    $count3 = 0;
            $courses = DB::select('select distinct course_fee from courses ORDER BY course_fee LIMIT ?',[7]);
            foreach ($courses as $course) {
                $cs[$count3] = $course->course_fee;
                $count3++;
            }
    */
    $count = 0;

    if(auth()->check()){
        $carts = DB::select('select * from carts where user_id = ? ',[auth()->user()->id]);
    }else{
        $carts = DB::select('select * from carts where user_id = ? ',[2]);
    }
    


    foreach($carts as $cart){
        $count++;
    }

@endphp 

<a href="{{ $cartLink }}">
    <i class="fas fa-shopping-cart"></i>Cart <span class="badge badge-warning" style="margin-bottom:3px;">{{ $count }}</span>
    <span class="bot-line"></span>
</a>