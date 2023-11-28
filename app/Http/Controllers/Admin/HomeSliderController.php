<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HeaderRequest;
use App\Http\Requests\HomeSliderRequest;
use App\Models\Header;
use App\Models\HomeSlider;
use App\Services\HeaderService;
use App\Services\HomeSliderService;

class HomeSliderController extends Controller
{
    public HomeSliderService $service;
    public function __construct(HomeSliderService $service)
    {
        $this->service = $service;
    }

    public function getHomeSliderData()
    {
        $homeSlider = HomeSlider::all();
        return response()->json($homeSlider);
    }



    public function index()
    {
        $models=HomeSlider::with(['translations'])->paginate(5);
        return view('admin.homeSlider.index',['models'=>$models]);
    }

    public function create()
    {

        return view('admin.homeSlider.form');
    }

    public function store(HomeSliderRequest $homeSliderRequest)
    {
        $this->service->store($homeSliderRequest);
        return redirect()->route('admin.homeSlider.index');
    }

    public function edit(HomeSlider $homeSlider)
    {

        return view('admin.homeSlider.form',['model'=>$homeSlider]);
    }

    public function update(HomeSliderRequest $homeSliderRequest ,HomeSlider $homeSlider)
    {
        $this->service->update($homeSliderRequest,$homeSlider);
        return redirect()->back();
    }

    public function destroy(HomeSlider $homeSlider)
    {
        $this->service->delete($homeSlider);
        return redirect()->back();
    }
}
