<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\RegisterRequest;
use App\Role;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register(RegisterRequest $request)
    {
        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }

    protected function create(array $data)
    {
        try {
            $user = User::create([
                'email' => $data['email'],
                'sex' => $data['sex'],
                'password' => Hash::make($data['password']),
            ]);

            $role = Role::where('slug', 'user')->first();
            $user->roles()->attach($role);
            return $user;
        } catch (\Exception $e){
            var_dump($e->getMessage());
        }
    }
}