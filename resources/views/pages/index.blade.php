@extends('layout')

@section('content')
            <section class="content">
                <div class="sign">
                    Все посты
                </div>
                @foreach($posts as $post)
                <article class="newsItem">
                    <div class="viewPost">
                    @if ($post->category_id == 5)
                        Новость
                        @endif
                        @if ($post->category_id == 9)
                            Статья
                        @endif
                    </div>
                    <a href="{{route('post.show', $post->slug)}}">
                        <div class="newsImage">
                        <img src="{{$post->getImage()}}"  width="400px" alt="">
                        <div class="backgroundText">
                            <h3 class="newsArticle">{{$post->title}}</h3>
                        </div>
                    </div>
                    </a>
                    <div class="postInfo">
                       {{$post->getDate()}}
                    </div>
                </article>
                @endforeach
                {{$posts->links()}}
            </section>
@endsection