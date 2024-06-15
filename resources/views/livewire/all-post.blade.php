<div>
    @foreach($posts as $post)
        <div class="flex flex-row mt-8">
            <div class="post-image image-container">
                <img class="mt-5 hover:scale-110" style="height: 330px; width: 567px"
                     src="http://127.0.0.1:8001/posts/{{$post?->image}}" alt="Post Image">
            </div>
            <div class="flex flex-col ml-12 py-24 post-content items-left">
                @foreach($post->sections as $category)
                    <a href="" class="text-[#fa9706]">{{$category->name ?? ''}}</a>
                @endforeach
                <a href="{{url('/post/'.$post->slug)}}" class="font-bold text-white text-2xl py-6 w-80">{{$post->title}}</a>
                <p class="text-white mt-3">{{\Carbon\Carbon::parse($post->created_at)->format('F d, Y')}}</p>
            </div>
        </div>
    @endforeach
</div>
