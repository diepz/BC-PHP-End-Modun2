<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feed;
class NewFeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feeds = Feed::paginate(5);
        return view('news.index', compact('feeds'))
            ->with('i', (request()->input('page', 1) - 1) * 5);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $feeds = new Feed();
        $feeds->title = $request->input('title');
        $feeds->content = $request->input('content');
        $feeds->image = $request->input('image');


        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $image = $request->image;
                $clientName = $image->getClientOriginalName();
                $path = $image->move(public_path('images/'), $clientName);
                $feeds->image = $clientName;
            }
        }

        $feeds->save();

        return redirect()->route('news.index')->with('success', 'Your images has been successfulyy');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $feeds = Feed::findOrfail($id);
        return view('news.show', compact('feeds'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $feeds = Feed::findOrfail($id);
        return view('news.edit', compact('feeds'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $feeds = Feed::findOrfail($id);
        $feeds->title = $request->input('title');
        $feeds->content = $request->input('content');
        $feeds->image = $request->input('image');
        $feeds->save();

        return redirect()->route('news.index')->with('success', 'Your images has been successfulyy');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feeds = Feed::findOrfail($id);
        $feeds->delete();
        return redirect()->route('news.index')->with('success', 'Your images has been succel');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $feeds = Feed::where('title', 'LIKE', '%' . $keyword . '%')
            ->orwhere('content', 'like', '%' . $keyword . '%')
            ->get();

        return view('news.index', compact('feeds'));
    }
}
