<?php

namespace App\Http\Controllers;

use App\Models\Technician;
use App\Models\Category;
use Illuminate\Http\Request;

class TechnicianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $technician = Technician::latest()->paginate(10);
        return view('admin.teknisi.index', compact('technician'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        return view('admin.teknisi.create', [
            'category' => Category::all()
        ]);
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
            'category_id' => 'required',
            'name' => 'required',
            'address' => 'required',
            'telephone' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);

        $technician = New Technician();
        $technician->category_id = $request->input('category_id');
        $technician->name = $request->input('name');
        $technician->slug = \Str::slug(request('name'));
        $technician->address = $request->input('address');
        $technician->telephone = $request->input('telephone');
        
        if($request->hasFile('image')){
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $image->move('uploads/teknisi/', $filename);
            $technician->image = $filename;
        }
        $technician->save();
            //redirect dengan pesan sukses
            return redirect()->route('technician.index')->with(['success' => 'Data Berhasil Ditambahkan!']);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Technician  $technician
     * @return \Illuminate\Http\Response
     */
    public function show(Technician $technician)
    {
        //
      
        return view('front.technician', [
            'category' => Category::all(),
            'technician' => Technician::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Technician  $technician
     * @return \Illuminate\Http\Response
     */
    public function edit(Technician $technician)
    {
        //
        return view('admin.teknisi.edit', compact('technician'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Technician  $technician
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Technician $technician)
    {
        //

        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'telephone' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);

     

        $technician->name = $request->name;
        $technician->slug = \Str::slug(request('name'));
        $technician->address = $request->address;
        $technician->telephone = $request->telephone;
        
        if($request->hasFile('image')){
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $image->move('uploads/teknisi/', $filename);
            $technician->image = $filename;
        }
        $technician->save();
            //redirect dengan pesan sukses
            return redirect()->route('technician.index')->with(['success' => 'Data Berhasil Ditambahkan!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Technician  $technician
     * @return \Illuminate\Http\Response
     */
    public function destroy(Technician $technician)
    {
        //

        $technician->delete_image();
        $technician->delete();
        return redirect('technician')->with('success', 'Hapus Data Berhasil');
    }
}
