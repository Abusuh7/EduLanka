<?php

namespace App\Http\Controllers;

use App\Models\Banners;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all the banners whicxh are active and compact them
        $banners = Banners::where('status', 'active')->get();

        // Get all the banners
        $all = Banners::all();

        return view('admin.banners.new-banner', compact('banners', 'all'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
         // Validate the form data with banner details
         $validatedData = $request->validate([
            'title' => 'required|string',
            'caption' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'button_name' => 'required|string',
            'link' => 'required|string',
            'visibility' => 'required|string',
            'status' => 'required|string',
        ]);

        //Store the image in the public folder
        $image_path = $request->file('image')->store('banner-photos', 'public');

        // Get the form data
        $bannerData = Banners::create([
            'title' => $request->input('title'),
            'caption' => $request->input('caption'),
            'image' => $image_path,
            'button_name' => $request->input('button_name'),
            'link' => $request->input('link'),
            'visibility' => $request->input('visibility'),
            'status' => $request->input('status'),
        ]);

        // Return the response
        // return response()->json([
        //     'message' => 'Banner created successfully',
        //     'banner' => $bannerData
        // ], 201);

        return redirect()->back()->with('message', 'Banner created successfully');

    }

    //chnage the status of the banner to active
    public function activate(Request $request, $id)
    {
        // Get the banner
        $banner = Banners::find($id);

        // Update the status
        $banner->status = 'active';

        // Save the banner
        $banner->save();

        // Return the response
        // return response()->json([
        //     'message' => 'Banner status updated successfully',
        //     'banner' => $banner
        // ], 200);

        return redirect()->back()->with('message', 'Banner status updated successfully');
    }

    //chnage the status of the banner to inactive
    public function deactivate(Request $request, $id)
    {
        // Get the banner
        $banner = Banners::find($id);

        // Update the status
        $banner->status = 'inactive';

        // Save the banner
        $banner->save();

        // Return the response
        // return response()->json([
        //     'message' => 'Banner status updated successfully',
        //     'banner' => $banner
        // ], 200);

        return redirect()->back()->with('message', 'Banner status updated successfully');
    }

    //Delete the banner
    public function delete(Request $request, $id)
    {
        // Get the banner
        $banner = Banners::find($id);

        // Delete the banner
        $banner->delete();

        // Return the response
        // return response()->json([
        //     'message' => 'Banner deleted successfully',
        //     'banner' => $banner
        // ], 200);

        return redirect()->back()->with('message', 'Banner deleted successfully');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    //Eddit the banner
    public function edit(Request $request, $id)
    {
        // Get the banner
        $banner = Banners::find($id);

        // Return the response
        // return response()->json([
        //     'message' => 'Banner fetched successfully',
        //     'banner' => $banner
        // ], 200);

        return view('admin.banners.edit-banner', compact('banner'));
    }

    //Update the banner
    public function update(Request $request, $id)
    {
        // Get the banner
        $banner = Banners::find($id);

        // Validate the form data with banner details
        $validatedData = $request->validate([
            'title' => 'required|string',
            'caption' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'button_name' => 'required|string',
            'link' => 'required|string',
            'visibility' => 'required|string',
            'status' => 'required|string',
        ]);

        //Store the image if the user has uploaded a new image only
        if($request->hasFile('image')){
            $image_path = $request->file('image')->store('banner-photos', 'public');
        }else{
            $image_path = $banner->image;
        }

        // Update the banner
        $banner->title = $request->input('title');
        $banner->caption = $request->input('caption');
        $banner->image = $image_path;
        $banner->button_name = $request->input('button_name');
        $banner->link = $request->input('link');
        $banner->visibility = $request->input('visibility');
        $banner->status = $request->input('status');

        // Save the banner
        $banner->save();

        // Return the response
        // return response()->json([
        //     'message' => 'Banner updated successfully',
        //     'banner' => $banner
        // ], 200);

        return redirect()->back()->with('message', 'Banner updated successfully');
    }


}
