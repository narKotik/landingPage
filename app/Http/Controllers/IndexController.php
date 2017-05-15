<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Page;
use App\Service;
use App\Portfolio;
use App\Employee;
use DB;
use Mail;

class IndexController extends Controller
{
    //
    public function execute(Request $request)
    {
        if( $request->isMethod('post') ){

            $this->validate($request, [
                'name' => 'required|min:2|max:255',
                'email' => 'required|email',
                'message' => 'required',
            ],[
                'required' => 'Поле :attribute обязательно к заполнению',
                'email' => 'Поле :attribute должно соответсвовать email адресу',
                'min' => 'Поле :attribute должно содержать минимум :min символа',
                'max' => 'Поле :attribute должно содержать максимум :max символа',
            ]);

            $data = $request->all();

            $result = Mail::send('site.email', ['data' => $data], function($message) use ($data){
                $mail_admin = env('MAIL_ADMIN');

                $message->from($data['email'], $data['name']);
                $message->to($mail_admin, 'NoBody');
                $message->subject('Question');
            });
            //dump($request);

            if ($result){
                return redirect('/#contact')->with('status', 'Сообщение отпрвлено.');
            }
        }


        $pages = Page::all();
        $portfolios = Portfolio::get(['caption', 'filter', 'images']);
        $tags = DB::table('portfolios')->distinct()->lists('filter');//Portfolio::get(['filter']);
        $services = Service::all();
        $employees = Employee::all();

        //dump($employees);
        $menu = [];
        foreach ($pages as $page) {
            $item = [
                'title' => $page->title,
                'alias' => $page->alias,
            ];
            $menu[] = $item;
        }

        //dd($menu);
        $item = [
            'title' => 'services',
            'alias' => 'services',
        ];
        $menu[] = $item;
        $item = [
            'title' => 'portfolio',
            'alias' => 'portfolio',
        ];
        $menu[] = $item;
        $item = [
            'title' => 'team',
            'alias' => 'team',
        ];
        $menu[] = $item;
        $item = [
            'title' => 'contact',
            'alias' => 'contact',
        ];
        $menu[] = $item;

        return view('site.index', [
            'menu' => $menu,
            'pages' => $pages,
            'portfolios' => $portfolios,
            'services' => $services,
            'employees' => $employees,
            'tags' => $tags,
        ]);
    }
}
