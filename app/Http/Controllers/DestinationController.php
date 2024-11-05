<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoredestinationRequest;
use App\Http\Requests\UpdatedestinationRequest;

class DestinationController extends Controller
{
    #=============================== INDEX
    public function index()
    {
        $destinations = Destination::paginate(config('pagination.count'));
        return view('admin.destinations.index', get_defined_vars());
    }


    #=============================== CREATE
    public function create()
    {
        return view('admin.destinations.create');
    }


    //=============================== STORE
    public function store(StoredestinationRequest $request)
    {
        $data = $request->validated();

        // 1- get image
        $image = $request->image;

        // 2- change its current name with a unique timestamp
        $newImageName = time() . '-' . $image->getClientOriginalName();

        // 3- move image to storage (public) directory
        $image->storeAs('destinations', $newImageName, 'public');

        // 4- save the new image name to database
        $data['image'] = $newImageName;

        Destination::create($data);

        // Add timestamp to ensure fresh loading
        return to_route('admin.destinations.index')->with([
            'success' => __('keywords.created_successfully'),
            'timestamp' => time(),
        ]);
    }



    #=============================== SHOW
    public function show(Destination $destination)
    {
        return view('admin.destinations.show', get_defined_vars());
    }


    #=============================== EDIT
    public function edit(Destination $destination)
    {
        return view('admin.destinations.edit', get_defined_vars());
    }


    #=============================== UPDATE
    public function update(UpdatedestinationRequest $request, Destination $destination)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            // image uploading 
            // 0- delete old image
            Storage::delete("public/destinations/$destination->image");
            // 1- get image
            $image = $request->image;
            // 2- change it's current name
            $newImageName = time() . '-' . $image->getClientOriginalName();
            // 3- move image to my project
            $image->storeAs('destinations', $newImageName, 'public');
            // 4- save new name to database record
            $data['image'] = $newImageName;
        }
        $destination->update($data);

        return to_route('admin.destinations.index')->with('success', __('keywords.updated_successfully'));
    }

    #=============================== DELETE
    public function destroy(Destination $destination)
    {
        Storage::delete("public/testimonials/$destination->image");
        $destination->delete();
        return to_route('admin.destinations.index')->with('success', __('keywords.deleted_successfully'));
    }
}
