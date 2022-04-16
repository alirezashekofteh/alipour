<table border="1">
    <thead>
        <tr>
            <th></th>
            <th>مبلغ</th>
            <th>کاربر</th>
            <th>نوع</th>
            <th>توضیحات </th>
            <th>کد پیگیری</th>
            <th>تاریخ ثبت</th>
            <th> بازاریاب</th>
            <th> شماره قسط</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($wallet as $item)
            <tr class="success">
                <td>{{ $item->id }}</td>
                <td>{{ number_format($item->amount) }}</td>
                <td>{{ $item->user->nf }}</td>
                <td>{{ $item->type }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->resnumber }}</td>
                <td>{{ jdate($item->updated_at) }}</td>
                <td>{{ !empty($item->agents->nf) ? $item->agents->nf : '---' }}</td>
                <td>{{ $item->installments }}</td>




            </tr>
        @endforeach


    </tbody>
</table>
