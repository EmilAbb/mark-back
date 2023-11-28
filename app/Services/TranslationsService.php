<?php

namespace App\Services;

use App\Models\Translation;
use App\Repositories\TranslationsRepository;
use Illuminate\Support\Facades\Cache;
class TranslationsService
{

    public function __construct(protected TranslationsRepository $repository)
    {
    }
    public function dataAllWithPaginate()
    {
        return $this->repository->paginate(5,['translations']);
    }

    public function store()
    {
//        dd($sliderRequest);
        $data=request()->all();
        $model= $this->repository->save($data,new Translation());

        self::ClearCached();
        return $model;
    }
    public function update($model)
    {
        $data=request()->all();
        $model=$this->repository->save($data,$model);
        self::ClearCached();
        return $model;
    }

    public function delete($model)
    {
        self::ClearCached();
        return $this->repository->delete($model);
    }

    public function CachedTranslations()
    {
        return Cache::rememberForever('translations',
            function (){
                return $this->repository->all(with:['translations']);
            });
    }

    public static function ClearCached()
    {
        Cache::forget('translations');
    }
}
