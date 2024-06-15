<div>
    @section('content')
        <div class="container mx-auto flex flex-col items-center max-w-screen-lg">
            @foreach($post->sections as $category)
                <a href="#" class="text-center text-[#fa9706] mb-6">{{ $category->name }}</a>
            @endforeach

            <h3 class="font-bold text-white text-5xl text-center">{{ $post->title }}</h3>

            <p class="text-white mt-3">{{ \Carbon\Carbon::parse($post->created_at)->format('F d, Y') }}</p>
            <p class="text-white mt-3">By {{ $post->author->name}}</p>

            @if($post->image)
                    <img class="mt-5" src="{{ (new App\Helpers\UpdateImageUrls)->environmentCheck().'/posts/'. $post?->image}}" alt="Post Image" style="width: 700px">
            @else
                <p class="text-white">No image available.</p>
            @endif
        </div>

        <div class="flex justify-center items-center">
            <div class="max-w-screen-lg mx-auto mt-12">
                <div class="text-left text-white text-xl py-2">
                    {!! (new App\Helpers\UpdateImageUrls)->updateImageUrls($post->content) !!}
                </div>
                <div class="mt-3 share flex">
                    <p class="text-white py-1">
                        Share this post:
                    </p>
                    <div class="icons flex flex-row px-4 text-white py-2">
                        <a class="px-3" href=""><ion-icon name="logo-facebook"></ion-icon></a>
                        <a class="px-3" href="#"><ion-icon name="logo-twitter"></ion-icon></a>
                        <a class="px-3" href="#"><ion-icon name="logo-instagram"></ion-icon></a>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</div>
