<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Photo;
use Auth;
use Alert;

class GalleryController extends Controller
{
    public function createGallery(){
    	return view('galleries.createGallery');
    }
    public function storeGallery(Request $request){
    	$this->validate($request, [
    		'title' => 'required',
    		'cover' => 'required',
    		'desc' => 'required'
    	]);

    	$gallery = new Gallery;

    	$gallery->title = $request->title;
    	$gallery->desc = $request->desc;
    	$gallery->user_id = Auth::user()->id;

    	$cover = $request->file('cover');
    	$cover_ext = $cover->getClientOriginalExtension();
    	$cover_name = rand(123456, 999999) . '.' . $cover_ext;
    	$cover_path = public_path('galleries/');
    	$cover->move($cover_path, $cover_name);
    	$gallery->cover = $cover_name;

    	$gallery->save();

    	return redirect()->route('home');

    }

    public function showGallery($id){
    	$gallery = Gallery::find($id);
        $photos = Photo::where('gallery_id', $gallery->id)->get();
    	return view('galleries.showGallery', compact('gallery', 'photos'));
    }

    public function editGallery($id){
    	$gallery = Gallery::find($id);
        return view('galleries.editGallery', compact('gallery'));
    }

    public function updateGallery(Request $request, $id){
        $gallery = Gallery::find($id);

        $gallery->title = $request->title;
        $gallery->desc = $request->desc;

        $gallery_cover = $gallery->cover;

        if($request->hasFile('cover')){
            unlink(public_path('galleries/' . $gallery_cover));

            $cover = $request->file('cover');
            $cover_ext = $cover->getClientOriginalExtension();
            $cover_name = rand(123456, 999999) . '.' . $cover_ext;
            $cover_path = public_path('galleries/');
            $cover->move($cover_path, $cover_name);
            $gallery->cover = $cover_name;
        }else{
            $gallery->cover = $request->old_cover;
        }
        $gallery->save();

        return redirect()->route('showGallery', $id);
    }

    public function removeGallery($id){
        $gallery = Gallery::find($id);
        $gallery_cover = $gallery->cover;
        unlink(public_path('galleries/' . $gallery_cover));
        $gallery->delete();
    	return redirect()->route('home');
    }

    //photo
    public function uploadPhoto($id){
        $gallery = Gallery::find($id);
        return view('galleries/photos/addPhoto', compact('gallery'));
    }

    public function storePhoto(Request $request){
        $this->validate($request, [
            'caption' => 'required',
            'photo' => 'required'
        ]);

        $photos = new Photo;
        $gallery_id = $request->gallery_id;

        $photos->caption = $request->caption;
        $photos->gallery_id = $gallery_id;

        $photo = $request->file('photo');
        $photo_ext = $photo->getClientOriginalExtension();
        $photo_name = rand(123456, 999999) . '.' . $photo_ext;
        $photo_path = public_path('galleries/photos/');
        $photo->move($photo_path, $photo_name);
        $photos->photo = $photo_name;

        $photos->save();
        return redirect()->route('showGallery', $gallery_id);
    }

    public function showPhoto($id){
        $photo = Photo::find($id);
        return view('galleries/photos/showPhoto', compact('photo'));
    }

    public function changePhoto($id){
        $photo = Photo::find($id);
        return view('galleries/photos/changePhoto', compact('photo'));
    }

    public function updatePhoto(Request $request, $id){
        $photo = Photo::find($id);

        $photo->caption = $request->caption;

        $old_photo = $photo->photo;

        if($request->hasFile('photo')){
            unlink(public_path('galleries/photos/' . $old_photo));

            $photos = $request->file('photo');
            $photos_ext = $photos->getClientOriginalExtension();
            $photos_name = rand(123456, 999999) . '.' . $photos_ext;
            $photos_path = public_path('galleries/photos/');
            $photos->move($photos_path, $photos_name);
            $photo->photo = $photos_name;
        }else{
            $photo->photo = $request->old_photo;
        }
        $photo->save();

        return redirect()->route('showPhoto', $id);
    }

    public function deletePhoto($id){
        $photo = Photo::find($id);
        $old_photo = $photo->photo;
        unlink(public_path('galleries/photos/' . $old_photo));
        $photo->delete();
        return redirect()->route('home');
    }

    public function showAll(){
        $all = Gallery::all();
        return view('welcome', compact('all'));
    }
}
