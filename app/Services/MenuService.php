<?php

namespace App\Services;


use App\Http\Requests\AboutInfoRequest;
use App\Http\Requests\AboutRequest;
use App\Http\Requests\LegalRequest;
use App\Http\Requests\MenuRequest;
use App\Http\Requests\NewsRequest;
use App\Models\About;
use App\Models\AboutInfo;
use App\Models\Legal;
use App\Models\Menu;
use App\Models\News;
use App\Repositories\AboutInfoRepository;
use App\Repositories\AboutRepository;
use App\Repositories\LegalRepository;
use App\Repositories\MenuRepository;
use App\Repositories\NewsRepository;
use Illuminate\Support\Facades\Cache;


class MenuService
{
    public function __construct(protected MenuRepository $repository,protected FileUploadService $fileUploadService)
    {

    }

    public function dataAllWithPaginate()
    {
        return $this->repository->paginate(5,['translations']);
    }

    public function store(MenuRequest $menuRequest)
    {
        $data = $menuRequest->all();
        unset($data['_token']);
        $model = Menu::create($data);
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
       Cache::forget('menus');
    }

    public function cachedMenu()
    {
        return Cache::rememberForever('menus',fn() => $this->repository->all());
    }





}
