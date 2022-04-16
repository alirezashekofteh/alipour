<div class="profile-stats">
    <div class="row post-cat">
@foreach ($subscription as $item)
                                    <div class="col-md-3 col-12 mb-3 mt-3">
                                        <div class="owl-item active tab-item">
                                            <div class="item">
                                                <a href=""
                                                    dideo-checked="true">
                                                    <h5 class="post-title text-dark p-2"><i
                                                            class="fa fa-check-square icontitle"></i>{{$item->name}}
                                                    </h5>
                                                </a>
                                                <hr>
                                                <div class="price p-2">
                                                    <ins class="text-danger"
                                                        style="text-decoration: none"><span>{{number_format($item->cost)}}<span>تومان</span></span></ins>
                                                        <a href="{{route('vip.purchase',$item->id)}}"
                                                    class="btn btn-success float-left" dideo-checked="true"><i
                                                        class="fa fa-eye" aria-hidden="true"></i>خرید عضویت</a>
                                                </div>
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
    </div>
</div>
