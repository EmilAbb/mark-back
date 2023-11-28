<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FooterMenuRequest;
use App\Http\Requests\HeaderRequest;
use App\Http\Requests\LegalRequest;
use App\Http\Requests\NewsRequest;
use App\Models\FooterMenu;
use App\Models\Header;
use App\Models\Legal;
use App\Models\News;
use App\Services\FooterMenuService;
use App\Services\HeaderService;
use App\Services\LegalService;
use App\Services\NewsService;

class FooterMenuController extends Controller
{
    public FooterMenuService $service;
    public function __construct(FooterMenuService $service)
    {
        $this->service = $service;
    }

    public function getFooterMenuData()
    {
        $footerMenuData = FooterMenu::all();
        return response()->json(['footerMenuData'=>$footerMenuData]);
    }



    public function index()
    {
        $models=FooterMenu::with(['translations'])->paginate(5);
        return view('admin.footer-menu.index',['models'=>$models]);
    }

    public function create()
    {

        return view('admin.footer-menu.form');
    }

    public function store(FooterMenuRequest $footerMenuRequest)
    {
        $this->service->store($footerMenuRequest);
        return redirect()->route('admin.footer-menu.index');
    }

    public function edit(FooterMenu $footerMenu)
    {

        return view('admin.footer-menu.form',['model'=>$footerMenu]);
    }

    public function update(FooterMenuRequest $footerMenuRequest ,FooterMenu $footerMenu)
    {
        $this->service->update($footerMenuRequest,$footerMenu);
        return redirect()->back();
    }

    public function destroy(FooterMenu $footerMenu)
    {
        $this->service->delete($footerMenu);
        return redirect()->back();
    }
}
