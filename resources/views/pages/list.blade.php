@extends('layout')

@section('content')
    <section class="content">
        <div class="sign">
            {{$category->title}}
        </div>
        @foreach($posts as $post)
            <article class="postList">
                <a href="{{route('post.show', $post->slug)}}">
                    <div class="imglist">
                        <img src="{{$post->getImage()}}" width="800px" alt="" class="imgList">
                        <span class="description">{{ $post->description }}</span>
                    </div>
                    <div class="textList">
                        <h3 class="">{{$post->title}}</h3>
                    <div class="">
                        {{$post->getDate()}}
                    </div>
                    </div>
                </a>
            </article>
        @endforeach
        {{$posts->links()}}
    </section>
@endsection