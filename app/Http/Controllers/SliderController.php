<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::latest()->paginate();
        return view('slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "title" => 'required|string|max:50',
            "link" => 'nullable|string|max:255',
            "animation" => 'required|string|max:50',
            "direction" => 'required|string|max:50',
            "status" => 'required|boolean',
            "description" => 'required|string|max:100',
            "image" => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);
        if (request()->hasFile('image')) {
            $image = request()->file('image');
            $filename = $image->hashName();
            $image->move(public_path('images/slider'), $filename);
            $imageUrl = env("APP_URL") . '/images/slider/' . $filename;
        }
        Slider::create([
            'title' => request('title'),
            'link' => request('link'),
            'animation' => request('animation'),
            'direction' => request('direction'),
            'status' => request('status'),
            'description' => request('description'),
            'image' => $imageUrl,
        ]);
        return back()->with('success', 'Slider Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        $slider->status = !$slider->status;
        $slider->save();
        return back()->with('success', 'Slider Stutus Change Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            "title" => 'required|string|max:50',
            "link" => 'nullable|string|max:255',
            "animation" => 'required|string|max:50',
            "direction" => 'required|string|max:50',
            "status" => 'required|boolean',
            "description" => 'required|string|max:100',
            "image" => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);
        if (request()->hasFile('image')) {
            $image = request()->file('image');
            $filename = $image->hashName();
            $image->move(public_path('images/slider'), $filename);
            $imageUrl = env("APP_URL") . '/images/slider/' . $filename;
        }
        $slider->update([
            'title' => $request->title,
            'link' => $request->link,
            'animation' => $request->animation,
            'direction' => $request->direction,
            'status' => $request->status,
            'description' => $request->description,
            'image' => $imageUrl ?? $slider->image,
        ]);
        return back()->with('success', 'Slider Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();
        return back()->with('success', 'Slider Deleted Successfully');
    }
}
