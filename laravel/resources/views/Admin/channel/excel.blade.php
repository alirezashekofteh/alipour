
                <table border="1">
                    <thead>
                        <tr>
                            <th><i class="icon-energy"></i></th>
                            <th>عنوان کانال</th>
                            <th>خرید توسط</th>
                            <th>شماره موبایل</th>
                            <th>تاریخ انقضا</th>
                            <th>تاریخ ایجاد</th>
                         
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($channels as $item)
                        <tr class="success">
                            <td>{{ $item->id}}</td>
                            <td>{{ $item->channel->name}}</td>
                            <td>{{$item->user->nf}}</td>
                            <td>{{$item->user->mobile}}</td>
                            <td>{{jdate($item->expire_at)}}</td>
                            <td>{{jdate($item->created_at)}}</td>
                          

                        </tr>
                        @endforeach


                    </tbody>
                </table>
