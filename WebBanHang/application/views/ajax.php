 <script>
    $('.themmoi').click(function(event) {
      $.ajax({
       url: 'nhasu/ajax_add',
       type: 'POST',
       dataType: 'JSON',
       data: {
        ten:       $('.#ten').val(), 
        tuoi:      $('.#tuoi').val(),
        sdt:       $('.#sdt').val(),
        linkfb:    $('.#linkfb').val(),
        anhavatar: $('.#anhavatar').val()
        },
     })
      .done(function() {
       console.log("success");
     })
     .fail(function() {
       console.log("error");
     })
     .always(function() {
       console.log("complete");
        //them noi dung 
           noidung  = ' <div class="col-sm-4">';
           noidung += '<div class="card">';
           noidung += ' <img class="card-img-top img-fluid " src="http://localhost/WebBanHang/img/icon.jpg">';
           noidung += '  <div class="card-block">';
           noidung += '<div class="card-title ">Tên : <strong>'+$('.#ten').val()+'</strong></div>';
           noidung += ' <div class="card-text  tuoi">Tuổi: <b>'+$('.#tuoi').val()+'</b></div>';
           noidung += ' <div class="card-text  sdt">Số điện thoại :<b>'+$('.#sdt').val()+'</b></div>';
           noidung += ' <a href="'+$('.#linkfb').val()+'">';
           noidung += '  <button type="button" class="btn btn-info" >Facebook ';
           noidung += '<i class="fab fa-facebook"></i>';
           noidung += '</button>';
           noidung += ' </a>';
           noidung += ' </div> <!-- hết card-text text-center linkfb --> ';
           noidung += '<div class="card-text " style="text-align: center;">';
           noidung += ' <a href="<?php echo base_url() ?>nhansu/sua_nhansu/<?= $value['id'] ?>">';
           noidung += '  <button type="button" class="btn btn-warning" >Sữa   ';
           noidung += '<i class="fas fa-user-edit"></i> </button>';
           noidung += ' </a>';
           noidung += ' <a href="<?php echo base_url() ?>nhansu/xoa_nhansu/<?= $value['id'] ?>">';
           noidung += ' <button type="button" class="btn btn-danger" > Xóa';
           noidung += '<i class="fas fa-trash-alt"></i>';
           noidung += '</button></a>';
           noidung += '</div> <!-- card-text text-center  -->';
           noidung += ' </div>  <!-- card-block -->';
           noidung += ' </div>  <!-- card -->';
           noidung += ' </div>  <!-- col-sm-4 -->';
      $('.card-deck').append(noidung);

        $('.#ten').val('');
        $('.#tuoi').val('');
        $('.#sdt').val('');
        $('.#linkfb').val('');
        $('.#anhavatar').val('');
          

     });
    });
   </script>