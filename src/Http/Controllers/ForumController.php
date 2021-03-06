<?php

namespace Firefly\Http\Controllers;

use Firefly\Models\Discussion;
use Firefly\Models\Group;

class ForumController extends Controller
{
    /**
     * Show the forum index.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $groups = Group::all();

        $discussions = Discussion::orderBy('created_at', 'desc')
            ->paginate(config('firefly.pagination.discussions'));

        return view('firefly::index')->with(compact('groups', 'discussions'));
    }
}
