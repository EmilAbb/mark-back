<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutInfoRequest;
use App\Http\Requests\AboutRequest;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\HeaderRequest;
use App\Http\Requests\LegalRequest;
use App\Http\Requests\NewsRequest;
use App\Models\About;
use App\Models\AboutInfo;
use App\Models\Contact;
use App\Models\Header;
use App\Models\Legal;
use App\Models\News;
use App\Services\AboutInfoService;
use App\Services\AboutService;
use App\Services\ContactService;
use App\Services\HeaderService;
use App\Services\LegalService;
use App\Services\NewsService;

class ContactController extends Controller
{
    public ContactService $service;
    public function __construct(ContactService $service)
    {
        $this->service = $service;
    }

    public function getContactData()
    {
        $contactData = Contact::all();
        return response()->json($contactData);
    }





    public function index()
    {
        $models=Contact::with(['translations'])->paginate(5);
        return view('admin.contact.index',['models'=>$models]);
    }

    public function create()
    {

        return view('admin.contact.form');
    }

    public function store(ContactRequest $contactRequest)
    {
        $this->service->store($contactRequest);
        return redirect()->route('admin.contact.index');
    }

    public function edit(Contact $contact)
    {

        return view('admin.contact.form',['model'=>$contact]);
    }

    public function update(ContactRequest $contactRequest ,Contact $contact)
    {
        $this->service->update($contactRequest,$contact);
        return redirect()->back();
    }

    public function destroy(Contact $contact)
    {
        $this->service->delete($contact);
        return redirect()->back();
    }
}
