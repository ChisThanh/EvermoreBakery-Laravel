<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Vonage\Client\Credentials\Basic;
use Vonage\SMS\Message\SMS;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // $basic = new Basic(
        //     env("VONAGE_KEY"),
        //     env("VONAGE_SECRET")
        // );
        // $client = new \Vonage\Client($basic);
        // $BrandName = env("VONAGE_BRAND_NAME");
        // $to = "84399323006";
        // $randomNumber = rand(1000, 9999);
        // $messageText = 'Mã xác thực của bạn là: ' . $randomNumber;

        // try {
        //     $response = $client->sms()->send(new SMS($to, $BrandName, $messageText));
        //     $message = $response->current();

        //     if ($message->getStatus() == 0) {
        //         dd("The message was sent successfully\n");
        //     } else {
        //         dd("The message failed with status: " . $message->getStatus() . "\n");
        //     }
        // } catch (\Exception $e) {
        //     dd("The message failed with exception: " . $e->getMessage() . "\n");
        // }


        // dd('ok');


        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
