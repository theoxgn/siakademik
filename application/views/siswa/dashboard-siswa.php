<div class="page-title-expand">
	<div class="container">
		<div class="row">
			<div>
				<h4 class="my-1">Hi, welcome back!</h4>
				<p class="mb-0">Last login was 23 hours ago. <a href="#">View details</a>
				</p>
			</div>
			<div class="flex-1"></div>
			<!-- /.d-inline-flex -->
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container -->
</div>
<!-- /.page-title -->
<!-- =================================== -->
<!-- Different data widgets ============ -->
<!-- =================================== -->
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="widget-list row">
				<!-- /.widget-holder -->
				<div class="widget-holder col-4">
					<div class="widget-bg">
						<div class="widget-body bg-secondary text-inverse px-4 pt-3 pb-4 radius-3">
							<div class="icon-box icon-box-centered flex-1 my-0 p-0">
								<header class="align-self-center"><a href="#" class="bg-grey fs-30 text-muted"><i class="lnr lnr-cart icon-lg"></i></a>
								</header>
								<section class="mt-0">
									<h6 class="icon-box-title my-0">Rp<span class="counter"><?= $pembayaran->TOTAL == null ? "0" : $pembayaran->TOTAL; ?></span></h6>
									<p class="mb-0">Jumlah Pembayaran</p>
								</section>
							</div>
							<!-- /.icon-box -->
						</div>
						<!-- /.widget-body -->
					</div>
					<!-- /.widget-bg -->
				</div>
				<!-- /.widget-holder -->
				<div class="widget-holder col-4">
					<div class="widget-bg">
						<div class="widget-body bg-danger text-inverse px-4 pt-3 pb-4 radius-3">
							<div class="icon-box icon-box-centered flex-1 my-0 p-0">
								<header class="align-self-center"><a href="#" class="bg-grey fs-30 text-muted"><i class="lnr lnr-cart icon-lg"></i></a>
								</header>
								<section class="mt-0">
									<h6 class="icon-box-title my-0">Rp<span class="counter"><?= $tagihan->NOMINAL == null ? "0" : $tagihan->NOMINAL; ?></span></h6>
									<p class="mb-0">Jumlah tagihan</p>
								</section>
							</div>
							<!-- /.icon-box -->
						</div>
						<!-- /.widget-body -->
					</div>
					<!-- /.widget-bg -->
				</div>
				<!-- /.widget-holder -->
				<div class="widget-holder col-4">
					<div class="widget-bg">
						<div class="widget-body px-4 pt-3 pb-4">
							<div class="icon-box icon-box-centered flex-1 my-0 p-0 radius-3">
								<header class="align-self-center"><a href="#" class="bg-grey fs-30 text-muted"><i class="lnr lnr-users icon-lg"></i></a>
								</header>
								<section class="mt-0">
									<h6 class="icon-box-title my-0"><span class="counter"><?= $siswa; ?></span></h6>
									<p class="mb-0">Jumlah Siswa</p>
								</section>
							</div>
							<!-- /.icon-box -->
						</div>
						<!-- /.widget-body -->
					</div>
					<!-- /.widget-bg -->
				</div>
				<!-- /.widget-holder -->
			</div>
			<!-- /.widget-list -->
		</div>
		<!-- /.col-lg-4 -->
	</div>
	<!-- /.widget-list -->
</div>
