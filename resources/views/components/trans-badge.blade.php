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
    $orders = DB::select('select * from orders where status = ? ',[$spanData]);
    foreach($orders as $order){
        $count++;
    }

@endphp 
<span class="badge badge-{{ $color }}">{{ $count }}</span>