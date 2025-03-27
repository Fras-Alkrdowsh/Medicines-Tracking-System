<?php

namespace App\Http\Controllers\Pharmacist\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\PharmacistLoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('pharmacist.auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(PharmacistLoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        session()->flash('welcome');

        return redirect()->intended(route('pharmacist.dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('pharmacist')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
