<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreListingFormRequest;
use App\Http\Requests\UpdateListingFormRequest;

class ListingController extends Controller
{
    // use SharedTrait, UploadImageTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listings = Listing::latest()->filter(request(['tag','search']))->paginate(5); // request() takes the name of the input in the blade
        return view('listings.index', compact('listings'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('listings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreListingFormRequest $request)
    {


        $request_data=[
            'title'=>$request->title,
            'company'=>$request->company,
            'tags'=>explode(',',$request->tags),
            'location'=>$request->location,
            'website'=>$request->website,
            'email'=>$request->email,
            'description'=>$request->description
        ];

        if ($request->hasFile('logo')) {
            $request_data['logo'] = $request->file('logo')->store('logos','public');

        }
        DB::transaction(function() use($request_data){
            Listing::create($request_data);

        });
        return redirect('/')->with('success', 'Job created successfully');


    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $listing = Listing::find($id);
        if($listing){
            return view('listings.show', compact('listing'));
        }
        else{
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $listing = Listing::find($id);
       if($listing){
        return view('listings.edit', compact('listing'));
       }
       else{
        return redirect()->back()->with('danger','The job is not found');

       }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateListingFormRequest $request, $id)
    {
        $listing = Listing::find($id);

        if($listing){
        $update_data = [
            'title'=>$request->title,
            'company'=>$request->company,
            'tags'=>explode(',',$request->tags),
            'location'=>$request->location,
            'website'=>$request->website,
            'email'=>$request->email,
            'description'=>$request->description
        ];
        if($request->hasFile('logo')){
            $update_data['logo'] = $request->file('logo')->store('logos','public');

        }

        DB::transaction(function() use($update_data, $listing){

            $listing->update($update_data);
            return redirect()->back()->with('success','Job updated successfully');

        });

    }
    else{
        return redirect()->back()->with('danger','Job updated successfully');

    }

}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $listing = Listing::find($id);
        if($listing){
            DB::transaction(function() use($listing){
                $listing->delete();
            });

            return redirect('/')->with('sucsess','You have deleted the job successfully');
        }
        else{
            return back()->with('danger',' the job does not found');

        }
    }
}
