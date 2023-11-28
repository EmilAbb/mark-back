<?php

namespace App\Services;


use App\Http\Requests\AboutInfoRequest;
use App\Http\Requests\AboutRequest;
use App\Http\Requests\LegalRequest;
use App\Http\Requests\NewsRequest;
use App\Models\About;
use App\Models\AboutInfo;
use App\Models\Legal;
use App\Models\News;
use App\Repositories\AboutInfoRepository;
use App\Repositories\AboutRepository;
use App\Repositories\LegalRepository;
use App\Repositories\NewsRepository;
use Illuminate\Support\Facades\Cache;


class AboutInfoService
{
    public function __construct(protected AboutInfoRepository $repository,protected FileUploadService $fileUploadService)
    {

    }

    public function dataAllWithPaginate()
    {
        return $this->repository->paginate(5,['translations']);
    }

    public function store(AboutInfoRequest $aboutInfoRequest)
    {
        $data = $aboutInfoRequest->all();
        unset($data['_token']);
        $model = AboutInfo::create($data);
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
       Cache::forget('about_info');
    }

    public function cachedAboutInfo()
    {
        return Cache::rememberForever('about_info',fn() => $this->repository->all());
    }





}
