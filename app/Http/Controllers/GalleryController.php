<?php

namespace App\Http\Controllers;

use App\Models\Images;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function galleryfrontend(){
        $images=Images::whereNull('study_id')->get();
        return view('frontend.pages.gallery',compact('images'));
    }
    public function index()
    {
        $images = Images::whereNull('study_id')->latest()->paginate();
        return view('gallery.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        request()->validate([
            'title' => 'required',
            'type' => 'required|in:0,1',
            'image' => 'required_if:type,==,0|file|mimes:jpeg,png,jpg,webp|max:2048',
            'video_link'=>'required_if:type,==,1',
        ],[
            'image.required_if' => 'Please upload an image',
            'video_link.required_if' => 'Please enter a video link'
        ]);
        if (request()->hasFile('image')) {
            $image = request()->file('image');
            $filename = $image->hashName();
            $image->move(public_path('images/gallery'), $filename);
            $imageUrl = env("APP_URL") . '/images/gallery/' . $filename;
        }
        Images::create([
            'title' => request('title'),
            'image_link' => request('type')===0?$imageUrl:request('video_link'),
            'type' => request('type'),
        ]);
        return back()->with('success', 'Image Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image=Images::findOrFail($id);
        $image->delete();
        return back()->with('success', 'Image Successfully Deleted');
    }
}
