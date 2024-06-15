<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class AllPost extends Component
{
    public function render()
    {
        $posts = Post::with('sections')->paginate(10);
        return view('livewire.all-post', [
            'posts' => $posts
        ]);
    }
}
