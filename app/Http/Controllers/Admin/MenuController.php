<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutInfoRequest;
use App\Http\Requests\AboutRequest;
use App\Http\Requests\HeaderRequest;
use App\Http\Requests\LegalRequest;
use App\Http\Requests\MenuRequest;
use App\Http\Requests\NewsRequest;
use App\Models\About;
use App\Models\AboutInfo;
use App\Models\Header;
use App\Models\Legal;
use App\Models\Menu;
use App\Models\News;
use App\Services\AboutInfoService;
use App\Services\AboutService;
use App\Services\HeaderService;
use App\Services\LegalService;
use App\Services\MenuService;
use App\Services\NewsService;

class MenuController extends Controller
{
    public MenuService $service;
    public function __construct(MenuService $service)
    {
        $this->service = $service;
    }

    public function getMenusData()
    {
        $menus = Menu::all();
        return response()->json($menus);
    }




    public function index()
    {
        $models=Menu::with(['translations'])->paginate(5);
        return view('admin.menus.index',['models'=>$models]);
    }

    public function create()
    {

        return view('admin.menus.form');
    }

    public function store(MenuRequest $menuRequest)
    {
        $this->service->store($menuRequest);
        return redirect()->route('admin.menus.index');
    }

    public function edit(Menu $menu)
    {

        return view('admin.menus.form',['model'=>$menu]);
    }

    public function update(MenuRequest $menuRequest ,Menu $menu)
    {
        $this->service->update($menuRequest,$menu);
        return redirect()->back();
    }

    public function destroy(Menu $menu)
    {
        $this->service->delete($menu);
        return redirect()->back();
    }
}
