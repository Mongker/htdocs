<div class="container">
		<div class="row">
			<div class="col-sm-12">
						<nav class="navbar navbar-light bg-danger">
							
							<ul class="nav navbar-nav">
								<li class="nav-item active">
									<b><a class="nav-link" href="<?= base_url() ?>login/ds_benhnhan">Trang chủ |</a></b>
								</li>
								<li class="nav-item">
									<b><a class="nav-link" href="<?= base_url() ?>login/themds">Thêm hồ sơ mới|</a></b>
								</li>
								<li class="nav-item">
									<button class="btn btn-success-outline"><a class="nav-link" href="<?= base_url() ?>login/"><b>Đăng Xuất</b></a></button>
								</li>
								<li class="nav-item">
									<b><a class="nav-link" href="<?= base_url() ?>"></a></b>
								</li>
								
								
								
							</ul>
							<form class="form-inline navbar-form pull-right" method="POST" action="<?= base_url() ?>">
								<input name="txtTim" class="form-control" type="text" placeholder="Tìm kiếm">
								<button class="btn btn-success-outline" type="submit">Tìm</button>
							</form>
						</nav>
			</div>
		</div>
</div>