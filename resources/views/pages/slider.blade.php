<div class="sliderWrapper">
    <div class="sign">
        Рекомендации
    </div>

    <div class="slick-slider">
        @foreach($slides as $slide)
            <div class="sliderItem">
                <a href="{{route('post.show', $slide->slug)}}"><img src="{{$slide->getImage()}}" width="410px" alt="">
                <div class="sliderItemText">
                    <p>{{$slide->title}}</p>
                </div>
                </a>
            </div>
        @endforeach
    </div>
    <div class="prev"><img src="/image/prev.png" width="28" alt=""></div>
    <div class="next"><img src="/image/next.png" width="28" alt=""></div>
</div>