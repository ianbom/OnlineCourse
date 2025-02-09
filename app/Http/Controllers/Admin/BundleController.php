<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BundleRequest;
use App\Models\Bundle;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BundleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
        $bundle = Bundle::get();

       return view('web.admin.bundle.index_bundle', ['bundle' => $bundle]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }

    }

    public function dataBundle(){
        $query = Bundle::query();

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($bundle) {
                return view('web.admin.bundle.action_bundle', compact('bundle'))->render();
            })
            ->editColumn('created_at', function ($bundle) {
                return $bundle->created_at->format('d-m-Y');
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function create()
    {
        return view('web.admin.bundle.create_bundle');
    }

    public function store(BundleRequest $request)
    {
        $data = $request->all();
        Bundle::create($data);

        return redirect()->route('bundle.index')->with('success', 'Bundle created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $bundle = Bundle::findOrFail($id);
        return view('web.admin.bundle.edit_bundle', ['bundle' => $bundle]);
    }

    public function update(BundleRequest $request, string $id)
    {
        $bundle = Bundle::findOrFail($id);
        $data = $request->all();
        $bundle->update($data);

        return redirect()->route('bundle.index')->with('success', 'Paket Langganan Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bundle = Bundle::findOrFail($id);
        $bundle->delete();

        return redirect()->back()->with('success', 'Paket Langganan Berhasil Dihapus');
    }
}
