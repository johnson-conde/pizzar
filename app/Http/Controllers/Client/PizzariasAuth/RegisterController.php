<?php

namespace App\Http\Controllers\Client\PizzariasAuth;

use App\Pizzaria;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    public $guard;
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/pizzarias/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->guard = Auth::guard("pizzaria");
        $this->middleware('pizzaria.guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nome' => 'required|max:255',
            'contacto' => 'required|max:255',
            'email' => 'required|max:255|unique:pizzarias',
            'endereco' => 'required|max:255',
            'imagem' => 'required',
            'username' => 'required|max:255|unique:pizzarias',
            'password' => 'required|min:6|confirmed',
            'descricao' => 'required|min:50',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $dataFill = uploadImage($data,'imagem');
        return Pizzaria::create([
            'nome' => $dataFill['nome'],
            'contacto' => $dataFill['contacto'],
            'email' => $dataFill['email'],
            'endereco' => $dataFill['endereco'],
            'imagem' => $dataFill['imagem'],
            'username' => $dataFill['username'],
            'descricao' => $dataFill['descricao'],
            'password' => bcrypt($dataFill['password']),
        ]);
    }

    public function showRegistrationForm()
    {
        return view('pizzarias.cadastrar');
    }

    protected function guard()
    {
        return $this->guard;
    }
}
