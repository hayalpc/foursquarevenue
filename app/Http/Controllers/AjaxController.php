<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Providers\FoursquareServiceProvider as Foursquare;

class AjaxController extends Controller
{
    public function get_categories()
    {

        $data = Foursquare::getCategories();
        return response()->json($data);
    }

    public function post_explore(Request $request)
    {
        if(!$request->near || !$request->query || !$request->limit){
            $data = ['status'=>0,'message'=>'Invalid parameters!'];
            return response()->json($data);
        }else{
            $data = Foursquare::postExplore($request->near,$request->query,$request->limit);
            return response()->json($data);
        }
    }

    public function get_index(Request $request)
    {
        return response("");
    }
}
