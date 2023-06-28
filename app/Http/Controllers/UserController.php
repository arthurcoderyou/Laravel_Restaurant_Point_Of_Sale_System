<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //show all menus
    public function welcome(){
        $menus = Menu::all();
        return view('admin.menu.index',compact('menus'));
    }
    
}
