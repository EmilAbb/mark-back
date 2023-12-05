<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HeaderRequest;
use App\Http\Requests\NewsRequest;
use App\Models\Header;
use App\Models\News;
use App\Services\HeaderService;
use App\Services\NewsService;

class NewsController extends Controller
{
    public NewsService $service;
    public function __construct(NewsService $service)
    {
        $this->service = $service;
    }

    public function getNewsData()
    {
        $newsData = News::all();
        return response()->json($newsData);
    }

    public function show($id)
    {
        $news = News::findOrFail($id);

        return response()->json($news);
    }

    public function index()
    {
        $models=News::with(['translations'])->paginate(5);
        return view('admin.news.index',['models'=>$models]);
    }

    public function create()
    {

        return view('admin.news.form');
    }

    public function store(NewsRequest $newsRequest)
    {
        $this->service->store($newsRequest);
        return redirect()->route('admin.news.index');
    }

    public function edit(News $news)
    {

        return view('admin.news.form',['model'=>$news]);
    }

    public function update(NewsRequest $newsRequest ,News $news)
    {
        $this->service->update($newsRequest,$news);
        return redirect()->back();
    }

    public function destroy(News $news)
    {
        $this->service->delete($news);
        return redirect()->back();
    }
}
