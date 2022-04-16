<a href="Blogdetails.html" class="card m-2">
    <img class="card-img-top" src="{{$item->pic}}" alt="Card image">
    <div class="card-body">
        <h6 class="IRANSansWeb_Medium">{{$item->name}}</h6>
       {!! $item->content!!}
    </div>
    <div class="card-footer">
        <div class="d-flex flex-row">
            <img src="{{App\Models\User::find($item->user_id)->pic}}" class="img-fluid rounded-circle ml-3 pic55" />

            <div>
                <p class="text-dark IRANSansWeb_Medium bottom_p">{{App\Models\User::find($item->user_id)->name}}</p>
                <span class="IRANSansWeb_Medium text-dark"><i class="fas fa-clock"></i>{{jdate($item->created_at)->ago()}}</span>
            </div>
        </div>
    </div>
</a>
