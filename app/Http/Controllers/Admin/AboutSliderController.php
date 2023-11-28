<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutSliderRequest;
use App\Http\Requests\HeaderRequest;
use App\Http\Requests\HomeSliderRequest;
use App\Models\AboutSlider;
use App\Models\Header;
use App\Models\HomeSlider;
use App\Services\AboutSliderService;
use App\Services\HeaderService;
use App\Services\HomeSliderService;

class AboutSliderController extends Controller
{
    public AboutSliderService $service;
    public function __construct(AboutSliderService $service)
    {
        $this->service = $service;
    }

    public function getAboutSliderData()
    {
        $aboutSliderData = AboutSlider::all();
        return response()->json($aboutSliderData);

  }



    public function index()
    {
        $models=AboutSlider::all();
        return view('admin.aboutSlider.index',['models'=>$models]);
    }

    public function create()
    {

        return view('admin.aboutSlider.form');
    }

    public function store(AboutSliderRequest $aboutSliderRequest)
    {
        $this->service->store($aboutSliderRequest);
        return redirect()->route('admin.aboutSlider.index');
    }

    public function edit(AboutSlider $aboutSlider)
    {

        return view('admin.aboutSlider.form',['model'=>$aboutSlider]);
    }

    public function update(AboutSliderRequest $aboutSliderRequest ,AboutSlider $aboutSlider)
    {
        $this->service->update($aboutSliderRequest,$aboutSlider);
        return redirect()->back();
    }

    public function destroy(AboutSlider $aboutSlider)
    {
        $this->service->delete($aboutSlider);
        return redirect()->back();
    }
}
