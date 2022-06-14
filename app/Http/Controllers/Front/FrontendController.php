<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\CeoTeam;
use App\Models\Service;
use App\Models\Settings;
use App\Models\Study;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function about()
    {
        $ceos=CeoTeam::where('type','CEO')->get();
        $teams=CeoTeam::where('type','TEAM')->get();
        $services=Service::get();
        return view('frontend.pages.about',compact('ceos','teams','services'));
    }
    public function study($slug)
    {
        $study=Study::with('images')->where('slug',$slug)->firstOrFail();
        return view('frontend.pages.study', compact('study'));
    }
    public function setting()
    {
        $setting = Settings::first();
        return view('setting', compact('setting'));
    }
    public function settingStore()
    {
        $setting = Settings::first();
        $url = 'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
        request()->validate([
            "name" => 'required|max:20',
            "email" => 'required|email',
            "phone" => 'required|digits:11',
            "alt_phone" => 'digits:11',
            "facebook" => "nullable|$url",
            "twitter" => "nullable|$url",
            "instagram" => "nullable|$url",
            "wapp" => "nullable|$url",
            "address" => 'required|min:10',
            "logo" => 'sometimes|image|mimes:jpeg,png,jpg|max:2048'
        ], ['wapp.regex' => 'Please enter a valid Whats App url']);
        if (!isset($setting->logo) && !request()->hasFile('logo')) {
            return back()->withInput()->withErrors(['logo' => 'Please upload a logo']);
        }
        $social_links = [
            "facebook" => request('facebook'),
            "twitter" => request('twitter'),
            "instagram" => request('instagram'),
            "whatsapp" => request('wapp'),
        ];
        if (request()->hasFile('logo')) {
            $logo = request()->file('logo');
            $filename = $logo->hashName();
            $logo->move(public_path('images'), $filename);
            $imageUrl = env("APP_URL") . '/images/' . $filename;
        }
        if (!isset($setting)) {
            Settings::create([
                "name" => request('name'),
                "email" => request('email'),
                "phone" => [request('phone'), request('alt_phone')],
                "social_links" => $social_links,
                "address" => request('address'),
                "logo" => $imageUrl
            ]);

        } else {
            $setting->update([
                "name" => request('name'),
                "email" => request('email'),
                "phone" => [request('phone'), request('alt_phone')],
                "social_links" => $social_links,
                "address" => request('address'),
                "logo" => $imageUrl ?? $setting->logo
            ]);
        }
        return back()->with('success', 'Setting updated successfully');
    }
}
