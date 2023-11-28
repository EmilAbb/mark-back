<?php

namespace App\Services;


use App\Http\Requests\LegalRequest;
use App\Http\Requests\NewsRequest;
use App\Models\Legal;
use App\Models\News;
use App\Repositories\LegalRepository;
use App\Repositories\NewsRepository;
use Illuminate\Support\Facades\Cache;


class LegalService
{
    public function __construct(protected LegalRepository $repository,protected FileUploadService $fileUploadService)
    {

    }

    public function dataAllWithPaginate()
    {
        return $this->repository->paginate(5,['translations']);
    }

    public function store(LegalRequest $legalRequest)
    {
        $data = $legalRequest->all();
        unset($data['_token']);
        $model = Legal::create($data);
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
       Cache::forget('legal');
    }

    public function cachedLegal()
    {
        return Cache::rememberForever('legal',fn() => $this->repository->all());
    }





}
