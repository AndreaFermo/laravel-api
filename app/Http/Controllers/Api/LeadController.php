<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewContact;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    public function store(Request $request) {
        $data = $request->all();

        $validator = Validator::make($data,
        [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

    if ($validator->fails()) {
        return response()->json(
            [
                'succes' => false,
                'error' => $validator->errors()
            ]
        );
    }

    $newLead = new Lead();
    $newLead->fill($data);
    $newLead->save();

    $newContact = new NewContact($newLead);

    Mail::to('andreafermo.sd@gmail.com')->send($newContact);

    return response()->json([
        'success' => true
    ]);
    }
}
