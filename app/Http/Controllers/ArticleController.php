<?php

namespace App\Http\Controllers;

use App\Article;
use App\Country;
use App\Tag;
use App\User;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->is_admin == 1) {
            $articles = Article::orderBy('created_at', 'desc')->paginate(4);
            $users = User::all();
            $tags = Tag::all();
            return view('articles.index', compact('articles', 'users', 'tags'));
        } else {
            return redirect('home');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->is_admin == 1){
            return view('articles.create');
        } else {
            return redirect('home');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'bail|required|unique:articles|max:255',
            'body' => 'required',
        ]);

        if ($file = $request->file('image')){
            $name = $file->getClientOriginalName();
            $post = new Article;
            $post->title = $request->input('title');
            $post->body = $request->input('body');
            $post->date = $request->input('date');
            $post->image = $name;
            $post->save();

            $file->move('images/upload', $name);
        } 
        
        if($post) {
            return redirect('articles')->with('status', 'Article Created Successfully!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $tags = Article::find($article->id)->tags;
        $article = Article::find($article->id);
        $comments = $article->comments;
        $user = User::find($article->user_id);
        $country = Country::where('id', $user->country_id)->get()->first();

        return view('articles.show', compact('tags', 'article', 'country', 'comments', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->is_admin == 1){
            $article = Article::findOrFail($id);
            return view('articles.create', compact('article'));
        } else {
            return redirect('home');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        if (Auth::user()->is_admin == 1) {
            if ($file = $request->file('image')) {
                $name = $file->getClientOriginalName();

                $post = Article::findOrFail($id);
                $post->title = $request->input('title');
                $post->body = $request->input('body');
                $post->published_at = $request->input('published_at');
                $post->image = $name;
                $post->save();

                $file->move('images/upload', $name);
            } else {
                $post = Article::findOrFail($id);
                $post->title = $request->input('title');
                $post->body = $request->input('body');
                $post->published_at = $request->input('published_at');
                $post->save();
            }
            
            if($post){
                return redirect('articles')->with('status', 'Article Update!');
            }
        }
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
    }

    public function main()
    {
        $articles = Article::where('user_id', 1)->orderBy('title', 'desc')->take(4)->get();
        $tags = Tag::all();
        return view('welcome', ['articles' => $articles, 'tags' => $tags]);
    }

    public function articles($id)
    {
        $user = User::find($id);
        return view('articles.articles', compact('user'));
    }
}
