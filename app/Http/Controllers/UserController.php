<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Menampilkan informasi tentang user yang login
     */
    public function index()
    {
        $user = User::find(Auth::user()->id);
        return view('profile.userprofile', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Menambah data Customer Service
     */
    public function register(Request $request)
    {
        Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'password' => ['required', 'string'],
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'User',
        ]);
        return redirect('login')->with('success','Berhasil Login');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update data user yang login
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        if ($request->input('password')) {
            // Update password
            $validate = Validator::make($request->all(),[
                'password' => ['required', 'confirmed'],
            ]);
            if ($validate->fails()) {
                return redirect()->back();
            }
            $user->update([
                'password' => Hash::make($request->input('password'))
            ]);
            session()->flush();
            return redirect('login');
        } else {
            // Update data normal
            $validate = Validator::make($request->all(), [
                'name' => ['required', 'string'],
                'email' => ['required', 'string', 'email', 'unique:users'],
            ]);
            if ($validate->fails()) {
                return redirect()->back();
            }
            $user->update($request->all());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // Login User
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/')->with('success','Berhasil Login');
        }
        return back();
    }

    public function logout()
    {
        session()->flush();
        return redirect('login');
    }
}
