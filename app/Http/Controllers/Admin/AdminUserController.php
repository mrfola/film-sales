<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\FilmController;
use App\Models\User;
use App\Http\Controllers\Controller;


class AdminUserController extends Controller
{
    public function index(Request $request)
    { 
        if(!$request->filter)
        {
            $users = User::orderBy('id', 'DESC')->get();
            $data = ["users" => $users];
            return view('admin.users', $data);
        }
        else
        {
            $dateToBeBornToBeTwentyYears = date('Y-m-d', strtotime('-20 years'));
            $dateToBeBornToBeThirtyFiveYears = date('Y-m-d', strtotime('-35 years'));
            $dateToBeBornToBeFiftyYears = date('Y-m-d', strtotime('-50 years'));

            switch($request->input('filter'))
            {
                case ("ALL"):
                    $users = User::orderBy('id', 'DESC')
                                    ->get();
                    break;

                case ("LESS_THAN_20"):
                    $users = User::whereDate('date_of_birth', '>=', $dateToBeBornToBeTwentyYears)
                                    ->orderBy('id', 'DESC')
                                    ->get();
                    break;

                case ("BTW_20_AND_35"):
                    $users = User::whereDate('date_of_birth', '<=', $dateToBeBornToBeTwentyYears )     
                                    ->whereDate('date_of_birth', '>=', $dateToBeBornToBeThirtyFiveYears)
                                    ->orderBy('id', 'DESC')
                                    ->get();
                    break;

                case ("BTW_35_AND_50"):
                    $users = User::whereDate('date_of_birth', '<=', $dateToBeBornToBeThirtyFiveYears)     
                                    ->whereDate('date_of_birth', '>=', $dateToBeBornToBeFiftyYears)
                                    ->orderBy('id', 'DESC')
                                    ->get();

                    break;

                case ("OLDER_THAN_50"):
                    $users = User::whereDate('date_of_birth', '<=', $dateToBeBornToBeFiftyYears)
                                    ->orderBy('id', 'DESC')
                                    ->get();
                    break;                                       
            }

            $data = ["users" => $users];
            return view('admin.users', $data);

        }

        
        
    }
}
