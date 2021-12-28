<?php

namespace App\Http\Controllers;

use App\Models\FilmOrder;
use App\Http\Requests\StoreFilmOrderRequest;
use App\Http\Requests\UpdateFilmOrderRequest;

class FilmOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFilmOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFilmOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FilmOrder  $filmOrder
     * @return \Illuminate\Http\Response
     */
    public function show(FilmOrder $filmOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FilmOrder  $filmOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(FilmOrder $filmOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFilmOrderRequest  $request
     * @param  \App\Models\FilmOrder  $filmOrder
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFilmOrderRequest $request, FilmOrder $filmOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FilmOrder  $filmOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(FilmOrder $filmOrder)
    {
        //
    }
}
