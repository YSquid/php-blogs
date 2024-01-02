<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagsController extends Controller
{
    public function createTag(Request $request) {
        $incomingFields = $request->validate([
            'name' => 'required'
        ]);

        $incomingFields['name'] = strip_tags($incomingFields['name']);
        Tag::create($incomingFields);
        return redirect('/admin');
    }

    public function index() {
    return Tag::all();
    }
    
}
