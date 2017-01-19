	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			View
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?=Router::url(['action'=>'index']);?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">View</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-2">
				<a href="<?=Router::url(['action'=>'edit']);?>" class="btn btn-primary btn-block margin-bottom">Edit</a>
				<a href="<?=Router::url(['action'=>'delete']);?>" class="btn btn-warning btn-block margin-bottom">Delete</a>
				
			</div><!-- /.col -->
			<div class="col-md-9">
				<div class="box box-primary">
             		<div class="box-header with-border">
						<h3 class="box-title">princess_id</h3>
						<div class="box-tools"><?=h($princessaddress['PrincessAddress']['princess_id']);?></div>
					</div><!-- /.box-header -->

                         		<div class="box-header with-border">
						<h3 class="box-title">address_1</h3>
						<div class="box-tools"><?=h($princessaddress['PrincessAddress']['address_1']);?></div>
					</div><!-- /.box-header -->

                         		<div class="box-header with-border">
						<h3 class="box-title">address_2</h3>
						<div class="box-tools"><?=h($princessaddress['PrincessAddress']['address_2']);?></div>
					</div><!-- /.box-header -->

                         		<div class="box-header with-border">
						<h3 class="box-title">address_3</h3>
						<div class="box-tools"><?=h($princessaddress['PrincessAddress']['address_3']);?></div>
					</div><!-- /.box-header -->

                         		<div class="box-header with-border">
						<h3 class="box-title">postcode</h3>
						<div class="box-tools"><?=h($princessaddress['PrincessAddress']['postcode']);?></div>
					</div><!-- /.box-header -->

                         		<div class="box-header with-border">
						<h3 class="box-title">city_id</h3>
						<div class="box-tools"><?=h($princessaddress['PrincessAddress']['city_id']);?></div>
					</div><!-- /.box-header -->

                         		<div class="box-header with-border">
						<h3 class="box-title">province_id</h3>
						<div class="box-tools"><?=h($princessaddress['PrincessAddress']['province_id']);?></div>
					</div><!-- /.box-header -->

                         		<div class="box-header with-border">
						<h3 class="box-title">state_id</h3>
						<div class="box-tools"><?=h($princessaddress['PrincessAddress']['state_id']);?></div>
					</div><!-- /.box-header -->

                         		<div class="box-header with-border">
						<h3 class="box-title">status</h3>
						<div class="box-tools"><?=h($princessaddress['PrincessAddress']['status']);?></div>
					</div><!-- /.box-header -->

            					</div>
					
			</div>
			</div></section>