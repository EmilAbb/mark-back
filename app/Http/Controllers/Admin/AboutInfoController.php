<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutInfoRequest;
use App\Http\Requests\AboutRequest;
use App\Http\Requests\HeaderRequest;
use App\Http\Requests\LegalRequest;
use App\Http\Requests\NewsRequest;
use App\Models\About;
use App\Models\AboutInfo;
use App\Models\Header;
use App\Models\Legal;
use App\Models\News;
use App\Services\AboutInfoService;
use App\Services\AboutService;
use App\Services\HeaderService;
use App\Services\LegalService;
use App\Services\NewsService;

class AboutInfoController extends Controller
{
    public AboutInfoService $service;
    public function __construct(AboutInfoService $service)
    {
        $this->service = $service;
    }

    public function getAboutInfo()
    {
        $aboutInfo = AboutInfo::all();
        return response()->json($aboutInfo);
  }



    public function index()
    {
        $models=AboutInfo::with(['translations'])->paginate(5);
        return view('admin.aboutInfo.index',['models'=>$models]);
    }

    public function create()
    {

        return view('admin.aboutInfo.form');
    }

    public function store(AboutInfoRequest $aboutInfoRequest)
    {
        $this->service->store($aboutInfoRequest);
        return redirect()->route('admin.aboutInfo.index');
    }

    public function edit(AboutInfo $aboutInfo)
    {

        return view('admin.aboutInfo.form',['model'=>$aboutInfo]);
    }

    public function update(AboutInfoRequest $aboutInfoRequest ,AboutInfo $aboutInfo)
    {
        $this->service->update($aboutInfoRequest,$aboutInfo);
        return redirect()->back();
    }

    public function destroy(AboutInfo $aboutInfo)
    {
        $this->service->delete($aboutInfo);
        return redirect()->back();
    }
}
