<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\Subscription;
use JetBrains\PhpStorm\NoReturn;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class AllPost extends Component
{
    use WithPagination;

    #[Rule('required|email:dns|unique:subscriptions|email')]
    public $email;

    public function subscribe()
    {
        $validated = $this->validate();
        Subscription::create([
            'email' => $validated['email']
        ]);

        $this->reset('email');

        request()?->session()->flash('success', 'You are now connected');
    }
    public function render()
    {
        $mostRecentPost = Post::orderByDesc('created_at')->first();
        $mostRecentPostId = $mostRecentPost ? $mostRecentPost->id : null;
        $subscribers = Subscription::all();

        $posts = Post::with('sections')
            ->where('id', '!=', $mostRecentPostId)
            ->orderByDesc('created_at')
            ->paginate(5);
        return view('livewire.all-post', [
            'posts' => $posts,
            'subscribers' => $subscribers
        ]);
    }
}
