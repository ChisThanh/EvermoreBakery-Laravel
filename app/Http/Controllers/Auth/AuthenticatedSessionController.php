<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $token = Auth::user()
            ->createToken(
                'authToken',
                ['*'],
                Carbon::now()->addDays(30)
            )->plainTextToken;

        Session::put('apiToken', $token);
        $cookie_id = request()->cookie('cart_id');

        \DB::statement("UPDATE product_interactions SET user_id = :user_id WHERE cookie_id = :cookie_id", [
            'user_id' => Auth::id(),
            'cookie_id' => $cookie_id,
        ]);
        
        return redirect()->intended(route('home', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
