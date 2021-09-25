<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\str;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $information = Information::latest()->paginate(10);
        return view('admin.informasi.index', compact('information'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.informasi.create');
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
        $request->validate([
            'name'         => 'required',
            'body'  => 'required',
            'image'        => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);


        $information = New Information();
        $information->name = $request->input('name');
        $information->slug = \Str::slug(request('name'));
        $information->body = $request->input('body');

        if($request->hasFile('image')){
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $image->move('uploads/information/', $filename);
            $information->image = $filename;
        }
        $information->save();
            //redirect dengan pesan sukses
            return redirect()->route('information.index')->with(['success' => 'Data Berhasil Ditambahkan!']);

    

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function show(Information $information)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\iInformation  $information
     * @return \Illuminate\Http\Response
     */
    public function edit(Information $information)
    {
        //
        return view('admin.informasi.edit', compact('information'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Information $information)
    {
        //

        $request->validate([
            'name'         => 'required|max:255',
            'body'  => 'required',
            'image'        => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);


        $information->name = $request->name;
        $information->slug = \Str::slug(request('name'));
        $information->body = $request->body;

        if($request->hasFile('image')){
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $image->move('uploads/information/', $filename);
            $information->image = $filename;
        }
        $information->save();
            //redirect dengan pesan sukses
            return redirect()->route('information.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function destroy(iInformation $information)
    {
        //
        $information>delete_image();
        $information>delete();
        return redirect('information')->with('success', 'Hapus Data Berhasil');
    }
}
