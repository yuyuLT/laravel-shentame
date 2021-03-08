<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use App\Models\SubmitForm;
use App\Http\Requests\StoreInfoForm;

class SubmitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        return view('submit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInfoForm $request)
    {
        $data = new SubmitForm; 
        $data->user_id = Auth::user()->id;
        $data->title = $request->input('title');
        $data->link = $request->input('link');
        $data->thought = $request->input('thought');

        $data->save();

        return redirect('toppage');
        
    }

}