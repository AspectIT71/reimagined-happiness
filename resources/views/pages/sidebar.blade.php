<div class="sidebar">
    <div class="lastPosts">
        <p>Последние посты</p>
        <ul class="lastList">
            @foreach($lastPost as $value)
                <a href="{{route('post.show', $value->slug)}}" class="lastItem"><li>{{$value->title}}</li></a>
            @endforeach
        </ul>
    </div>

    <div class="delimiter"></div>

    <div class="lastPosts">
        <p>Самое просматриваемое</p>
        <ul class="lastList">
            @foreach($popular as $value)
                <a href="{{route('post.show', $value->slug)}}" class="lastItem"><li>{{$value->title}}</li></a>
            @endforeach
        </ul>
    </div>

</div>