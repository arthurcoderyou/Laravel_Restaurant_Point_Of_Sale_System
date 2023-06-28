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
        $orders = DB::select('select * from orders where user_id = ? AND status = ? ',[auth()->user()->id,'pending']);
    }else{
        $orders = DB::select('select * from orders where user_id = ? AND status = ? ',[2,'pending']);
    }
    


    foreach($orders as $order){
        $count++;
    }

@endphp 

<a href="{{ $orderLink }}">
    <i class="fas fa-truck"></i>Orders <span class="badge badge-info" style="margin-bottom:3px;">{{ $count }}</span>
    <span class="bot-line"></span>
</a>