<?php

namespace App\Http\Controllers\Admin;

use App\gallery_villa;
use App\GalleryProduct;
use App\GalleryVila;
use App\Http\Controllers\Controller;
use App\Product;
use App\Vila;
use Illuminate\Http\Request;

class VilaGalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:show_gallery')->only(['index']);
        $this->middleware('can:create_gallery')->only(['create', 'store']);
        $this->middleware('can:edit_gallery')->only(['edit', 'update']);
        $this->middleware('can:delete_gallery')->only(['destroy']);


    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Vila $vila)
    {
        $images = $vila->Gallery()->latest()->paginate(30);

        return view('panel.villa.gallery.all' , compact('vila' ,'images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Vila $vila)
    {
        return view('panel.villa.gallery.create' , compact('vila'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , Vila $vila)
    {
        $data = $request->validate([
            'images.*.image' => ['required'],
            'images.*.alt'   => ['required' , 'min:3'],
        ]);

        collect($data['images'])->each(function ($image) use ($vila){
            $vila->gallery()->create($image);
        });
        toastr()->success('با موفقیت ثبت شد.');
        return redirect(route('admin.gallery.index' , ['vila' => $vila->id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Vila $vila , gallery_villa $gallery)
    {
        return view('panel.villa.gallery.edit' , compact('vila' , 'gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vila $vila , gallery_villa $gallery)
    {
        $data = $request->validate([
            'image' => ['required'],
            'alt'   => ['required' , 'min:3'],
        ]);
        $gallery->update($data);
        toastr()->success('با موفقیت ویرایش شد.');
        return redirect(route('admin.gallery.index' , ['vila' => $vila->id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vila $vila , gallery_villa $gallery)
    {

        $gallery->delete();
        toastr()->success('با موفقیت حذف شد.');
        return redirect(route('admin.gallery.index' , ['vila' => $vila->id]));
    }
}
