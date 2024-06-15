<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\Section;
use Livewire\Component;

class Homepage extends Component
{

    public function render()
    {
        $post = Post::orderBy('created_at', 'desc')->first();
        $categories = Section::all();
        return view('livewire.homepage', [
            'post' => $post,
            'sections' => $categories
        ]);
    }
}
