<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Requests;
use App\Page;

class PagesController extends Controller
{
    //
    public function execute()
    {
        if(view()->exists('admin.pages')) {
            $pages = Page::all();
            $title = 'Страницы';
            return view('admin.pages', compact('pages', 'title'));
        }
    }
}
