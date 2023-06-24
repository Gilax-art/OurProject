<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewsStoreRequest;
use App\Http\Requests\ReviewsUpdateRequest;
use App\Models\Reviews;
use Illuminate\Support\Facades\Storage;

class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = Reviews::orderby('id', 'desc')->paginate(5);
        return view('admin.reviews.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.reviews.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReviewsStoreRequest $request)
    {
        $data = $request->validated();

        if(!empty($request['img'])){
            $data['img'] = $request['img'];
            $data['img'] = Storage::disk('public')->put('images/reviews', $data['img']);
        }
        if(!empty($request['link'])){
            $data['link'] = $request['link'];
        }

        Reviews::create($data);

        return redirect()->route('reviews.index')->with('success','Новый отзыв добавлен');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reviews $review)
    {
        return view('admin.reviews.show', compact('review'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reviews $review)
    {
        return view('admin.reviews.edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReviewsUpdateRequest $request, Reviews $review)
    {
        $data = $request->validated();

        if(!empty($request['img'])){
            if(!empty($review['img'])){
                $review['img'] = Storage::disk('public')->delete('images/review', $review['img']);
            }
            $data['img'] = $request['img'];
            $data['img'] = Storage::disk('public')->put('images/reviews', $data['img']);
        }
        if(!empty($request['link'])){
            $data['link'] = $request['link'];
        }

        $review->update($data);

        return redirect()->route('reviews.index')->with('success','Отзыв обновлён');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reviews $review)
    {
        $review->delete();
        if(!empty($review['img'])){
            $review['img'] = Storage::disk('public')->delete('images/review', $review['img']);
        }
        return redirect()->route('reviews.index')->with('success','Отзыв удалён');
    }
}
