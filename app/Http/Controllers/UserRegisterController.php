<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UserRegisterRequest;
use DateTimeImmutable;

class UserRegisterController extends Controller
{
    public function create(Request $request): View|RedirectResponse 
    {
        if($request->complete){
            return redirect()->route('user.register.complete');
        }

        return view('user.register.create');
    }

    public function store(UserRegisterRequest $request, DateTimeImmutable $currentdate): RedirectResponse
    {
        $input = $request->all();
        unset($input['_token'], $input['password_confirmation']);

        // Log::debug(json_encode($input, JSON_PRETTY_PRINT));

        $params = [
            'email' => $input['email'],
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'password' => password_hash($input['password'], PASSWORD_BCRYPT),
            'created_at' => $currentdate->format("Y-m-d H:i:s"),
            'updated_at' => $currentdate->format("Y-m-d H:i:s"),
        ]; 

        DB::table('users')->insert($params);

        return redirect()->route('user.register.create', ['complete']);
    }
}
