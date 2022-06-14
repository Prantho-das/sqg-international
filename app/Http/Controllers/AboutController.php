<?php

namespace App\Http\Controllers;

use App\Models\CeoTeam;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AboutController extends Controller
{
    // our team section

    public function team()
    {
        $teams = CeoTeam::where('type', 'TEAM')->latest()->paginate();
        return view('about.team', compact('teams'));
    }
    public function teamCreate()
    {
        return view('about.teamCreate');
    }
    public function teamStore()
    {
        request()->validate([
            'name' => 'required',
            'designation' => 'required',
            'email' => 'nullable|email',
            'message' => 'required',
            'phone' => 'nullable|max:20',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if (request()->hasFile('image')) {
            $image = request()->file('image');
            $filename = $image->hashName();
            $image->move(public_path('images'), $filename);
            $imageUrl = env("APP_URL") . '/images/' . $filename;
        }
        CeoTeam::create([
            'name' => request('name'),
            'phone' => request('phone'),
            'email' => request('email'),
            'designation' => request('designation'),
            'talk' => request('message'),
            'image' => request()->hasFile('image') ? $imageUrl : '',
            'type' => 'TEAM',
        ]);
        return back()->with('success', 'Member Successfully');
    }
    public function teamEdit($id)
    {
        $team = CeoTeam::findOrFail($id);
        return view('about.teamEdit', compact('team'));
    }
    public function teamUpdate($id)
    {
        request()->validate([
            'name' => 'required',
            'designation' => 'required',
            'email' => 'nullable|email',
            'message' => 'required',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $ceoteam = CeoTeam::findOrFail($id);
        if (request()->hasFile('image')) {
            $image = request()->file('image');
            $filename = $image->hashName();
            $image->move(public_path('images'), $filename);
            $imageUrl = env("APP_URL") . '/images/' . $filename;
        }

        $ceoteam->update([
            'name' => request('name'),
            'designation' => request('designation'),
            'email' => request('email'),
            'phone' => request('phone'),
            'talk' => request('message'),
            'image' => $imageUrl ?? $ceoteam->image,
            'type' => 'TEAM',
        ]);
        return back()->with('success', 'Team Memeber Successfully');
    }
    public function teamDelete($id)
    {
        $team = CeoTeam::findOrFail($id);
        $team->delete();
        return back()->with('success', 'Team Member  Deleted');
    }







    // our ceo team section
    public function ceoTalk()
    {
        $ceos = CeoTeam::where('type', 'CEO')->latest()->paginate();
        return view('about.ceoTalk', compact('ceos'));
    }
    public function ceoTalkCreate()
    {
        return view('about.ceoTalkCreate');
    }
    public function ceoTalkStore()
    {
        request()->validate([
            'name' => 'required',
            'designation' => 'required',
            'email' => 'nullable|email',
            'message' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if (request()->hasFile('image')) {
            $image = request()->file('image');
            $filename = $image->hashName();
            $image->move(public_path('images'), $filename);
            $imageUrl = env("APP_URL") . '/images/' . $filename;
        }
        CeoTeam::create([
            'name' => request('name'),
            'designation' => request('designation'),
            'email' => request('email'),
            'talk' => request('message'),
            'image' => $imageUrl,
            'type' => 'CEO',
        ]);
        return back()->with('success', 'CEO Talk Created Successfully');
    }
    public function ceoTalkEdit($id)
    {
        $ceo = CeoTeam::findOrFail($id);
        return view('about.ceoTalkEdit', compact('ceo'));
    }
    public function ceoTalkUpdate($id)
    {
        request()->validate([
            'name' => 'required',
            'designation' => 'required',
            'email' => 'nullable|email',
            'message' => 'required',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $ceoteam = CeoTeam::findOrFail($id);
        if (request()->hasFile('image')) {
            $image = request()->file('image');
            $filename = $image->hashName();
            $image->move(public_path('images'), $filename);
            $imageUrl = env("APP_URL") . '/images/' . $filename;
        }

        $ceoteam->update([
            'name' => request('name'),
            'designation' => request('designation'),
            'email' => request('email'),
            'talk' => request('message'),
            'image' => $imageUrl ?? $ceoteam->image,
            'type' => 'CEO',
        ]);
        return back()->with('success', 'CEO Talk Updated Successfully');
    }
    public function ceoTalkDelete($id)
    {
        $ceo = CeoTeam::findOrFail($id);
        $ceo->delete();
        return back()->with('success', 'Ceo Talk Deleted');
    }

    //service section


    public function service()
    {
        $services = Service::latest()->paginate();
        return view('about.service.index', compact('services'));
    }
    public function servicefrontend()
    {
        $services = Service::where('status',1)->get();
        return view('frontend.pages.service', compact('services'));
    }


    public function serviceCreate()
    {
        return view('about.service.create');
    }
    public function serviceStore()
    {
        request()->validate([
            'name' => 'required',
            'description' => 'nullable',
            'status' => 'required|boolean',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if (request()->hasFile('image')) {
            $image = request()->file('image');
            $filename = $image->hashName();
            $image->move(public_path('images/service'), $filename);
            $imageUrl = env("APP_URL") . '/images/service/' . $filename;
        }
        Service::create([
            'name' => request('name'),
            'description' => request('description'),
            'slug' => Str::slug(request('name'), '_') . time(),
            'status'=>request('status'),
            'image' => $imageUrl,
        ]);
        return back()->with('success', 'Service Created Successfully');
    }
    public function serviceEdit($id)
    {
        $service = Service::findOrFail($id);
        return view('about.service.edit', compact('service'));
    }
    public function serviceUpdate($id)
    {
        $service = Service::findOrFail($id);
        request()->validate([
            'name' => 'required',
            'description' => 'nullable',
            'status' => 'required|boolean',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if (request()->hasFile('image')) {
            $image = request()->file('image');
            $filename = $image->hashName();
            $image->move(public_path('images/service'), $filename);
            $imageUrl = env("APP_URL") . '/images/service/' . $filename;
        }
        $service->update([
            'name' => request('name'),
            'description' => request('description'),
            'slug' => Str::slug(request('name'), '_') . time(),
            'status' => request('status'),
            'image' => $imageUrl??$service->image,
        ]);
        return back()->with('success', 'Service Updated Successfully');
    }
    public function serviceDelete($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
        return back()->with('success', 'Service Deleted');
    }
}
