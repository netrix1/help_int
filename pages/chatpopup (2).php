<style type="text/css">
.mb-4, .my-4 {
	margin-bottom: 0rem!important;
}

.border-bottom {
	border-bottom: 1px solid #dee2e6!important;
}
.breadcrumb{
	margin-bottom: 0rem !important;
}
.card-footer {
	padding: .75rem 1.25rem .75rem 0rem;
}
.status-user-notification {
	-moz-border-radius: 50%;
	-webkit-border-radius: 50%;
	border-radius: 50%;
	-moz-background-clip: padding-box;
	-webkit-background-clip: padding-box;
	background-clip: padding-box;
	border: 2px solid #fff;
	color: #fefefe;
	font: normal 0.85em 'Lato';
	height: 15px;
	line-height: 1.75em;
	position: relative;
	right: 25px;
	text-align: center;
	top: 22px;
	width: 15px;
	content: "";
}
.status-user-offline{
	background: #db3434;
}
.status-user-online{
	background: #24c13f;
}
</style>
<div class="row no-gutters"> <!-- row -->
	<div class="col-sm-12 col-md-6 col-lg-4 bg-white border-right" style="min-height: calc(100vh - 94px);"> <!-- col -->
		<div class="card flat">
			<?php /*
			<div class="card-header h-60px">
				<div class="form-group form-group-icon m-0">
					<input type="text" id-search="input-search-list" data-search="list-group-search" class="form-control form-control-sm cs-form rounded" placeholder="Search...">
					<span class="material-icons form-icon">search</span>
				</div>
			</div>

				<div class="list-search-not-found p-3">    min-height: 87.8vh;</div>*/ ?>
				<div class="list-group list-group-flush list-group-search border-bottom scroll" style="max-height: 520px;">
					<a href="#" class="list-group-item list-group-item-action">
						<div class="media">
							<img class="mr-3 img-fluid h-35px rounded-circle" src="images/avatar/image-6.png" alt="Generic placeholder image">
							<div class="status-user-notification status-user-offline"></div>
							<div class="media-body d-flex justify-content-between align-items-center align-self-center">
								<div class="mt-0">John Doe</div>
								<div><small>2 min ago</small></div>
							</div>
						</div>
					</a>
					<a href="#" class="list-group-item list-group-item-action">
						<div class="media">
							<img class="mr-3 img-fluid h-35px rounded-circle" src="images/avatar/image-7.png" alt="Generic placeholder image">
							<div class="status-user-notification status-user-online"></div>
							<div class="media-body d-flex justify-content-between align-items-center align-self-center">
								<div class="mt-0">Ivan Petrov</div>
								<div><small>12:02</small></div>
							</div>
						</div>
					</a>
					<a href="#" class="list-group-item list-group-item-action">
						<div class="media">
							<img class="mr-3 img-fluid h-35px rounded-circle" src="images/avatar/image-9.png" alt="Generic placeholder image">
							<div class="status-user-notification status-user-online"></div>
							<div class="media-body d-flex justify-content-between align-items-center align-self-center">
								<div class="mt-0">Ambo Mina</div>
								<div class="d-flex flex-column"><small>09:22</small><span class="badge badge-pill badge-primary ml-2">2</span></div>
							</div>
						</div>
					</a>
					<a href="#" class="list-group-item list-group-item-action">
						<div class="media">
							<img class="mr-3 img-fluid h-35px rounded-circle" src="images/avatar/image-2.png" alt="Generic placeholder image">
							<div class="status-user-notification status-user-offline"></div>
							<div class="media-body d-flex justify-content-between align-items-center align-self-center">
								<div class="mt-0">Jenna Smith</div>
								<div><small>2 hours ago</small></div>
							</div>
						</div>
					</a>
				</div>
		</div>
	</div> <!-- end col -->
	<div class="col-sm-12 col-md-6 col-lg-8 bg-white"> <!-- col -->
		<div class="card flat">
			<div class="card-header h-60px p-1 mb-2"> <!-- card-header -->
				<div class="pt-1 pl-3 d-flex justify-content-between">
					<img class="mr-1 img-fluid h-35px rounded-circle d-flex align-self-center" src="images/avatar/image-1.png" alt="Generic placeholder image">
					<div class="w-100">Kelly George<small class="d-block font-13">Online</small></div>
					<div class="d-flex align-items-center dropdown">
						<button class="btn flat btn-sm bg-transparent text-muted hover-1"><span class="gg-icon material-icons">search</span></button>
						<button class="btn flat btn-sm bg-transparent text-muted hover-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><span class="gg-icon material-icons">more_vert</span></button>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="menu_chat_1">
								<a class="dropdown-item wave" href="#">View Profile</a>
								<a class="dropdown-item wave" href="#">Silent</a>
								<a class="dropdown-item wave" href="#">Block</a>
							</div>
					</div>
				</div>
			</div> <!-- end card-header -->
			<div class="card-body scroll font-14" style="height: calc(100vh - 226px);"> <!-- card-body -->
				<div class="media mb-2"> <!-- right -->
					<div class="media-body mr-50px">
						<div class="bg-opc p-1 rounded d-inline-block">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua.
						<small class="d-block text-right text-muted">10:21</small>
					</div>
					</div>
				</div> <!-- end right -->
				<div class="media mb-2"> <!-- left -->
					<div class="media-body ml-50px">
						<div class="bg-primary text-white p-1 rounded d-inline-block float-right">Lorem ipsum dolor
						<small class="d-block text-right text-opc_5">10:21</small>
						</div>
					</div>
				</div> <!-- end left -->
				<div class="media mb-2"> <!-- right -->
					<div class="media-body mr-50px">
						<div class="bg-opc p-1 rounded d-inline-block">consectetur adipisicing elit,
						<small class="d-block text-right text-muted">10:22</small>
						</div>
					</div>
				</div> <!-- end right -->
				<div class="media mb-2"> <!-- right -->
					<div class="media-body mr-50px">
						<div class="bg-opc p-1 rounded d-inline-block">Lorem ipsum <br>
							<img src="images/background/thumb-7.jpg" class="img-fluid">
							<small class="d-block text-right text-muted">10:21</small>
						</div>
					</div>
				</div> <!-- end right -->
			</div> <!-- end card-body -->
			<div class="card-footer"> <!-- card-footer -->
				<div class="d-flex justify-content-between">
					<button class="btn flat bg-transparent hover-1"><span class="gg-icon material-icons font-25">image</span></button>
					<button class="btn flat bg-transparent hover-1"><span class="gg-icon material-icons font-25">attach_file</span></button>
					<textarea class="form-control cs-form write-message flat border-bottom" id="write-message" rows="1" placeholder="Message"></textarea>
					<button class="btn bg-transparent flat hover-1"><span class="gg-icon material-icons font-25">send</span></button>
				</div>
			</div> <!-- end card-footer -->
		</div>
	</div> <!-- end col -->

</div> <!-- end row -->