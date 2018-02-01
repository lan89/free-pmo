<?php

namespace App\Http\Controllers\Users;

use App\Entities\Users\User;
use App\Http\Controllers\Controller;

/**
 * User Jobs Controller.
 *
 * @author Nafies Luthfi <nafiesl@gmail.com>
 */
class JobsController extends Controller
{
    public function index(User $user)
    {
        $jobs = $user->jobs()
            ->latest()
            ->with(['tasks', 'project'])
            ->paginate();

        return view('users.jobs', compact('user', 'jobs'));
    }
}
