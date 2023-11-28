<?php

namespace App\Services;


use App\Http\Requests\AboutRequest;
use App\Http\Requests\LegalRequest;
use App\Http\Requests\NewsRequest;
use App\Models\About;
use App\Models\Legal;
use App\Models\News;
use App\Repositories\AboutRepository;
use App\Repositories\LegalRepository;
use App\Repositories\NewsRepository;
use Illuminate\Support\Facades\Cache;


class AboutService
{
    public function __construct(protected AboutRepository $repository,protected FileUploadService $fileUploadService)
    {

    }

    public function dataAllWithPaginate()
    {
        return $this->repository->paginate(5,['translations']);
    }

    public function store(AboutRequest $aboutRequest)
    {
        $data = $aboutRequest->all();
        unset($data['_token']);
        $model = About::create($data);
        self::clearCache();
        return $model;
    }

    public function update($request,$model)
    {
        $data = $request->all();
        $model =   $this->repository->save($data,$model );
        self::clearCache();
        return $model;
    }


    public function delete($model)
    {
        self::clearCache();
        return $this->repository->delete($model);
    }

    public static function clearCache()
    {
       Cache::forget('about');
    }

    public function cachedAbout()
    {
        return Cache::rememberForever('about',fn() => $this->repository->all());
    }





}
