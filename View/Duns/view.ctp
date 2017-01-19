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
						<h3 class="box-title">parliament_id</h3>
						<div class="box-tools"><?=h($dun['Dun']['parliament_id']);?></div>
					</div><!-- /.box-header -->

                         		<div class="box-header with-border">
						<h3 class="box-title">code</h3>
						<div class="box-tools"><?=h($dun['Dun']['code']);?></div>
					</div><!-- /.box-header -->

                         		<div class="box-header with-border">
						<h3 class="box-title">dun</h3>
						<div class="box-tools"><?=h($dun['Dun']['dun']);?></div>
					</div><!-- /.box-header -->

                         		<div class="box-header with-border">
						<h3 class="box-title">status</h3>
						<div class="box-tools"><?=h($dun['Dun']['status']);?></div>
					</div><!-- /.box-header -->

            					</div>
					
			</div>
			</div></section>