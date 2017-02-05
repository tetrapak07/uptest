<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Cleaner;
use App\City;
use Illuminate\Http\Request;
use Session;
use App\Http\Requests\CleanerRequest;

class CleanerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $cleaner = Cleaner::paginate(25);

        return view('cleaner.index', compact('cleaner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $city = City::all();
        return view('cleaner.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CleanerRequest $request)
    {
        
        $requestData = $request->all();
        
        Cleaner::create($requestData);

        Session::flash('flash_message', 'Cleaner added!');

        return redirect('cleaner');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $cleaner = Cleaner::findOrFail($id);
        
        $city = City::all();

        return view('cleaner.show', compact('cleaner', 'city'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $cleaner = Cleaner::findOrFail($id);
        
        $city = City::all();

        return view('cleaner.edit', compact('cleaner', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, CleanerRequest $request)
    {
        
        $requestData = $request->all();
        
        $cleaner = Cleaner::findOrFail($id);
        $cleaner->update($requestData);

        Session::flash('flash_message', 'Cleaner updated!');

        return redirect('cleaner');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Cleaner::destroy($id);

        Session::flash('flash_message', 'Cleaner deleted!');

        return redirect('cleaner');
    }
}
