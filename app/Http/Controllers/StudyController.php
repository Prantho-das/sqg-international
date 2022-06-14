<?php

namespace App\Http\Controllers;

use App\Models\Images;
use App\Models\Study;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use NunoMaduro\Collision\Adapters\Phpunit\Style;

class StudyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteImage($id)
    {
        Images::findOrFail($id)->delete();
        return ['message' => 'Image deleted'];
    }
    public function index()
    {
        $studies = Study::latest()->paginate();
        return view('study.index', compact('studies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('study.create');
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
            'title' => 'required|max:255',
            'description' => 'required',
            'short_description' => 'required',
            'banner' => 'required|image|mimes:jpeg,png,jpg,webp|max:3048',
            'mImage' => 'nullable|array',
            'mImage.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);
        try {
            DB::transaction(function () use ($request) {
                if (request()->hasFile('banner')) {
                    $image = request()->file('banner');
                    $filename = $image->hashName();
                    $image->move(public_path('images/banner'), $filename);
                    $imageUrl = env("APP_URL") . '/images/banner/' . $filename;
                }
                $study = Study::create([
                    'title' => $request->title,
                    'description' => $request->description,
                    'short_description' => $request->short_description,
                    'slug' => Str::slug($request->title, "_") . "-" . time(),
                    'banner' => $imageUrl
                ]);
                if (request()->hasFile('mImage')) {
                    $mimage = request()->file('mImage');
                    foreach ($mimage as $image) {
                        $filename = $image->hashName();
                        $image->move(public_path('images/study'), $filename);
                        $imageUrl = env("APP_URL") . '/images/study/' . $filename;
                        Images::create([
                            'image_link' => $imageUrl,
                            'study_id' => $study->id
                        ]);
                    }
                }
            });
            return back()->with('success', 'Study Created Successfully');
        } catch (\Exception $e) {
            info('Message=' . $e->getMessage() . 'Get Line =' . $e->getLine() . 'Get File=' . $e->getFile() . "Code=" . $e->getCode());
            throw $e;
        }
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
        $study = Study::with('images')->findOrFail($id);
        return view('study.edit', compact('study'));
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
        $study = Study::findOrFail($id);

        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'mImage' => 'nullable|array',
            'mImage.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3048',
            'short_description' => 'required',
            'banner' => ['nullable','image','mimes:jpeg,png,jpg,webp','max:2048'],
        ]);
        try {

            DB::transaction(function () use ($request, $study) {
                if (request()->hasFile('banner')) {
                    $image = request()->file('banner');
                    $filename = $image->hashName();
                    $image->move(public_path('images/banner'), $filename);
                    $imageUrl = env("APP_URL") . '/images/banner/' . $filename;
                }
                $study->update([
                    'title' => $request->title,
                    'description' => $request->description,
                    'short_description' => $request->short_description,
                    //'slug' => Str::slug($request->title, "_") . "-" . time(),
                    'banner' => $imageUrl ?? $study->banner
                ]);
                if (request()->hasFile('mImage')) {
                    $mimage = request()->file('mImage');
                    foreach ($mimage as $image) {
                        $filename = $image->hashName();
                        $image->move(public_path('images/study'), $filename);
                        $imageUrl = env("APP_URL") . '/images/study/' . $filename;
                        Images::create([
                            'image_link' => $imageUrl,
                            'study_id' => $study->id
                        ]);
                    }
                }
            });
            return back()->with('success', 'Study Updated Successfully');
        } catch (\Exception $e) {
            info('Message=' . $e->getMessage() . 'Get Line =' . $e->getLine() . 'Get File=' . $e->getFile() . "Code=" . $e->getCode());
            throw $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slide = Study::findOrFail($id);
        Images::where('study_id', $id)->delete();
        $slide->delete();
        return  back()->with('success', 'Study Deleted Successfully');
    }
}
