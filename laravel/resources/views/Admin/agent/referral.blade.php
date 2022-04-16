@extends('Admin.Layouts.master')
@section('css-page')
@endsection
@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header-left col-12 mb-2 mt-1">
            <div class="row breadcrumbs-top">
              <div class="col-12">
                <div class="breadcrumb-wrapper">
                  <ol class="breadcrumb p-0 mb-0">
                    <li class="breadcrumb-item"><a href="index.html"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active">لیست بازاریاب ها
                    </li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
      <div class="content-body"><!-- Dashboard Ecommerce Starts -->
        <section class="row">
            <!-- create invoice button-->
            <!-- Options and filter dropdown button-->
            <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <form action="" method="GET">
                        <div class="row col-12">

                          <div class="col-6">
                             لینک بازاریابی دوره ها برای بازاریاب : {{$agent->nf}}

                            </div>
                           
                            

                        </div>
                      </form>
                  </div>
                  <div class="card-content">
<hr>
                    <div class="card-body">
                      <!-- Table with outer spacing -->
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>نام دوره </th>
                            <th>لینک دوره</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($terms as $item)
                        <tr class="success">
                            <td>{{ $item->title }}</td>
                            <td style="direction: rtl"><a href=" {{ route('term.purchase',$item->slug) . '?ref=' . $agent->refcode }}">لینک بازاریابی دوره</a></td>
                           

                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
                    </div>

                  </div>
                  <div class="card-footer">
                   
                </div>
                </div>
              </div>
          </section>
<!-- Dashboard Ecommerce ends -->

      </div>
    </div>
  </div>
@endsection
@section('js-page')
<script>
    $('.delete-buttom').on('click', function (e) {
            e.preventDefault();
            var $this = $(this);
            var id =$(this).attr("id");
            Swal.fire({
                title: 'آیا اطمینان دارید؟',
                text: "این عملیات برگشت پذیر نیست...",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'بله ،حذف شود!',
                cancelButtonText:'لغو عملیات'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#delete-form'+id).submit();
                }
            })
        });
</script>
@endsection
