<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.posts.index', [
            'data' => Posts::where('user_id', auth()->user()->id)->get(),
        ]);
    }

    public function createForm() {
        return view('dashboard.posts.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'category_id' => ['required'],
            'slug' => ['required', 'unique:posts'],
            'tittle' => ['required', 'max:255'],
            'article' => ['required'],
            'image' => ['image']
        ]);
        
        if($request->file('image')) {
            $fileName = $request['slug'] . '-' . date('Y-m-d His') . '.' . $request->file('image')->extension();
            $validatedData['image'] = $request->file('image')->storeAs('post-images', $fileName);
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['posted_at'] = date("Y-m-d H:i:s");

        Posts::create($validatedData);
        return redirect('/dashboard/posts')->with('success', 'Post berhasil dibuat');
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function show(Posts $posts)
    {
        return view('dashboard.posts.show', [
            'data' => $posts
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit(Posts $posts)
    {
        return view('dashboard.posts.edit', [
            'categories' => Category::all(),
            'post' => $posts
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Posts $posts)
    {
        $rules = [
            'category_id' => ['required'],            
            'tittle' => ['required', 'max:255'],
            'article' => ['required'],
            'image' => ['image']
        ];

        if($request->slug != $posts->slug) {
            $rules['slug'] = ['required', 'unique:posts'];
        }

        $validatedData = $request->validate($rules);
        $validatedData['user_id'] = auth()->user()->id;
        
        if($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $fileName = $request['slug'] . '-' . date('Y-m-d His') . '.' . $request->file('image')->extension();
            $validatedData['image'] = $request->file('image')->storeAs('post-images', $fileName);            
        }

        Posts::where('id', $posts->id)->update($validatedData);

        return redirect('/dashboard/posts')->with('success', 'Post berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Posts $posts) {
        if($posts->image) {
            Storage::delete($posts->image);
        }
        Posts::destroy($posts->id);
        return redirect('/dashboard/posts')->with('success', 'Post berhasil dihapus');
    }

    public function checkSlug(Request $request) {
        $slug = SlugService::createSlug(Posts::class, 'slug', $request->tittle);
        return response()->json(['slug' => $slug]);
    }
}
