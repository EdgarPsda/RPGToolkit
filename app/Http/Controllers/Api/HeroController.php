<?php

namespace App\Http\Controllers\Api;

use App\Hero;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\HerosValidate;
use App\Http\Requests\HeroRequest;
use App\Http\Resources\HerosResource;

class HeroController extends Controller
{
    use HerosValidate;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return HerosResource::collection(Hero::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HeroRequest $request)
    {
        return new HerosResource(Hero::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Hero $hero)
    {
        return new HerosResource($hero);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HeroRequest $request, Hero $hero)
    {
        $hero->update($request->all());
        return new HerosResource($hero);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hero $hero)
    {
        $hero->delete();
    }

    public function getDwarFnames()
    {
        return $this->getDwarfFirstName();
    }

    public function getDwarfLnames()
    {
        return $this->getDwarfLastName();
    }

    public function getClass($race)
    {
        return $this->getClasses($race);
    }

    public function getWeapons($clas)
    {
        return $this->getWeaponsEnum($clas);
    }
}
