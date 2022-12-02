<div>
    @if($posts->count()>0)
        <div class="md:grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 flex-wrap">

        @foreach ($posts as $post)
                <div class="">
                    <a href="{{ route('posts.show',['post'=>$post,'user'=>$post->user])}}">                
                        <img src="{{ '/uploads' . '/' . $post->imagen }}" alt="">
                    </a>
                </div>
              
        @endforeach

        </div>

        <div class="mt-10">
            {{$posts->links('pagination::tailwind')}}
        </div>
    @else
    <p>No hay posts, sigue a alguien para poder mostrar sus posts</p>
    @endif
</div>