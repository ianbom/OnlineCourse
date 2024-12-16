<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ContentRequest;
use App\Models\Content;
use App\Models\Course;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $content = Content::all();
        return view('web.admin.content.index_content', ['content' => $content]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   $course = Course::all();
        return view('web.admin.content.create_content', ['course' => $course]);
    }


    public function store(ContentRequest $request)
    {
        $data = $request->all();
        Content::create($data);
        return redirect()->back()->with('success', 'Content created successfully');
    }


    public function show(string $id)
    {
        $content = Content::findOrFail($id); 
        return view('web.admin.content.show_content', compact('content'));
    }

    public function edit(string $id)
    {
        $content = Content::findOrFail($id);
        $course = Course::all();
        return view('web.admin.content.edit_content', compact('content', 'course'));
    }
    public function update(ContentRequest $request, string $id)
    {
        $data = $request->all();
        $content = Content::findOrFail($id);
        $content->update($data);
        return redirect()->back()->with('success', 'Content updated successfully');
    }


    public function destroy(string $id)
    {
        $content = Content::findOrFail($id);
        $content->delete();
        return redirect()->back()->with('success', 'Content deleted successfully');
    }

}
