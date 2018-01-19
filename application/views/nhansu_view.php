<!DOCTYPE html>
<html lang="en">
<head>
	<title> Giao diện hiển thị danh sách nhân sự </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">  
	<script type="text/javascript" src="<?php echo base_url() ?>vendor/bootstrap.js"></script>
	<!-- Muốn sử dụng jquery.fileupload.js thì phải khai báo jquery.ui.widget.js trước -->
	<script type="text/javascript" src="<?php echo base_url() ?>jqueryuploadfile/js/vendor/jquery.ui.widget.js"></script>
	<!-- sử dụng jquery để upload file sử dụng ajax -->
	<script type="text/javascript" src="<?php echo base_url() ?>jqueryuploadfile/js/jquery.fileupload.js"></script>
	<!-- Nhưng muốn sử dụng jquery.fileupload.js thì phải khai báo thêm jquery.ui.widget.js-->
	
 	<script type="text/javascript" src="<?php echo base_url() ?>1.js"></script>
	<link rel="stylesheet" href="<?php echo base_url() ?>vendor/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>vendor/font-awesome.css">
 	<link rel="stylesheet" href="<?php echo base_url() ?>1.css">
</head>
<body >
 	<div class="container">
 		<div class="text-xs-center">
 			<h3 class="display-3">Danh sách nhân sự</h3>
 		</div>
 	</div>
 	<div class="container">
 		<div class="row">
 		<!--cards:columns-->
 			<div class="card-columns">
				<?php foreach ($dulieuketqua as $value): ?>
					<div class="card">
		 				<img class="card-img-top img-fluid" src="<?= $value['anhavatar'] ?>" alt="Card image cap">
		 				<div class="card-block">
		 					<h4 class="card-title ten"><?= $value['ten'] ?></h4>
		 					<p class="card-text badge badge-secondary tuoi">Age: <cite><?= $value['tuoi'] ?></cite></p>
		 					<p class="card-text sdt">Tel: <cite><?= $value['sdt'] ?></cite></p>
		 					<p class="card-text sodonhang">Number of order have complete: <?= $value['sodonhang'] ?></p>
		 					<p class="card-text linkfb">
		 						<a href="<?= $value['linkfb'] ?>" class="btn btn-secondary btn-center">Facebook <i class="fa fa-chevron-right"></i></a>

								<a href="<?= base_url() ?>/index.php/nhansu_controller/edit_nhanvien/<?= $value['id'] ?>" class="btn btn-warning btn-xs">Edit <i class="fa fa-pencil"></i></a>

								<a href="<?= base_url() ?>/index.php/nhansu_controller/delete_nhanvien/<?= $value['id'] ?>" class="btn btn-outline-danger btn-xs">Xoá <i class="fa fa-remove"></i></a>
		 					</p>	
		 				</div>
		 			</div><!-- div-card -->
	 			
				<?php endforeach ?>

	 		</div><!--div của card column-->

		</div><!--div row-->

		<div class="row">
			<!-- <form method="post" enctype="multipart/form-data" action="/index.php/nhansu_controller/nhansu_add"> -->
				<div class="container">
					<div class="text-xs-center">
						<h3 class="display-3">Thêm mới nhân sự</h3>
						<hr>
					</div>
				</div> <!-- div liên quan đến việc thêm nhân sự -->

				<div class="form-group row">
					<div class="col-sm-6">
						<div class="row">
							<label for="anh" class="col-sm-2 form-control-label">Ảnh đại điện</label>
							<div class="col-sm-8">
							<!-- trong trường id thì ta đặt anhavatar trùng với trường lấy ảnh trong phpmyadmin
								. Do chọn ảnh mà ảnh là 1 file nên ta đặt trường type="file"
								Sửa name="anhavatar" thành name="files[]"
							 -->
								<input name="files[]" type="file" class="form-control" id="anhavatar" placeholder="Upload file image">
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="row">
								<label for="ten" class="col-sm-4 form-control-label">Tên nhân viên</label>
								<div class="col-sm-8">
									<input name="ten" type="text" class="form-control" id="ten" placeholder="Tên nhân viên">
								</div>
						</div><!-- div để lấy Tên nhân viên -->
					</div>
				</div> <!-- div để lấy ảnh avatar và tên nhân viên -->

				<div class="form-group row">
					<div class="col-sm-4">
						<div class="row">
							<label for="tuoi" class="col-sm-4 form-control-label" >Tuổi</label>
							<div class="col-sm-8">
								<input name="tuoi" type="number" class="form-control" id="tuoi"
								placeholder="Tuổi">
							</div>
						</div>
					</div><!-- div để lấy tuổi của nhân viên -->
					<div class="col-sm-4">
						<div class="row">
							<label for="sdt" class="col-sm-4 form-control-label" >Số điện thoại</label>
							<div class="col-sm-8">
								<input name="sdt" type="text" class="form-control" id="sdt"
								placeholder="Số điện thoại">
							</div>
						</div>
					</div><!-- div để lấy Số điện thoại của nhân viên-->
					<div class="col-sm-4">
						<div class="row">
							<label for="sodonhang" class="col-sm-4 form-control-label" >Số đơn hàng</label>
							<div class="col-sm-8">
								<input name="sodonhang" type="number" class="form-control" id="sodonhang"
								placeholder="Số đơn hàng">
							</div>
						</div>
					</div><!-- div để lấy số đơn hàng của nhân viên -->
					<div class="col-sm-4">
						<div class="row">
							<label for="linkfb" class="col-sm-4 form-control-label" >Link facebook</label>
							<div class="col-sm-8">
								<input name="linkfb" type="text" class="form-control" id="linkfb"
								placeholder="nhập link facebook">
							</div>
						</div>
					</div><!-- div để lấy link facebook của nhân viên -->
				</div>

				<div class="form-group row">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="button" class="btn btn-success nutxulyajax">Thêm mới(bằng ajax)</button>
						<button type="reset" class="btn btn-danger">Nhập lại</button>
					</div>
				</div> <!-- div tạo nút Sign in -->
			<!-- </form> -->
		</div>
 	</div><!--div container-->
 	<script>
 	//Viết hàm upload files bằng jquery
 	duongdan='<?php echo base_url() ?>';
 	//#anhavatar được đặt theo id của thẻ input ảnh
 	$('#anhavatar').fileupload({
 		//uploadfile là 1 phương thức có trong nhansu_controller
 		url:duongdan+'index.php/nhansu_controller/uploadfile',
 		dataType:'json',
 		done:function(e,data){
 			$.each(data.result.files, function(index,file){
 				//in ra đường dẫn file.url (bằng lệnh console.log) của file vừa upload lên
 				//console.log(file.url)
 				//gán đường dẫn file.url cho biến tenfile
 				tenfile=file.url;
 			});
 		}

 	})
 	//Viết hàm xử lý upload dữ liệu và xuất dữ liệu ra màn hình bằng ajax
 	$('.nutxulyajax').click(function(event) {
 		/* Tất cả hàm này sẽ chạy nếu như click vào button có chứa class nutxulyajax */
 		$.ajax({
 			url: '<?= base_url() ?>/index.php/nhansu_controller/ajax_add',//url có vai trò chỉ đường dẫn đến phương thức ajax_add có trong nhansu_controller
 			type: 'POST',
 			dataType: 'json',
 			data: {
 				ten:$('#ten').val(),//#ten tức id="ten"
 				tuoi:$('#tuoi').val(),//#tuoi tức id="tuoi"
 				sdt:$('#sdt').val(),//#sdt tức là id="sdt"
 				linkfb:$('#linkfb').val(),//#linkfb tức là id="linkfb"
 				sodonhang:$('#sodonhang').val(),//#sodonhang tức là id="sodonhang"
 				//anhavatar:$('#anhavatar').val(),// anhavtar thì gửi sau vì ajax chỉ xử lý dữ liệu chứ không xử lý file vật lý mà anhavatar là file vật lý
 				anhavatar:tenfile

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
 			noidung='<div class="card">';
 			//trường ảnh dùng hình ảnh mặc định
 			//noidung+='<img class="card-img-top img-fluid" src="https://i-vnexpress.vnecdn.net/2017/08/25/Anh-1503645731-6333-1503645884_180x108.jpg" alt="Card image cap">';
 			//trường ảnh dùng jquery dê upload file
 			noidung+='<img class="card-img-top img-fluid" src="'+tenfile+'" alt="Card image cap">';
 			noidung+='<div class="card-block">';	
 			noidung+='<h4 class="card-title ten">'+$('#ten').val()+'</h4>';
 			noidung+='<p class="card-text badge badge-secondary tuoi">Age: <cite>'+$('#tuoi').val()+'</cite></p>';
 			noidung+='<p class="card-text sdt">Tel: <cite>'+$('#sdt').val()+'</cite></p>';
 			noidung+='<p class="card-text sodonhang">Number of order have complete: '+$('#sodonhang').val()+'</p>';
 			noidung+='<p class="card-text linkfb">';
 			noidung+='<a href="'+$('#linkfb').val()+'" class="btn btn-secondary btn-center">Facebook <i class="fa fa-chevron-right"></i></a>';
			noidung+='<a href="<?= base_url() ?>/index.php/nhansu_controller/edit_nhanvien/<?= $value['id'] ?>" class="btn btn-warning btn-xs">Edit <i class="fa fa-pencil"></i></a>';
 			noidung+='<a href="<?= base_url() ?>/index.php/nhansu_controller/delete_nhanvien/<?= $value['id'] ?>" class="btn btn-outline-danger btn-xs">Xoá <i class="fa fa-remove"></i></a>';
 			noidung+='</p>';
 			noidung+='</div>';
 			noidung+='</div><!-- div-card -->';
 			//Hàm xuất nội dung lập tức sau khi ấn nút "Thêm mới(bằng ajax)"
 			$('.card-columns').append(noidung);
 			//Các dòng lệnh dùng để đưa về trạng thái trống dữ liệu
 			$('#ten').val('');
 			$('#tuoi').val('');
 			$('#sdt').val('');
 			$('#sodonhang').val('');
 			$('#linkfb').val('');
 			
 		});
 	});
 		
 		
 	</script>
</body>
</html>