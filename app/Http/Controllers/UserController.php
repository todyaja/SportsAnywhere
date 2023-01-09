<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\AreaRating;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

// use alert;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('home');
    }

    //function buat ke home
    public function home()
    {
        $data = Area::orderBy('areas.updated_at', 'desc')->take(20)->get();
        foreach ($data as $d) {
            $rating = Booking::leftJoin('area_ratings', 'area_ratings.booking_id', '=', 'bookings.booking_id')->where('area_id', $d->id)->get()->avg('rating');
            $d->rating = number_format($rating == null ? 0 : $rating, 1);
        }

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

    public function profile()
    {
        // dd("halo");

        $userInfo = User::where('id', '=', auth()->user()->id)->get()->first();
        // $userShow = User::where('id', '=', $user->id)->auth()->user()->id;
        return view('profile.profile', compact(['userInfo']));

        // return view('profile.profile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
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
        if (Auth::attempt($request->only('email', 'password'))) {
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

        return view('profile');
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
        $this->validate($request, [
            'username' => 'required|min:5',
            'phone_number' => 'required|min:6|max:15',
        ]);

        $userInfo = User::where('id', '=', auth()->user()->id)->get()->first();
        $userInfo->username = $request->username;
        $userInfo->phone_number = $request->phone_number;

        if ($request->hasfile('profile_image')) {
            if($userInfo->profile_picture != "guest.jpg"){
                unlink('assets/profile_pictures/'.$userInfo->profile_picture);
            }
            $file = $request->file('profile_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('assets/profile_pictures/', $filename);
            $userInfo->profile_picture = $filename;

        }
        $userInfo->update();

        return view('profile.profile', compact(['userInfo']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::where('id', $id)->first();
        if($user->profile_picture != "guest.jpg"){
            unlink('assets/profile_pictures/'.$user->profile_picture);
        }

        $user->delete();
        return redirect('/')
            ->with('alert', $user->email . ' has been deleted successfully!');
    }

    public function manageUser()
    {
        $data = User::where('role', '!=', '2')->get();
        return view('admin.manage_user', compact(['data']));
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
