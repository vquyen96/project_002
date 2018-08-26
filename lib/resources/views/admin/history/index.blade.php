@extends('admin.master')

@section('title', $acc->fullname)
@section('main')
<!-- DataTables -->
<link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap4.css">
<link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
<link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Lịch sửa giao dịch</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ asset('admin') }}">Trang chủ</a></li>
              <li class="breadcrumb-item"><a href="{{ asset('admin/account') }}">Tài khoản</a></li>
              <li class="breadcrumb-item active">Lịch sử</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">{{ $acc->fullname }}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

              	<form action="{{ asset('admin/history/'.$acc->id) }}" method="get" id="search" style="display: flex; line-height: 38px;">
				<div><b>Thời gian thống kê: {{$from}} <span class="text-warning">đến</span> {{$to}}</b></div>
				<div class="ml-3">
				    <button type="button" class="btn btn-default pull-right"
				            id="daterange-btn"><span><i class="fa fa-calendar"></i></span>
				    </button>
				    <input id="from" name="from" class="d-none">
				    <input id="to" name="to" class="d-none">
				</div>
				</form>


              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  	<th>Thời gian</th>
					<th style="white-space: nowrap;">Hành động</th>
					<th>Số tiền</th>
					<th>Nội Dung</th>
                </tr>
                </thead>
                <tbody>
                	@foreach($history as $item)
					<tr>
						<td style="white-space: nowrap;">{{ $item->created_at }}</td>
						<td style="white-space: nowrap;">
							@switch($item->type)
								@case(1)
									<div class="tagHistory">
										Nộp tiền
									</div>
									@break
								@case(2)
									<div class="tagHistory">
										Rút tiền
									</div>
									@break
								@case(3)
									@if($item->receiver_id != Auth::user()->id)
										<div class="tagHistory">
											Chuyển đi
										</div>
									@else
										<div class="tagHistory">
											Nhận vào
										</div>
									@endif
									@break
								
							@endswitch
							<div class="tagHistory">
								
							</div>
						</td>
						<td>{{ $item->type == 2 || $item->receiver_id != Auth::user()->id ? '-'.number_format($item->amount) : '+'.number_format($item->amount) }}</td>
						<td>{{ $item->messages }}</td>
						
					</tr>
					@endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

@stop

@section('script')

<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables/dataTables.bootstrap4.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>

<script>
  // $(function () {
  //   $("#example1").DataTable();

  // });
</script>
<script>
    console.log('Hello Human',moment());
    $('#daterange-btn').daterangepicker(
        {
            opens: "right",
            /*autoApply: true,*/
            locale: {
                "format": "DD/MM/YYYY",
                "separator": " - ",
                "applyLabel": "Chọn",
                "cancelLabel": "Hủy",
                "fromLabel": "Từ",
                "toLabel": "Đến",
                "customRangeLabel": "Tùy chọn",
                "weekLabel": "W",
                "daysOfWeek": [
                    "CN",
                    "T2",
                    "T3",
                    "T4",
                    "T5",
                    "T6",
                    "T7"
                ],
                "monthNames": [
                    "Tháng 1",
                    "Tháng 2",
                    "Tháng 3",
                    "Tháng 4",
                    "Tháng 5",
                    "Tháng 6",
                    "Tháng 7",
                    "Tháng 8",
                    "Tháng 9",
                    "Tháng 10",
                    "Tháng 11",
                    "Tháng 12"
                ],
                "firstDay": 1
            },
            ranges   : {
                'Hôm nay'       : [moment(), moment()],
                'Hôm qua'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                '7 ngày trước' : [moment().subtract(6, 'days'), moment()],
                '30 ngày trước': [moment().subtract(29, 'days'), moment()],
                'Tháng này'  : [moment().startOf('month'), moment().endOf('month')],
                'Tháng trước'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            startDate: moment(),
            endDate  : moment()
        },
        function (start, end) {
            $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        }
    );
    $('#daterange-btn').on('apply.daterangepicker', function(ev, picker) {
        $('#from').val(picker.startDate.format('YYYY-MM-DD'));
        $('#to').val(picker.endDate.format('YYYY-MM-DD'));
        $('#search').submit();
    });

</script>
@stop

