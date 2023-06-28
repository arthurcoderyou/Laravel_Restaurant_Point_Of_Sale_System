<?php
  $order = DB::table('orders')->find($order_id);
  $order_menus = DB::table('order_menus')->where('order_id',$order_id)->get();

?>
<html>
<head>
  <title>Regies Food Haus Reciept</title>
  <style>
    body{
      font-family: Helvetica;
    }
    h3{
      text-align: center;
      text-transform: uppercase;
      color: #4CAF50;
    }
    p{
      text-indent: 50px;
      text-align: center;
      letter-spacing: 3px;
    }
    
    table{
      border-collapse: collapse;
      border-radius: 10px;
      padding: 15px;
    }
    legend{
      font-size: 1.3rem;
      margin-bottom: 12px;
    }
    .money_sign{
      font-weight: bold;
      color:green;
    }
    
    th, td{ 
      padding: 8px; 
      border-bottom: 1px solid #ddd;

    }
    
  </style>
</head>
<body>
    <h3>Regie's Food Haus</h3>
  <p>Thank you for ordering. Please submit and pay the ammount on the cashier and wait for your food to be served.</p>
  <p>Enjoy our meal and Thank you :)</p>

  <table style="width: 100%;">
    <legend>Order Summary</legend>
   

    <tr>
      <th>Menu Name</th>
      <th>Menu Price</th>
      <th>Menu Quantity</th>
      <th>Menu Total Payment</th>
    </tr>
    @foreach ($order_menus as $menu)
      <tr style="text-align: center">
        <td>{{ $menu->menu_name }}</td>
        <td><span class="money_sign">P</span> {{ $menu->menu_price }}</td>
        <td>{{ $menu->menu_quantity }}</td>
        <td><span class="money_sign">P</span> {{ $menu->menu_total_payment }}</td>
      </tr>
    @endforeach

    <tr style="text-align: center">
      <td colspan="3">Total : </td>
      <td><span class="money_sign">P</span> {{ $order->total_payment }}</td>
    </tr>
  </table>
</body>
  
</html>
