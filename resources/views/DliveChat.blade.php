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
  <h1 class="text-center ">KeskinPala Chat</h1>
  <!-- start:aside tengah chat room -->
  <div class="chats"> 
  <aside class="tengah-side chat" id ="chatDiv">

   

</aside>
</div>
<!-- end:aside tengah chat room -->


</section>

</div>

</div>

      @include('footer')
    <script>
      setInterval(function() {
        $.ajax({
    type: 'GET', //THIS NEEDS TO BE GET
    url: '/DliveChat/GetChat',
    success: function (data) {
       var Div="";
       $.each(data, function(index, item) {
        $.each(item, function(indexs, items) {

         Div= Div +"<div class='group-rom'><div class='first-part odd'>"+moment(items['sendTime']).format('HH:mm')+"</div><div class='second-part'>"+items['userName']+"</div><div class='third-part'>"+items['message']+"</div></div>";

        });
        
       });
      
       $(".chat").append( Div );
    },
    error: function() { 
         console.log(data);
    }
});

}, 1000); 
setInterval(function() {
  $('.chats').scrollTop($('.chats')[0].scrollHeight);
}, 100);

      </script>
        