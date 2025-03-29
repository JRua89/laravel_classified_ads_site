<?php

namespace App\Http\Controllers\Listing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ListingViewedContoller extends Controller
{
    const index_limit = 10;

    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index(Request $request)
    {
        

        $listings = $request->user()->viewedListings()
        ->with(['area','user'])
        ->orderByPivot('updated_at', 'desc')
        ->isLive()
        ->take(self::index_limit)
        ->get();

        
        return view('user.listings.viewed.index', [
            'listings' => $listings,
            'indexLimit' => self::index_limit,
        ]);
    }
}
