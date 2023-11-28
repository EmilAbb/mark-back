<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactMessageRequest;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class SiteController extends Controller
{

    public function home()
    {
        return view('front.home');
    }
    public function create(ContactMessageRequest $contactMessageRequest)
    {
        $message = $contactMessageRequest->validated();
        ContactMessage::create($message);
        return redirect()->back();
    }
}
