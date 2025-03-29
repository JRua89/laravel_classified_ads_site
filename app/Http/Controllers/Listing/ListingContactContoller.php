<?php

namespace App\Http\Controllers\Listing;
use App\Models\Area;
use App\Models\Listing;
use Illuminate\Http\Request;
use App\Mail\ListingContactCreated;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Mail as FacadesMail;
use App\Http\Requests\StoreListingContactFormRequest;

class ListingContactContoller extends Controller
{
    public function __construct()
    {
       $this->middleware(['auth']);
    }
    public function store(Request $request, Area $area, Listing $listing)
    {
               
        Mail::to($listing->user)->queue(
            new ListingContactCreated($listing,$request->user(), $request->message)
        );

        return back()->withSuccess("We have sent your message to {$listing->user->name}");
    }
}
