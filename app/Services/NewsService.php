<?php

namespace App\Services;


use App\Http\Requests\NewsRequest;
use App\Models\News;
use App\Repositories\NewsRepository;
use Illuminate\Support\Facades\Cache;


class NewsService
{
    public function __construct(protected NewsRepository $repository,protected FileUploadService $fileUploadService)
    {

    }

    public function dataAllWithPaginate()
    {
        return $this->repository->paginate(5,['translations']);
    }

    public function store(NewsRequest $newsRequest)
    {
        $data = $newsRequest->all();
        unset($data['_token']);
        $model = News::create($data);
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
       Cache::forget('news');
    }

    public function cachedNews()
    {
        return Cache::rememberForever('news',fn() => $this->repository->all());
    }





}
