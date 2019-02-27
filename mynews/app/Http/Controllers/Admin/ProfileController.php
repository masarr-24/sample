<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Profiles;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;

        if ($cond_title != '') {
            // 検索されたら検索結果を取得する
            $posts = Profiles::where('title', $cond_title)->get();
        } else {
            // それ以外はすべてのニュースを取得する
            $posts = Profiles::all();
        }

        return view('admin.profile.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    //
    public function add()
    {
        return view('admin.profile.create');
    }


    public function create(Request $request)
    {

      // 以下を追記
      // Varidationを行う
        $this->validate($request, Profiles::$rules);

        $profiles = new profiles;
        $form = $request->all();

        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        // フォームから送信されてきたimageを削除する
        //unset($form['image']);

        // データベースに保存する
        $profiles->fill($form);
        $profiles->save();

        return redirect('admin/profile/create');
    }


    public function edit(Request $request)
    {
      // profiles Modelからデータを取得する
      $profiles = profiles::find($request->id);

      return view('admin.profile.edit', ['profiles_form' => $profiles]);
    }


    public function update(Request $request)
    {
      $this->validate($request, profiles::$rules);
      $profiles = profiles::find($request->id);
      $profiles_form = $request->all();
      unset($profiles_form['_token']);

      $profiles->fill($profiles_form)->save();

      return redirect('admin/profiles/edit');
    }

    public function delete(Request $request)
    {
        $profiles = profiles::find($request->id);
        $profiles->delete();
        return redirect('admin/profiles/delete');
    }
}
