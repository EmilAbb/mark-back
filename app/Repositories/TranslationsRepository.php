<?php

namespace App\Repositories;


use App\Models\About;
use App\Models\FooterMenu;
use App\Models\Translation;


class TranslationsRepository extends AbstractRepository
{
    protected $modelClass = Translation::class;

}
