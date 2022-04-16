
                <table border="1">
                    <thead>
                        <tr>
                            <th><i class="icon-energy"></i></th>
                            <th>عنوان دوره</th>
                            <th>خرید توسط</th>
                            <th>شماره موبایل</th>
                            <th>قیمت</th>
                            <th>وضعیت پرداخت</th>
                            <th>تاریخ ایجاد</th>
                            <th>آخرین ویرایش</th>
                            <th>تاریخ پشتیبانی</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $item)
                        <tr class="success">
                            <td>{{ $item->id}}</td>
                            <td>{{ $item->term->title}}</td>
                            <td>{{$item->user->nf}}</td>
                            <td>{{$item->user->mobile}}</td>
                            <td>{{ number_format($item->price)}} تومان</td>
                            <td>{{$item->description}}</td>
                            <td>{{jdate($item->created_at)}}</td>
                            <td>{{jdate($item->updated_at)->ago()}}</td>
                            <td>{{jdate($item->expire_support)->format('Y-m-d')}}</td>

                        </tr>
                        @endforeach


                    </tbody>
                </table>
