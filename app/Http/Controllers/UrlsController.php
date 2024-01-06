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
        // Check if user is authenticated
        if (auth()->check()) {
            // Check if user has urls in the 'urls' table and return null if not. Return to view
            $user = auth()->user();
            if ($user && !(Url::where('user_id', $user->id)->exists())) {
                return view('urls.index', [
                    'urls' => null,
                ]);
            } else {
                // Return user urls to view
                return view('urls.index', [
                    'urls' => $user->urls,
                ]);
            }
        } else {
            // User is not authenticated, handle accordingly
            // For example, redirect to login page
            return redirect()->route('login');
        }
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
