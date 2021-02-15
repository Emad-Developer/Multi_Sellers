<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
    public function create()
    {
        return view('collections.createTags');
    }

    public function store(Request $request)
    {
        // Validate
        $request->validate([
            'tag_name'=>'required|string|max:100',
        ]);

        // Store in DB
        Tag::create([
            'tag_name'=>$request->tag_name,
        ]);
        
        return redirect(route('create_tag'));
    }
}
