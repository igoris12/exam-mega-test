<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // const RESULTS_IN_PAGE = 5;

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index()
    // {
    //     $horses = Horse::orderBy('name', 'desc')->paginate(self::RESULTS_IN_PAGE)->withQueryString();
    //     return view('horse.index', ['horses' => $horses]);

    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {   

    //     $validator = Validator::make($request->all(),
    //         [
    //             'horse_name' => ['required', 'min:2', 'max:200'],
    //             'horse_runs' => ['required', 'integer', 'min:0'],
    //             'horse_wins' => ['required', 'integer', 'min:0', 'lte:horse_runs'],
    //             'horse_about' => ['required'],
    //         ]

    //         );
    //         if ($validator->fails()) {
    //             $request->flash();
    //             return redirect()->back()->withErrors($validator);
    //         }

    //     $horse = new Horse;
    //     $horse->name = $request->horse_name;
    //     $horse->runs = $request->horse_runs;
    //     $horse->wins = $request->horse_wins;
    //     $horse->about = $request->horse_about;

    //     $horse->save();
    //     return redirect()->route('horse.index')->with('success_message', 'New Horse added successful.');

    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Models\horse  $horse
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(horse $horse)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\Models\horse  $horse
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit(horse $horse)
    // {
    //     return view('horse.edit', ['horse' => $horse]);

    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Models\horse  $horse
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, horse $horse)
    // {

    //     $validator = Validator::make($request->all(),
    //         [
    //             'horse_name' => ['required', 'min:2', 'max:200'],
    //             'horse_runs' => ['required', 'integer', 'min:0'],
    //             'horse_wins' => ['required', 'integer', 'min:0', 'lte:horse_runs'],
    //             'horse_about' => ['required'],
    //         ]

    //         );
    //         if ($validator->fails()) {
    //             $request->flash();
    //             return redirect()->back()->withErrors($validator);
    //         }

       
    //     $horse->name = $request->horse_name;
    //     $horse->runs = $request->horse_runs;
    //     $horse->wins = $request->horse_wins;
    //     $horse->about = $request->horse_about;

    //     $horse->save();
    //     return redirect()->route('horse.index')->with('success_message', 'New Horse added successful.');


    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Models\horse  $horse
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(horse $horse)
    // {
    //     if($horse->getBetter->count()){
    //    return redirect()->route('horse.index')->with('info_message', 'Horse cant be deleted.');


    //    }
    //    $horse->delete();
    //    return redirect()->route('horse.index')->with('success_message', 'Delete was successful.');
    // }
}
