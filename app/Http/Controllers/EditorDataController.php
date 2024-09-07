<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class EditorDataController extends Controller
{
    // Controller method in Laravel
    public function getEditorData($id)
    {
        $post = Blog::find($id);
        return response()->json(json_decode($post->data)); // Assuming `content` stores Editor.js output
    }
}
