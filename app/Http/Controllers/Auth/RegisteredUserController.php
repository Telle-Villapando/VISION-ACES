<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Members;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rules\Enum;
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
    //  */
    
    public function store(Request $request): RedirectResponse
{
    //dd('Register controller working');

    $request->validate([
        'firstName' => ['required', 'string', 'max:255'],
        'middleName' => ['required', 'string', 'max:255'],
        'lastName' => ['required', 'string', 'max:255'],
        'studentNumber' => ['required', 'string', 'max:255', 'unique:members,studentNumber'],
        'course' => ['required', 'string', 'in:BSCPE,DCPET'],
        'gender' =>['required', 'in:Female, Male, LGBTQ+'],
        'contactNumber' =>['required', 'string'],

        'yearLevel' => ['required', 'in:1st,2nd,3rd,4th'],
        'address' => ['required', 'string', 'max:255'],
        'age' => ['required', 'string'],
        'studentStatus' => ['required', 'in:Regular, Irregular, Alumni'],
        'birthDate' => ['required', 'date', 'before:today'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
    ]);
  // dd('Validation passed');

    // Create Member first
    $member = Members::create([
        'firstName' => $request->firstName,
        'middleName' => $request->middleName,
        'lastName' => $request->lastName,
        'studentNumber' => $request->studentNumber,
        'course' => $request->course,
        'gender' =>$request->gender,
        'contactNumber' =>$request->contactNumber,
        'yearLevel' => $request->yearLevel,
        'address' => $request->address,
        'age' => $request->age,
        'studentStatus' => $request->studentStatus,
        'birthDate' =>$request->birthDate,
    ]);

    // Then create User and assign member_id
    $user = User::create([
        'name' => $request->firstName,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'member_id' => $member->id, 
    ]);

    event(new Registered($user));
    Auth::login($user);

    return redirect(route('dashboard'));
}

}
