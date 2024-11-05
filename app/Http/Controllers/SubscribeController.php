<?php

namespace App\Http\Controllers;

use App\Models\Subscribe;
use App\Http\Requests\StoreSubscribeRequest;
use App\Http\Requests\UpdateSubscribeRequest;

class SubscribeController extends Controller
{
    #=============================== INDEX
    public function index()
    {
        $subscribes = Subscribe::paginate(4);
        return view('admin.subscribes.index', get_defined_vars());
    }



    #=============================== DELETE
    public function destroy(Subscribe $subscribe)
    {
        $subscribe->delete();
        return to_route('admin.subscribers.index')->with('success', __('keywords.deleted_successfully'));
    }
}
