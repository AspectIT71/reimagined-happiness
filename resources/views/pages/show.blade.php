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
        <div class="comments">
            <p>Ваши комментарии:</p>
                <div class="comment">
                    @if(!$post->comments->isEmpty())
                    <ul>

                        @foreach($post->comments()->where('status', 1)->get() as $comment)
                            <li>
                                {{$comment->author->name}}
                                {{$comment->created_at->diffForHumans()}}
                                <p>{{$comment->text}}</p>
                            </li>
                        @endforeach
                            @if(session('status'))
                                <li>{{session('status')}}</li>
                            @endif
                    </ul>
                    @endif
                </div>
            @if(Auth::check())
                <form action="/comment" method="post" class="commentForm">
                    {{csrf_field()}}
                    <input type="hidden" name="postId" value="{{$post->id}}">
                    <textarea name="message" cols="30" rows="2" placeholder="Оставте комментарий"></textarea>
                    <button type="submit">Отправить</button>
                </form>
                @else
                <p>Что бы оставить комментарий надо зарегестрироватся</p>
            @endif
        </div>
    </section>
@endsection