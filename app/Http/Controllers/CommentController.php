<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Video;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(StoreCommentRequest $request, Video $video)
    {
        $video->comments()->create([
                                       'user_id' => auth()->id(),
                                       'body' => $request->body,
                                   ]);

        return back()->with('alert', __('messages.comment_sent_successfully'));
    }
}
