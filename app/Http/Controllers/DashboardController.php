<?php

namespace App\Http\Controllers;

use App\Model\Inbox;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $inboxes = Inbox::count();
        $users = User::count();
        return view('dashboard', compact('inboxes', 'users'));
    }
}
