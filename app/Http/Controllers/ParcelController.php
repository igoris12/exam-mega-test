<?php

namespace App\Http\Controllers;

use App\Models\Parcel;
use Illuminate\Http\Request;
use App\Models\Post;
use Validator;

class ParcelController extends Controller
{
     const RESULTS_IN_PAGE = 3;

    public function __construct()
    {
        $this->middleware('auth');
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   

            if ($request->sort) {
                if ('weight' == $request->sort && 'asc' == $request->sort_dir) {
                    $parcels = Parcel::orderBy('weight')->paginate(self::RESULTS_IN_PAGE)->withQueryString();
                }
                else if ('weight' == $request->sort && 'desc' == $request->sort_dir) {
                    $parcels = Parcel::orderBy('weight', 'desc')->paginate(self::RESULTS_IN_PAGE)->withQueryString();
                }
                else if ('phone' == $request->sort && 'asc' == $request->sort_dir) {
                    $parcels = Parcel::orderBy('phone')->paginate(self::RESULTS_IN_PAGE)->withQueryString();
                }
                else if ('phone' == $request->sort && 'desc' == $request->sort_dir) {
                    $parcels = Parcel::orderBy('phone', 'desc')->paginate(self::RESULTS_IN_PAGE)->withQueryString();
                }
                else {
                    $parcels = Parcel::paginate(self::RESULTS_IN_PAGE)->withQueryString();
                }

            }
            else if ($request->filter && 'post' == $request->filter) { 
                $parcels = Parcel::where('post_id', $request->post_id)->paginate(self::RESULTS_IN_PAGE)->withQueryString();
            }else {
                $parcels = Parcel::orderBy('weight', 'desc')->paginate(self::RESULTS_IN_PAGE)->withQueryString();
            }
        
        $posts = Post::orderBy('town', 'desc')->get();
        return view('parcel.index', ['parcels' => $parcels,
         'posts' => $posts,
         'sortDirection' => $request->sort_dir ?? 'asc',
        'post_id' => $request->post_id ?? '0'
        ]
    );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posts = Post::orderBy('town', 'desc')->get();
        return view('parcel.create', ['posts' => $posts]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

         $validator = Validator::make($request->all(),
            [
                'parcel_weight' => ['required','integer', 'min:3', 'max:100'],
                'parcel_phone' => ['required', 'min:12', 'max:12'],
                'parcel_info' => ['required'],
                'post_id' => ['required' ,'integer', 'min:1'],
            ]

            );
            if ($validator->fails()) {
                $request->flash();
                return redirect()->back()->withErrors($validator);
            }


        $parcel = new Parcel;
        $parcel->weight = $request->parcel_weight;
        $parcel->phone = $request->parcel_phone;
        $parcel->info = $request->parcel_info;
        $parcel->post_id = $request->post_id;

        $parcel->save();
       return redirect()->route('parcel.index')->with('success_message', 'New Parcel added successful.');

    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Models\parcel  $parcel
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(parcel $parcel)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\parcel  $parcel
     * @return \Illuminate\Http\Response
     */
    public function edit(parcel $parcel)
    {
       $posts  =Post::orderBy('town')->get();
       return view('parcel.edit', ['parcel' => $parcel, 'posts' => $posts]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\parcel  $parcel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, parcel $parcel)
    {


         $validator = Validator::make($request->all(),
            [
                'parcel_weight' => ['required','integer', 'min:3', 'max:100'],
                'parcel_phone' => ['required', 'min:12', 'max:12'],
                'parcel_info' => ['required'],
                'post_id' => ['required' ,'integer', 'min:1'],
            ]

            );
            if ($validator->fails()) {
                $request->flash();
                return redirect()->back()->withErrors($validator);
            }


       
        $parcel->weight = $request->parcel_weight;
        $parcel->phone = $request->parcel_phone;
        $parcel->info = $request->parcel_info;
        $parcel->post_id = $request->post_id;

        $parcel->save();
       return redirect()->route('parcel.index')->with('success_message', 'New Parcel added successful.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\parcel  $parcel
     * @return \Illuminate\Http\Response
     */
    public function destroy(parcel $parcel)
    {
    $parcel->delete();
       return redirect()->route('parcel.index')->with('success_message', 'Delete was successful.');;

    }
}
