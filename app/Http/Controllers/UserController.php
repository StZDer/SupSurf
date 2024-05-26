<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Point;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $roles = Role::all();
        $users = User::all();
        $points = Point::all();
        return view('user.index', compact(['users','roles','points']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $roles = Role::all();
        $points = Point::all();
        return view('user.show',compact(['user','roles','points']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        // $user->update($request->all());
        // return redirect()->route('home')->with('success', 'Успешно изменен');
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->patronymic = $request->input('patronymic');
        $user->login = $request->input('login');
        $user->role_id = $request->input('role_id');
        $user->point_id = $request->input('point_id');
        if ($request->password != $request->password_confirmation) {
            return redirect()->route('user.show', compact('user'))->with('delete', 'Пароли не совпадают');
        }
        if (Hash::check($request->password, $user->password)) {
            return redirect()->route('user.show', compact('user'))->with('delete', 'Такой пароль уже задан');
        }
        if ($request->password != 0) {
            $user->password = Hash::make($request['password']);
            $user->save();
            return redirect()->route('user.show', compact('user'))->with('success', 'Пользователь был изменен c паролем');
        }
        $user->save();
        return redirect()->route('user.show', compact('user'))->with('success', 'Пользователь был изменен');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success', 'Пользователь удален');
    }
    public function updatePoint(Request $request, User $user)
    {
        $user->update($request->all());
        return redirect()->route('home')->with('success', 'Успешно изменен');
    }
}
