<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Page;

class PageController extends Controller
{
    //
    public function execute(Request $request, $alias=null)
    {
        if (!$alias){
            abort(404);
        }

        if(view()->exists('site.page')){
            $page = Page::where('alias', $alias)->first();
            return view('site.page', compact('page'));
        }

        abort(404);
    }
}
