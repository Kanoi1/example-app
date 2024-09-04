<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('contact');
    }

    public function submitForm(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                function ($attribute, $value, $fail) {
                    
                    $validDomains = ['com', 'org', 'net', 'edu']; 
                    $domain = substr(strrchr($value, "."), 1);
                    if (!in_array($domain, $validDomains)) {
                        $fail('El campo ' . $attribute . ' debe tener un dominio válido, como .com, .org, .net, o .edu.');
                    }
                },
            ],
            'message' => 'required|string',
            'subscribe' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->route('contact.form')
                ->withErrors($validator)
                ->withInput();
        }

        
        return redirect()->route('contact.form')->with('success', 'Gracias por contactarnos. Nos pondremos en contacto contigo pronto.');
    }
}

