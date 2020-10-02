<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\MediaStoreRequest;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cachedMedia = Cache::rememberForever('data-all', function () {
            return Media::orderBy('id', 'desc')->get();
        });

        return view('media')->with('media', $cachedMedia);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('media-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MediaStoreRequest $request)
    {
        if ($request->hasFile('data') && $request->file('data')->isValid()) {

            $file = $request->file('data');
            
            $data = $file->getRealPath();

            $item = new Media();
            $item->name = $request->input('name');
            $item->size = $file->getSize();
            $item->data = file_get_contents($data);
            $item->save();

            Cache::put('data-'.$item->id, $item, 60);
            Cache::forget('data-all');
        }

        return redirect('media');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cachedMedia = Cache::remember('data-'.$id, 60, function () use ($id) {
            return Media::find($id);
        });

        return view('media-show')->with('item', $cachedMedia);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function destroy(Media $media)
    {
        Cache::forget('data-'.$media->id);
        Cache::forget('data-all');

        $media->delete();

        return redirect('media');
    }
}
