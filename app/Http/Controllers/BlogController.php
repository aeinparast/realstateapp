<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::orderBy('updated_at', 'desc')->paginate(30);
        return view('blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        // Validate request data
        $validated = $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg,webp|max:2048',
            'title' => 'required|string',
            'tags' => 'required|string'
        ]);


        //Handle file upload if an image exists
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('photos', $imageName, 'liara');
            // Merge the path into validated data
            $validated['logo'] = $path;
        }
        $validated['user_id'] = Auth::id();
        $validated['data'] = '';

        // Create the city using validated data
        Blog::create($validated);

        // Redirect with success message
        return redirect()->route('blog.index')->with('success', 'پست با موفقیت ساخته شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        $articles = json_decode($blog['data'], true);
        return view('blog.view', compact('blog', 'articles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        //

        $blog_content = $request->validate([
            'title' => 'required|min:3',
            'content' => 'required|json', // Ensure content is JSON
            'public' => 'required|boolean'
        ]);
        // Save the content to the database
        $blog->title = $blog_content['title'];
        $blog->data = $blog_content['content'];
        $blog->public = $blog_content['public'];


        $blog->save();
        return redirect()->route('blog.index')->with('success', 'پست با موفقیت ویرایش شد');

        return;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('blog.index')->with('removed', 'پست با موفقیت ساخته شد');
    }
}
