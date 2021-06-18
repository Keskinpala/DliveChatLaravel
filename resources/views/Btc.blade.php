 @include('header')
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Bitcoin
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
      <li class="active">BitCoin</li>
    </ol>
  </section>
  <section class="content">
  <h1 class="text-center ">Bitcoin hesaplama</h1>
  <div class= "container-fluid">
 <div class="row" >
  <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">{{now("Europe/Istanbul")->format('d/m/Y')}} Tarihli Bitcoin Hesapları</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="table-responsive">
        
        <table class="table no-margin">
          <thead>
          <tr>
            <th>Site</th>
            <th>Max ₺</th>
            <th>Min ₺</th>
            <th>Ort ₺</th>
            <th>Max $</th>
            <th>Min $</th>
            <th>Ort $</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($AllSite as $item)
          <tr>
          <td>{{$item->Site}}</td>
            <td>{{number_format($item->MaxBtcTurkLirasi,2)}} ₺</td>
            <td>{{number_format($item->MinBtcTurkLirasi,2)}} ₺</td>
            <td>{{number_format($item->OrtBtcTurkLirasi,2)}} ₺</td>
            <td>{{number_format($item->MaxBtcUsd,2)}} $</td>
            <td>{{number_format($item->MinBtcUsd,2)}} $</td>
            <td>{{number_format($item->OrtBtcUsd,2)}} $</td>
          </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <div class="box-body">
          <!-- solid sales graph -->
          <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right">
              <li class="active"><a href="#chartim" data-toggle="tab">Area</a></li>
              <li class="pull-left header"><i class="fa fa-inbox"></i> Bitcoin haftalık çizelge</li>
            </ul>
            <div class="tab-content no-padding">
              <!-- Morris chart - Sales -->
              <div class="chart tab-pane active" id="chartim" style="position: relative; height: 300px;"></div>

            </div>
          </div><!-- /.nav-tabs-custom -->
    </div>
    <!-- /.box-body -->
    
    <!-- /.box-footer -->
  </div>
</div>
</div>

</section>

</div>

      @include('footer')
      <script>   

var veri = {!! $Graph !!};
var morrisData = [];

$.each(veri, function(key, val){
  console.log(val[0])
    morrisData.push({'y':  val['y'], 'item1' : val['item1'], 'item2' : val['item2'], 'item3' : val['item3']}); 
});
console.log(morrisData);
    var area = new Morris.Area({
    element: 'chartim',
    resize: true,
    data: morrisData,
    xkey: 'y',
    ykeys: ['item1', 'item2','item3'],
    labels: ['Max', 'Min', 'Ortalama'],
    lineColors: ['#a0d0e0', '#3c8dbc', '#8cadfc'],
    hideHover: 'auto'
  });
      $(".knob").knob();
        </script>