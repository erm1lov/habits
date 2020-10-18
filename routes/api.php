<?php

use App\Http\Resources\Habit as ResourcesHabit;
use App\Http\Resources\HabitCollection;
use App\Models\Habit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/habits', function(Request $request) {
    // emulate user login in api
    $user = User::find(2);
    Auth::login($user);

    $habits = Habit::active()->lang();

    if ($request->filled('title')) {
        $title = $request->input('title');
        $habits->where('title', 'like', "%$title%");

        return new HabitCollection($habits->paginate());
    }

    $page = $request->input('page', '');
    $lang = auth()->user()->lang;

    return cache()->rememberForever("${lang}-habits-page${page}", function () use ($habits){
        return new HabitCollection($habits->paginate());
    });
});
