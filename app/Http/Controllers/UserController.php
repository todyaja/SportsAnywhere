<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


        return view('home');
    }

    //function buat ke home
    public function home()
    {
        $data = Area::leftJoin('area_ratings', 'areas.id', '=', 'area_ratings.area_id')->orderBy('areas.updated_at', 'desc')->take(20)->get();
        $data = $data->transform(function ($dt) {
                if ($dt->rating == null){
                    $dt->rating = 0;
                }
                return $dt;
            });

        return view('home', compact(['data']));
    }

    //function buat login
    public function login()
    {
        //

        return view('login');
    }
    //function buat register
    public function register()
    {
        //

        return view('register');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       $this->validate($request,[
            'role' => 'required',
            'username' => 'required|min:5',
            'email' => 'required|unique:users,email',
            'phone_number' => 'required|min:6|max:15',
            'password' => 'required|min:6',
            'confirm_password' => 'required_with:password|same:password|min:6'

        ]);

        User::create([
            'role' => $request->role,
            'username' => $request->username,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => bcrypt($request->password),
        ]);

        return redirect('/login');

    }

    public function loginProcess(Request $request)
    {
        if(Auth::attempt($request->only('email', 'password')))
        {
            return redirect('/');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
