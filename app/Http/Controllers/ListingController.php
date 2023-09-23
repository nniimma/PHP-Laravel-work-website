<?php

namespace App\Http\Controllers;

use App\Models\listing;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    // show all listings:
    public function index(Request $request)
    {
        // dd($request); //this need to give the request in function
        // dd(request()->tag); //this one doesn't need the request in function
        //to get the template of pagination: php artisan vendor:publish
        return view('listings.index', [
            'listings' => listing::latest()->filter(request(['tag', 'search']))->simplePaginate(5)
        ]);
    }

    //show single listing:
    //the variable here come from the route
    public function show(Listing $listing)
    {
        return view('/listings/show', [
            'listing' => $listing
        ]);
    }

    //show create form
    public function create()
    {
        return view('listings.create');
    }

    //store listing data
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title'     => 'required',
            'company'     => ['required', Rule::unique('listings', 'company')],
            'location'  => 'required',
            'website'  => 'required',
            'email'  => 'required|email',
            'tags'  => 'required',
            'description'  => 'required',
        ]);

        // if ($request->hasFile('logo')) {
        //     $uploadedFile = $request->file('logo');
        //     $filePath = $uploadedFile->store('logos', 'public');

        //     // Save the file path to the database column
        //     $formFields['logo'] = $filePath;
        // }

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->id();

        listing::create($formFields);

        //giving message after fullfilling a form:
        // Session::flash('message', 'listing created');

        return redirect('/')->with('message', 'listing created successfully');
    }

    //show edit form
    public function edit(Listing $listing)
    {
        return view('listings.edit', ['listing' => $listing]);
    }

    public function update(Request $request, Listing $listing)
    {

        //make sure loged in user is owner:
        if ($listing->user_id != auth()->id()) {
            abort(403, 'unauthorized action');
        }

        $formFields = $request->validate([
            'title'     => 'required',
            'company'     => 'required',
            'location'  => 'required',
            'website'  => 'required',
            'email'  => 'required|email',
            'tags'  => 'required',
            'description'  => 'required',
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formFields);


        return redirect('/')->with('message', 'listing updated successfully');
    }

    //delete listing
    public function destroy(Listing $listing)
    {
        //make sure loged in user is owner:
        if ($listing->user_id != auth()->id()) {
            abort(403, 'unauthorized action');
        }

        $listing->delete();
        return redirect('/')->with('message', 'listing deleted succussfully.');
    }

    //manage listings
    public function manage()
    {
        return view('listings.manage', ['listings' => auth()->user()->listings()->get()]);
    }
}
//bebin inja man ye relation doros kardam, alan mikham listings useri ke dare estefade mikone ro begiram vali error mide

// common resource routes:
// index: show all listing
// show: show single listing
// create: show form to create new listing
// store: store new listing
// edit: show form to edit listing
// update: update listing
// destroy: delete listing
