<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutRequest;
use App\Http\Requests\HeaderRequest;
use App\Http\Requests\LegalRequest;
use App\Http\Requests\NewsRequest;
use App\Models\About;
use App\Models\Header;
use App\Models\Legal;
use App\Models\News;
use App\Services\AboutService;
use App\Services\HeaderService;
use App\Services\LegalService;
use App\Services\NewsService;

class AboutController extends Controller
{
    public AboutService $service;
    public function __construct(AboutService $service)
    {
        $this->service = $service;
    }

    public function getAboutLinks()
    {
        $aboutLinks = About::all();
        return response()->json($aboutLinks);
    }



    public function index()
    {
        $models=About::with(['translations'])->paginate(5);
        return view('admin.about.index',['models'=>$models]);
    }

    public function create()
    {

        return view('admin.about.form');
    }

    public function store(AboutRequest $aboutRequest)
    {
        $this->service->store($aboutRequest);
        return redirect()->route('admin.about.index');
    }

    public function edit(About $about)
    {

        return view('admin.about.form',['model'=>$about]);
    }

    public function update(AboutRequest $aboutRequest ,About $about)
    {
        $this->service->update($aboutRequest,$about);
        return redirect()->back();
    }

    public function destroy(About $about)
    {
        $this->service->delete($about);
        return redirect()->back();
    }
}
