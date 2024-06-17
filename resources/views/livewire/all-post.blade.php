<div>
    @foreach($posts as $index => $post)
        <div class="flex flex-row mt-8">
            <div class="post-image image-container">
                <img class="mt-5 hover:scale-110" style="height: 330px; width: 567px"
                     src="http://127.0.0.1:8001/posts/{{$post?->image}}" alt="Post Image">
            </div>
            <div class="flex flex-col ml-12 py-24 post-content items-left">
                @foreach($post->sections as $category)
                    <a href="{{url('/category/'.$category->slug)}}" class="text-[#fa9706]">{{$category->name ?? ''}}</a>
                @endforeach
                <a href="{{url('/post/'.$post->slug)}}" class="font-bold text-white text-2xl py-6 w-80">{{$post->title}}</a>
                <p class="text-white mt-3">{{\Carbon\Carbon::parse($post->created_at)->format('F d, Y')}}</p>
            </div>
        </div>
        @if($index === 1)
        <div class="mt-16 p-4 bg-[#1f0231] text-white text-center">
            <h2 class="text-xl font-bold">Subscribe to our Newsletter</h2>
            <form action="" class="mt-4 mb-8">
{{--                @csrf--}}
                @if(session('success'))
                    <span class="text-sm text-green-500 block py-3">{{session('success')}}</span>
                @endif
                <input wire:model="email" type="email" name="email" placeholder="Enter your email" class="p-2 w-2/3 rounded text-black">
                <button wire:click.prevent="subscribe" type="submit" class="bg-[#fa9706] text-white p-2 rounded mt-2">Subscribe</button>
                @error('email') <span class="text-xs text-red-500 block py-3">{{$message}}</span>  @enderror
            </form>
        </div>
        @endif
    @endforeach
        <div class="mt-8">
            {{$posts->links('vendor.livewire.pagination')}}
        </div>
</div>
