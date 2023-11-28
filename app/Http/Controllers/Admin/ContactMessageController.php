<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactMessageRequest;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{



    public function index()
    {
        $contactMessage = ContactMessage::all();
        return view('admin.contactForm.index',compact('contactMessage'));
    }

    public function store(Request $request)
    {
        $formData = $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);
        $savedData = ContactMessage::create($formData);
        return response()->json($savedData);
    }

    public function destroy($id)
    {
        $contactMessage = ContactMessage::where('id', $id)->firstOrFail();
        $contactMessage->delete();

        return redirect()->back();
    }
}
