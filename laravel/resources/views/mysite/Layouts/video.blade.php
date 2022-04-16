<a href="{{route('term.part',['1','2'])}}" class="card m-2">
    <img class="card-img-top" src="{{$item->pic}}" alt="Card image">
    <div class="card-body">
        <h6 class="IRANSansWeb_Medium">{{$item->title}}</h6>
       {!! $item->content!!}
    </div>
    <div class="card-footer">
        <div class="d-flex flex-row">
            <img src="{{$item->user->pic}}" class="img-fluid rounded-circle ml-3 pic55" />

            <div>
                <p class="text-dark IRANSansWeb_Medium bottom_p">{{$item->user->name}}</p>
                <span class="IRANSansWeb_Medium text-dark"><i class="fas fa-clock"></i>{{jdate($item->created_at)->ago()}}</span>
            </div>
        </div>
    </div>
</a>
