<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PemateriRequest;
use App\Models\Pemateri;
use Illuminate\Http\Request;

class PemateriController extends Controller
{
    public function index(){
        $pemateri = Pemateri::all();
        return view('web.admin.pemateri.index_pemateri', ['pemateri' => $pemateri]);
    }

    public function create(){
        return view('web.admin.pemateri.create_pemateri');
    }

    public function store(PemateriRequest $request){
        $data = $request->all();

        if ($request->hasFile('foto')) {
            $imagePath = $request->file('foto')->store('pemateri/foto', 'public');
            $data['foto'] = $imagePath;
        }
        Pemateri::create($data);
        return redirect()->route('pemateri.index')->with('success', 'Data pemateri berhasil dibuat');
    }

    public function edit(Pemateri $pemateri){
        return view('web.admin.pemateri.edit_pemateri', ['pemateri' => $pemateri]);
    }

    public function update(PemateriRequest $request, Pemateri $pemateri){
        $data = $request->all();
        if ($request->hasFile('foto')) {
            $imagePath = $request->file('foto')->store('pemateri/foto', 'public');
            $data['foto'] = $imagePath;
        } else{
            $data['foto'] = $pemateri->foto;
        }

        $pemateri->update($data);
        return redirect()->route('pemateri.index')->with('success', 'Data pemateri telah diupdate');
    }


    public function destroy(Pemateri $pemateri){
        $pemateri->delete();
        return redirect()->route('pemateri.index')->with('success', 'Data pemateri berhasil dihapus');
    }
}
