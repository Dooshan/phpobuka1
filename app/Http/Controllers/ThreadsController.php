<?php

namespace App\Http\Controllers;

use App\Category;
use App\Thread;
use App\User;

use Illuminate\Http\Request;
use Monolog\Handler\NewRelicHandler;

class ThreadsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', 'edit', 'update']);
    }




    public function index($category_slug = null)
    {
        if ($category_slug) {

            $category_id = Category::where('slug', $category_slug)->first()->id;
            $threads = Thread::where('category_id', $category_id)->latest()->get();
        } else {
            $threads = Thread::latest()->get();
        }
        return view('threads.index', compact('threads'));;
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('threads.create');
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
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required|exists:categories,id'
        ]);



        $thread = Thread::create([

            'user_id' => auth()->id(),
            'category_id' => request('category_id'),
            'title' => request('title'),
            'body' => request('body')
        ]);
        return redirect($thread->path());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function show($categoryId, Thread $thread)
    {
        return view('threads.show', compact('thread'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function edit($categoryId, Thread $thread)
    {
        return view('threads.edit', compact('thread'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function update($category, Thread $thread)
    {
        if ($thread->user_id == auth()->id() || auth()->user()->is_admin == 1) {

            $thread->update(request([
                'title',
                'body'
            ]));

            return redirect('threads');
        }
        return 'niste autorizovani za ovo';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy($category, Thread $thread)
    {
        //svaki user moze samo svoj da  thread da obrise



        if ($thread->user_id == auth()->id() || auth()->user()->is_admin == 1) {

            $thread->replies()->delete();
            $thread->delete();

            return redirect('/threads');
        }
        //return redirect('/threads');
        return ('Nedozvoljena akcija');
    }
}
