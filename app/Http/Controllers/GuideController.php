<?php

namespace App\Http\Controllers;

use App\Models\Guide;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreGuideRequest;
use App\Http\Requests\UpdateGuideRequest;

class GuideController extends Controller
{

    #=============================== INDEX
    public function index()
    {
        $guides = Guide::paginate(config('pagination.count'));
        return view('admin.guides.index', get_defined_vars());
    }


    #=============================== CREATE
    public function create()
    {
        return view('admin.guides.create');
    }


    #=============================== STORE
    public function store(StoreGuideRequest $request)
    {
        $data = $request->validated();

        // 1- get image
        $image = $request->image;

        // 2- change its current name with a unique timestamp
        $newImageName = time() . '-' . $image->getClientOriginalName();

        // 3- move image to storage (public) directory
        $image->storeAs('guides', $newImageName, 'public');

        // 4- save the new image name to database
        $data['image'] = $newImageName;

        Guide::create($data);

        // Add timestamp to ensure fresh loading
        return to_route('admin.guides.index')->with([
            'success' => __('keywords.created_successfully'),
            'timestamp' => time(),
        ]);
    }


    #=============================== SHOW
    public function show(Guide $guide)
    {
        //
    }

    #=============================== EDIT
    public function edit(Guide $guide)
    {
        return view('admin.guides.edit', get_defined_vars());
    }


    #=============================== UPDATE
    public function update(UpdateGuideRequest $request, Guide $guide)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            // إذا تم رفع صورة جديدة، قم بتحديث الصورة
            $newImageName = time() . '-' . $request->image->getClientOriginalName();
            $request->image->storeAs('guides', $newImageName, 'public');
            $data['image'] = $newImageName; // تحديث القيمة في البيانات
        } else {
            // احتفظ بالصورة القديمة إذا لم يتم رفع أي صورة جديدة
            $data['image'] = $guide->image;
        }

        $guide->update($data);

        return to_route('admin.guides.index')->with('success', __('keywords.updated_successfully'));
    }

    #=============================== DELETE
    public function destroy(Guide $guide)
    {
        Storage::delete("public/guides/$guide->image");
        $guide->delete();
        return to_route('admin.guides.index')->with('success', __('keywords.deleted_successfully'));
    }
}
