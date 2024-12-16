<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MateriRequest;
use App\Models\Content;
use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materi = Materi::all();
        return view('web.admin.materi.index_materi', ['materi' => $materi]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $content = Content::all();
        return view('web.admin.materi.create_materi', ['content' => $content]);
    }

    public function store(MateriRequest $request)
    {
        try {
            $data = $request->all();

            // Handle video file upload
            if ($request->hasFile('video')) {
                $videoPath = $request->file('video')->store('materi/video', 'public');
                $data['video'] = $videoPath;
            }

            // Handle text book file upload
            if ($request->hasFile('text_book')) {
                $textBookPath = $request->file('text_book')->store('materi/text_book', 'public');
                $data['text_book'] = $textBookPath;
            }

            // Create Materi record
            Materi::create($data);

            // Redirect with success message
            return redirect()->back()->with('success', 'Materi berhasil dibuat!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }


    public function show(string $id)
    {
        $materi = Materi::findOrFail($id);
        return view('web.admin.materi.show_materi', ['materi' => $materi]);
    }


    public function edit(string $id)
    {
        $materi = Materi::findOrFail($id);
        $content = Content::all();
        return view('web.admin.materi.edit_materi', ['materi' => $materi, 'content' => $content]);
    }

    public function update(MateriRequest $request, string $id)
{
    try {
        $materi = Materi::findOrFail($id);
        $data = $request->all();


        if ($request->hasFile('video')) {
            if ($materi->video) {
                Storage::disk('public')->delete($materi->video);
            }
            $videoPath = $request->file('video')->store('materi/video', 'public');
            $data['video'] = $videoPath;
        } else {
            $data['video'] = $materi->video;
        }


        if ($request->hasFile('text_book')) {
            if ($materi->text_book) {
                Storage::disk('public')->delete($materi->text_book);
            }

            $textBookPath = $request->file('text_book')->store('materi/text_book', 'public');
            $data['text_book'] = $textBookPath;
        } else {
            $data['text_book'] = $materi->text_book;
        }
        $materi->update($data);

        return redirect()->back()->with('success', 'Materi has been updated');
    } catch (\Throwable $th) {
    
        return response()->json(['error' => $th->getMessage()]);
    }
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
