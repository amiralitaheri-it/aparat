<?php

namespace App\View\Components;

use App\Models\Video;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RelatedVideos extends Component
{
    public $videos;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Video $video)
    {
        $this->videos = $video->relatedVideos(8);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render()
    {
        return view('components.related-videos');
    }
}
