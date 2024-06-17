<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\Section;
use Livewire\Component;

class CategoryPost extends Component
{
    public $category;

    public function mount($category)
    {
        $this->category = $category;
    }

    public function render()
    {
        $posts = Post::whereHas('sections', function ($query) {
            $query->where('slug', $this->category);
        })->get();
        return view('livewire.category-post', [
            'posts' => $posts
        ]);
    }
}
