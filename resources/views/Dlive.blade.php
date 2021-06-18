 @include('header')
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dlive Yayın Yönetimi
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
      <li class="active">Dlive</li>
    </ol>
  </section>
  <section class="content">
  <h1 class="text-center "></h1>
  <div class= "container-fluid">
 <div class="row" >
  <div class="box box-info">
    <div class="box-header with-border">
     <button class="pull-right btn btn-dark ekle" style="margin-right:10% ;"><i class="fa fa-plus"></i> Yayın Detayı Ekle</button>
      <h3 class="box-title">{{now("Europe/Istanbul")->addDays(-30)->format('d/m/Y')}} - {{now("Europe/Istanbul")->format('d/m/Y')}} Arası Eklenmiş Yayın Detayları </h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <!-- /.box-header -->

    <div class="box-body">
          <!-- solid sales graph -->
          <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right">
              <li class="active"><a href="#chartim" data-toggle="tab">Area</a></li>
              <li class="pull-left header"><i class="fa fa-inbox"></i> Dlive Aylık Çizelge</li>
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
<div class="modal fade" id="EkleDlive" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-center" id="exampleModalLongTitle">Yayın Ekleme</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id='DliveEkleForm' method="post" action="{{route('DliveDetayFormSend')}}">
          <div class="form-group">
            <label for="Gun">Yayın Günü</label>
            <input type="date" class="form-control" id="Gun" aria-describedby="YayinGun" placeholder="" value="{{today()->format("Y-m-d")}}" name="YayinGunu">
            <small id="Gun" class="form-text text-muted">Hangi gün yayın yapıldığını giriniz.</small>
          </div>
          <div class="form-group">
            <label for="Sure">Yayın Süresi</label>
            <input type="time" class="form-control" id="Sure" placeholder="Yayın Süresi" value='02:00' name="YayinSaat">
            <small id="Sure" class="form-text text-muted">Yayın süresini giriniz.</small>
          </div>
          <div class="form-group">
            <label for="Limon">Limon Miktarı</label>
            <input type="number" class="form-control" id="Limon" placeholder="Limon Miktarı" value="0" name="Limon">
            <small id="Limon" class="form-text text-muted">Bağış atılan limon miktarını giriniz.</small>
          </div>
          <div class="form-group">
            <label for="KasaLimon">Kasadaki Limon Miktarı</label>
            <input type="number" class="form-control" id="KasaLimon" placeholder="Kasadaki Limon Miktarı" value="0" name="KasaLimon">
            <small id="KasaLimon" class="form-text text-muted">Kasada biriken limon miktarını giriniz.</small>
          </div>
          <div class="form-group">
            <label for="Abone">Yayın sırasındaki abone olan Miktarı</label>
            <input type="number" class="form-control" id="Abone" placeholder="Limon Miktarı" value="0" name="SubCount">
            <small id="Abone" class="form-text text-muted">Abone olan kişi sayısını giriniz giriniz.</small>
          </div>
          <div class="form-group">
            <label for="HesapLimon">Hesaptaki Limon Miktarı</label>
            <input type="number" class="form-control" id="HesapLimon" placeholder="Hesaptaki Limon Miktarı" value="0" name="HesapLimonCount">
            <small id="HesapLimon" class="form-text text-muted">Hesaptaki tüm limon miktarını giriniz.</small>
          </div>
          <div class="form-check text-right">
            <input type="checkbox" class="form-check-input" id="Onay">
            <label class="form-check-label" for="exampleCheck1">Yayını eklemek için onayla </label>
          </div>
          
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" >İptal</button>
        <button type="button" class="btn btn-primary" disabled="true" id="button-Ekle">Yayını Ekle</button>
      </div>
    </div>
  </div>
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
      <script>
      $(".ekle").on('click',function(){
        $('#EkleDlive').modal('show');

      });  


    //  $('#EkleDlive').modal('show');


      $("#Onay").on('click',function(){
      if ($('#Onay').is(':checked')) {
        $('#button-Ekle').removeAttr("disabled");
      }
      else{
        $('#button-Ekle').attr({disabled:"disabled"});
      }
      });
      $("#button-Ekle").on('click',function(){
        $('#DliveEkleForm').submit();
      });
      </script>
        