<?php

namespace App\Http\Controllers;

use App\Color;
use App\Filters\UserFilters;
use App\Gender;
use App\User;
use App\Country;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(Request $request, UserFilters $filters)
    {
        $users = User::filter($filters)->paginate(9);

        if($request->ajax())
            return view('users.users', compact('users'));

        //get data for filters
        $ages = [
            'min' => User::min('age'),
            'max' => User::max('age'),
        ];
        $heights = [
            'min' => User::min('height'),
            'max' => User::max('height'),
        ];
        $countries = Country::withCount('users')->get();
        $genders = Gender::withCount('users')->get();
        $colors = Color::withCount('users')->get();

        return view('users.index', compact('users', 'countries', 'genders', 'colors', 'ages', 'heights'));
    }

}
