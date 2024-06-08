<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!Gate::allows('isSupervisor', Auth::user())){
            abort(403);
        }
        $users = User::all();

        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(!Gate::allows('isSupervisor', Auth::user())){
            abort(403);
        }
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!Gate::allows('isSupervisor', Auth::user())){
            abort(403);
        }
        $data = [
          'name' => $request['name'],
          'email' => $request['email'],
          'password' => bcrypt('LIS123456'),
          'role' => $request['role'],
        ];

        User::create($data);

        return redirect(route('user.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        if(!Gate::allows('isSupervisor', Auth::user())){
            abort(403);
        }
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        if(!Gate::allows('isSupervisor', Auth::user())){
            abort(403);
        }
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        if(!Gate::allows('isSupervisor', Auth::user())){
            abort(403);
        }
        $data = [
            'name' => $request['name'],
            'email' => $request['email'],
            'role' => $request['role'],
        ];

        $user->update($data);

        return redirect(route('user.index'));
    }

    public function updateProfile(Request $request, User $user)
    {

        $data = [
            'password' => bcrypt($request['password']),
        ];

        $user->update($data);

        return redirect(route('user.profile'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if(!Gate::allows('isSupervisor', Auth::user())){
            abort(403);
        }
        $user->delete();

        return redirect(route('user.index'));
    }

    public function profile(){
        $user = Auth::user();

        return view('user.profile', compact('user'));
    }
}
