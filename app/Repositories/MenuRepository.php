<?php

namespace App\Repositories;


use App\Models\About;
use App\Models\AboutInfo;
use App\Models\FooterMenu;
use App\Models\Menu;


class MenuRepository extends AbstractRepository
{
    protected $modelClass = Menu::class;

}
