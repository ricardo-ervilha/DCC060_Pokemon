<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeamsController extends Controller
{
    public function getTeams() {
        return View('Teams.teams');
    }
}
