<div class="container">
		<div class="row">
			<div class="col-sm-12">
						<nav class="navbar navbar-light bg-warning">
							
							<ul class="nav navbar-nav">
								<li class="nav-item active">
									<a class="nav-link" href="<?= base_url() ?>qltk">Trang chủ </a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="<?= base_url() ?>qltk/viewadd">Tài khoản mới</a>
								</li>
								
							</ul>
							<form class="form-inline navbar-form pull-right" method="POST" action="<?= base_url() ?>qltk/timkiem">
								<input name="txtTim" class="form-control" type="text" placeholder="Tìm kiếm">
								<button class="btn btn-success-outline" type="submit">Tìm</button>
							</form>
						</nav>
			</div>
		</div>
</div>