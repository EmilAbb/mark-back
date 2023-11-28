<?php

namespace App\Services;


use App\Http\Requests\FooterMenuRequest;
use App\Http\Requests\LegalRequest;
use App\Http\Requests\NewsRequest;
use App\Models\FooterMenu;
use App\Models\Legal;
use App\Models\News;
use App\Repositories\FooterMenuRepository;
use App\Repositories\LegalRepository;
use App\Repositories\NewsRepository;
use Illuminate\Support\Facades\Cache;


class FooterMenuService
{
    public function __construct(protected FooterMenuRepository $repository,protected FileUploadService $fileUploadService)
    {

    }

    public function dataAllWithPaginate()
    {
        return $this->repository->paginate(5,['translations']);
    }

    public function store(FooterMenuRequest $footerMenuRequest)
    {
        $data = $footerMenuRequest->all();
        unset($data['_token']);
        $model = FooterMenu::create($data);
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
       Cache::forget('footer_menu');
    }

    public function cachedFooterMenu()
    {
        return Cache::rememberForever('footer_menu',fn() => $this->repository->all());
    }





}
