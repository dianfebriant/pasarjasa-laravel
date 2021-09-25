<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Information;
use App\Models\Technician;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //

  public function index(){

    $technician = Technician::all();
    $information = Information::all();
    $category = Category::all();
    return view('front.index', compact('category', 'technician', 'information'));
  }

    public function show_kategori(Technician $technician){
        $technician = Technician::all();
     return view('front.technician', compact('technician'));
     
    }

    }
  

