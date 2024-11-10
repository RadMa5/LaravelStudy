<?php

namespace App\Observers;

use Illuminate\Support\Str;
use App\Models\News;

class NewsObserver
{
    public function saving(News $news) {
        $news->slug = Str::slug($news->title);
    }
}
