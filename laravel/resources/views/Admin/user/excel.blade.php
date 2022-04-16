
                <table border="1">
                    <thead>
                        <tr>
                            <th><i class="icon-energy"></i></th>
                            <th>نام و نام خانوادگی</th>
                            <th>موبایل</th>
                            <th>کیف پول</th>
                            <th>تاریخ ایجاد</th>
                            <th>آخرین ویرایش</th>
                            <th>امکانات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                        <tr class="success">
                            <td>{{ $item->id}}</td>
                            <td>{{ $item->nf}}</td>
                            <td>{{$item->mobile}}</td>
                            <td>{{number_format($item->balance())}} تومان</td>
                            <td>{{jdate($item->created_at)}}</td>
                            <td>{{jdate($item->updated_at)->ago()}}</td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
