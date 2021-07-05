<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {

        $this->middleware(['auth', 'role:User'])->only(['create', 'store']);
        $this->middleware('auth')->only(['index', 'destroy']);
    }


    public function index()
    {
        $userid = Auth::user()->id;
        $articles = Article::where('user_id', $userid)->get();

        return view('article.allarticles', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();

        return view('article.createarticle', ['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'title' => ['required', 'max:255'],
            'description' => ['required'],
            'image' => ['required', 'file', 'mimes:jpg,jpeg,png,gif', 'max:10000'],
        ]);

        $image = $request->image;
        $imagename = $image->getClientOriginalName();

        Storage::putFileAs('public/images', $image, $imagename);

        Article::create([
            'user_id' => Auth::user()->id,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagename,
        ]);
        
        return redirect()->back()->with('status', 'Blog Posted');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
        return view('article.show', ['article'=>$article]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
        Storage::delete('public/images/'.$article->image);
        $article->delete();
        return redirect()->back()->with('status', 'Article Deleted');
    }
}
