<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Page;
use Validator;


class PagesEditController extends Controller
{
    //
    public function execute(Request $request, Page $page)
    {

        if ($request->isMethod('delete')){

            $page->delete();
            return redirect()->route('pages')
                ->withStatus('Страница удалена.');

        }

        if ($request->isMethod('post')){
            $input = $request->except('files', 'old_images', '_token');
            $validator = Validator::make($input, [
                'title' => 'required|max:255',
                'alias' => 'required|max:255|unique:pages,alias,' . $input['id'],
                'caption' => 'required',
                'text' => 'required',
            ], [
                'required' => 'Поле :attribute должно быть заполнено.',
                'unique' => 'Поле :attribute должно быть уникальным.',
                'max' => 'Поле :attribute должно содержать не больше :max символов',
            ]);
            
            if($validator->fails()){
                return redirect()->route('pagesEdit', ['page' => $input['id']])
                    ->withErrors($validator);
            }

            if($request->hasFile('images')){
                $file = $request->file('images');
                $file_name = $file->getClientOriginalName();
                $file->move(public_path() . '/img', $file_name);
                $input['images'] = $file_name;
            } else {
                $input['images'] = $request['old_images'];
            }

            $page->fill($input);
            if($page->update()){
                return redirect()->route('pagesEdit', ['page' => $input['id']])
                    ->withStatus('Страница обновлена.');
            }
            //$page->save();
        }
        //$page = Page::find($id);

        $old_data = $page->toArray();
        $title = 'Редактирование страницы ' . $old_data['title'];

        return view('admin.pages_edit', compact('old_data', 'title'));
    }
}
