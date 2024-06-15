<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class PageView extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function render()
    {
        $post = Post::where('slug', $this->slug)->first();
        return view('livewire.page-view', [
            'post' => $post
        ]);
    }
}
