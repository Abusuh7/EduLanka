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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
