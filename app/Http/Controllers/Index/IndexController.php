<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(){
        return view("index.index");
    }
    public function showlist(){
        return view("index.list");
    }
    public function shownew(){
        return view("index.new");
    }
    public function showemail(){
        return view("index.email");
    }
    public function showegbook(){
        return view("index.gbook");
    }

}
