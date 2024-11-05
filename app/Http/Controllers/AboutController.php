<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreAboutRequest;
use App\Http\Requests\UpdateAboutRequest;

class AboutController extends Controller
{
    #=============================== INDEX
    public function index()
    {
        $abouts = About::get();
        return view('admin.about.index', get_defined_vars());
    }

    #=============================== EDIT
    public function edit(About $about)
    {
        return view('admin.about.edit', get_defined_vars());
    }

    #=============================== UPDATE
    public function update(UpdateAboutRequest $request, About $about)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            // image uploading 
            // 0- delete old image
            Storage::delete("public/abouts/$about->image");
            // 1- get image
            $image = $request->image;
            // 2- change it's current name
            $newImageName = time() . '-' . $image->getClientOriginalName();
            // 3- move image to my project
            $image->storeAs('abouts', $newImageName, 'public');
            // 4- save new name to database record
            $data['image'] = $newImageName;
        }
        $about->update($data);

        return to_route('admin.about.index')->with('success', __('keywords.updated_successfully'));
    }
}
