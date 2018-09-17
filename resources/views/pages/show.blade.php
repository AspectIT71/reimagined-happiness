@extends('layout')

@section('content')
    <section class="content">
        <h1 class="postName">{{$post->title}}</h1>
        <img class="postItem" src="{{$post->getImage()}}" alt="" width="800px">
        <div class="contentPost">
            {!! $post->content !!}
        </div>

        <div class="showInfo">
            <p>Теги:
            @foreach($post->tags as $tag)
                {{$tag->title}}
                @endforeach
            </p>
            <p>Дата публикации: {{$post->getDate()}}</p>
            <p>Просмотры: {{$post->views}}</p>
        </div>
    </section>
@endsection