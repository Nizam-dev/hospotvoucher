@extends('template.master')

@section('content')


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">History</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Voucher</th>
                        <th>Durasi</th>
                        <th>Sisa Waktu</th>
                        <th>Harga</th>
                </thead>

                <tbody>
                    @foreach($historys as $history)
                        <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$history->created_at}}</td>
                        <td>{{$history->kode_voucher}}</td>
                        <td>{{$history->durasi}} Menit</td>
                        <td>{{$history->sisa_durasi}} Menit</td>
                        <td>{{$history->harga}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        
        <!-- Bar Chart -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Pemakaian Voucher</h6>
            </div>
            <div class="card-body">
                <div class="chart-bar" style="height: 100%;">
                    <canvas id="grafikvoucher"></canvas>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection


@section('js')
<script src="{{asset('public/template/vendor/chart.js/Chart.min.js')}}"></script>

<script>
    $("#dataTable").DataTable()

var data_graifk = @json($history_grafik);


let labels = [];
let datagrap = [];

data_graifk.forEach((d)=>{
    labels.push(d.nama_voucher)
    datagrap.push(d.total)
})

const data = {
  labels: labels,
  datasets: [{
    label: 'Jumlah Voucher',
    data: datagrap,
    backgroundColor: '#4e73df',
    borderWidth: 1
  }]
};

const config = {
  type: 'bar',
  data: data,
  options: {
    legend: {
        display: false
    },
    scales: {
      y: {
        beginAtZero: true
      },
      yAxes: [{
            ticks: {
                beginAtZero: true
            }
        }]
    }
  },
};




var lineChart = new Chart($("#grafikvoucher"), config);

</script>

@endsection

