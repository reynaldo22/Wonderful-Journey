<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Category;
use App\Article;
use Illuminate\Filesystem\Cache;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('articles')
                        ->join('categories','articles.categories_id','=','categories.id')
                        ->select('articles.*','categories.name')
                        ->get(); 
        return view('welcome',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'title' => 'required',
            'categories_id' => 'required',
            'image' => 'required',
            'description' => 'required',
        ]);

        $image = $request->file('image');
        $source = 'images';
        $image->move($source,$image->getClientOriginalName());

        $article = new Article();
        $article->user_id = $request->user_id;
        $article->title = $request->title;
        $article->categories_id = $request->categories_id;
        $article->image = $image->getClientOriginalName();
        $article->description = $request->description;
        // dd($article);
        $article->save();

        return back()->with('success', 'Article Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        $article = DB::table('articles')->where('categories_id', $id)->get();
        $data = [
            'category' => $category,
            'article' => $article,
        ];
        return view('category', compact('data'));
    }

    public function detail($id)
    {
        $data = Article::find($id);
        return view('detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::find($id);
        return view('edit', compact('data'));
    }

    public function article($id)
    {
        $data = DB::table('articles')->where('user_id', $id)->get();
        return view('article', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required|numeric',
        ]);

        $user = User::find($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');

        $user->save();

        return back()->with('success', 'User Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::destroy($id);
        return back()->with('success', 'Article deleted!');
    }
}
