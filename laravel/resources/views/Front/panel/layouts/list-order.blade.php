<div class="col-lg-3 col-md-3 col-xs-12 pl">
<ul class="accordion">
    @foreach ($termcat as $item)
    <li class="first">
        <span class="termcat"><i class="fa fa-laptop text-dark ml-1"></i>{{$item->name}}</span>
        <p>

            @foreach ($item->videos()->OrderBy('part')->get() as $video)

            <a href="{{route('panel.course.video',[$video->term->slug,$video->part])}}" class="d-block second text-black"><span class="count badge-success ml-3 font-medium-1">{{$video->part}}</span><span class="">{{$video->title}}</span></a>
            @endforeach

        </p>
    </li>
    @endforeach
</ul>
</div>
@section('js-page')
<script type="text/javascript">
(function($) {
   $('.accordion span.termcat').click(function(j) {
    var dropDown = $(this).closest('li').find('p');

    $(this).closest('.accordion').find('p').not(dropDown).slideUp();

    if ($(this).hasClass('active')) {
        $(this).removeClass('active');
    } else {
        $(this).closest('.accordion').find('span.active').removeClass('active');
        $(this).addClass('active');
    }

    dropDown.stop(false, true).slideToggle();

    j.preventDefault();
});
})(jQuery);
</script>
@endsection
