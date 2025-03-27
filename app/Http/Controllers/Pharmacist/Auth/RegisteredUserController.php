<?php

namespace App\Http\Controllers\Pharmacist\Auth;

use App\Http\Controllers\Controller;
use App\Models\Pharmacist;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('pharmacist.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.Pharmacist::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'Phone' => ['required', 'string', 'max:255', 'unique:'.Pharmacist::class],
            'certificateId'=>['required','string','min:10','max:255','unique:'.Pharmacist::class],
            'address' => ['required','string','max:255'],
            'latitude' => ['required','numeric','between:-90,90'],
            'longitude' => ['required','numeric','between:-180,180'],
            



        ]);

        $pharmacist = Pharmacist::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'Phone' => $request->Phone,
            'address'=>$request->address,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'certificateId'=>$request->certificateId,
            
        ]);

        event(new Registered($pharmacist));
        session()->flash('register');
        return redirect(route('pharmacist.login', absolute: false));
    }
}
