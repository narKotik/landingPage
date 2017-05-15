<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use App\Page;

class PagesAddController extends Controller
{
    //
    public function execute(Request $request)
    {
        if ($request->isMethod('post')) {

            $input = $request->except('_token', 'files', 'images');

            $validator = Validator::make($input, [
                'title' => 'required|max:255',
                'caption' => 'required|max:255',
                'alias' => 'required|unique:pages|max:255',
                'text' => 'required',
            ], [
                'required' => 'Поле :attribute должно быть заполнено.',
                'unique' => 'Поле :attribute должно быть уникальным.',
                'max' => 'Поле :attribute должно содержать не больше :max символов',
            ]);
            if($validator->fails()){
                return redirect()->route('pagesAdd')->withErrors($validator)->withInput();
            }


            if ($request->hasFile('images')){
                $file = $request->file('images');
                $input['images'] = $file->getClientOriginalName();

                $file->move(public_path() . '/img', $input['images']);

            }

            $page = new Page($input);

            if ($page->save()){
                return redirect()->route('pagesAdd')->with('status', 'Страница добавлена.');
            }
        }

        $title = 'Добавление новай страницы';
        return view('admin.pages_add', compact('title'));
    }
}
