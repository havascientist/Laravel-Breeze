<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'username' => ['required', 'string', 'max:100'],
            'fullname' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()], // Sesuaikan dengan kebutuhan keamanan aplikasi Anda
            'address' => ['required', 'string', 'max:100'],
            'birthdate' => ['required', 'date'],
            'phoneNumber' => ['required', 'string', 'max:20'], // Pastikan ini sesuai dengan nama kolom dalam formulir
            'jenis_kelamin' => ['required','integer', 'min:0', 'max:1'], // Validasi untuk jenis_kelamin
            'agama' => ['required', 'string', 'max:20'], // Validasi untuk agama
        ]);
                
        

        $user = User::create([
            'username' => $request->username,
           'fullname' => $request->fullname,
           'email' => $request->email,
           'password' =>Hash::make($request->password),
           'address' => $request->adress,
           'birthdate' => $request->birthdate,
           'phonenumber' => $request->phonenumber,
           'jenis_kelamin' => $request->jenis_kelamin,
           'agama' => $request->agama,
        ]);

        event(new Registered($user));

        //Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
