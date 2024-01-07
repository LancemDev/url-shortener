<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Urls as Url;

class UrlsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->check()) {
            $user = auth()->user();
            $urls = Url::where('user_id', $user->id)->get();

            return view('urls.index', [
                'urls' => $urls->isEmpty() ? null : $urls,
            ]);
        }

        return redirect()->route('login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'url' => 'required',
            'description' => 'required',
        ]);
        // create a new shortnened url and save it to the database
        Url::create([
            'user_id' => auth()->user()->id,
            'short_url' => Url::generateShortUrl(),
            'url' => $request->url,
            'description' => $request->description,
        ]);
        return redirect()->route('urls.index');
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
        // return the view with the data of the shortened url that is to be updated
        $url = Url::findOrFail($id);
        return view('urls.edit', [
            'urls' => $url,
        ]);
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
        // delete the shortened url from the database
        $url = Url::findOrFail($id);
        $url->delete();
        return redirect()->route('urls.index');
    }

    public function shorten(Request $request)
    {
        // Redirect to the original url from the short url that has been passed on here
        // $url = Url::where('short_url', $request->short_url)->firstOrFail();

        // return redirect()->away($url->url);
        dd($request);
    }
}
