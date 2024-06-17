<div>
    @section('content')
        <div class="container mx-auto flex flex-col items-center max-w-screen-lg">
            @foreach($post->sections as $category)
                <a href="{{url('/category/'.$category->slug)}}" class="text-center text-[#fa9706] mb-6">{{$category->name}}</a>
            @endforeach
                <a href="{{url('/post/'.$post->slug)}}" class="font-bold text-white text-5xl text-center">{{$post->title}}</a>

                <p class="text-white mt-3">{{\Carbon\Carbon::parse($post->created_at)->format('F d, Y')}}</p>
            @if($post && $post->image)
                <div class="image-container">
                    <img class="mt-5 hover:scale-110" src="http://127.0.0.1:8001/posts/{{$post?->image}}" alt="Post Image" style="width: 700px; height: 560px">
                </div>
            @else
                <p>No image available.</p>
            @endif
        </div>
        <div class="container mx-auto flex flex-col items-center">
            <div class="flex flex-row">
                <div class="categories text-white py-24">
                    <ul>
                        @foreach($sections as $section)
                            <a href="" class="uppercase font-bold px-4">{{$section->name}}</a>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="main-body">
                @livewire('all-post')
            </div>
        </div>
    @endsection
</div>
