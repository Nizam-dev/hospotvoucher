@extends('template.master')

@section('content')


<div class="container-fluid">

    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Banyak Pengguna</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$data['pengguna']}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Pengguna Aktif</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$data['pengguna_aktif']}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Voucher
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$data['voucher']}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Voucher Terpakai</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$data['voucher_terpakai']}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
    <div class="col-md-12">
        
        <!-- Bar Chart -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Penjualan Voucher</h6>
            </div>
            <div class="card-body">
                <div class="chart-bar" style="height: 100%;">
                    <canvas id="grafikpenjualan"></canvas>
                </div>
            </div>
        </div>
    </div>
    </div>



</div>

@endsection

@section('js')

<script src="{{asset('public/template/vendor/chart.js/Chart.min.js')}}"></script>

<script>

var data_penjualan = @json($grafik_penjualan);


let labels = [];
let datapenjualan = [];

data_penjualan.forEach((d)=>{
    labels.push(d.bulan)
    datapenjualan.push(d.total)
})

const data = {
  labels: labels,
  datasets: [{
    label: 'Penjualan Voucher',
    data: datapenjualan,
    backgroundColor: '#4e73df',
    borderWidth: 1
  }]
};

function addCommas(nStr) {
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    let rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}

const config = {
  type: 'bar',
  data: data,
  options: {
    scales: {
      y: {
        beginAtZero: true
      },
      yAxes: [{
            gridLines: {
                color: "#ECECEC",
            },
            ticks: {
                fontSize: 10,
                beginAtZero: true,
                callback: function (value, index, values) {
                    return 'Rp. '+addCommas(value); //! panggil function addComas tadi disini
                }
            }
        }]
    }
  },
};




var lineChart = new Chart($("#grafikpenjualan"), config);

</script>

@endsection