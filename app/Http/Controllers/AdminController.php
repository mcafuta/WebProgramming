<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function users()
    {
        $users = User::with('statuses')->get();

        foreach ( $users as $user ) {
            $data[$user->id]["total"]    = count($user->statuses);
            $data[$user->id]["incomes"]  =
                count(array_where($user->statuses->toArray(), function($value) { return $value['type'] == "income"; }));
            $data[$user->id]["goals"]    =
                count(array_where($user->statuses->toArray(), function($value) { return $value['type'] == "goal"; }));
            $data[$user->id]["expenses"] =
                $data[$user->id]["total"] - $data[$user->id]["incomes"] - $data[$user->id]["goals"];
        }

        return view('admin.users', compact('users', 'data'));
    }

    public function user($id)
    {
        $user = User::with([
            'statuses' => function($query) {
                $query->byDate();
            }
        ])->where('id', $id)->first();

        return view('admin.user', compact('user'));
    }
}
