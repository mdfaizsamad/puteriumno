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
						<h3 class="box-title">access_route_id</h3>
						<div class="box-tools"><?=h($accessmenu['AccessMenu']['access_route_id']);?></div>
					</div><!-- /.box-header -->

                         		<div class="box-header with-border">
						<h3 class="box-title">parent_id</h3>
						<div class="box-tools"><?=h($accessmenu['AccessMenu']['parent_id']);?></div>
					</div><!-- /.box-header -->

                         		<div class="box-header with-border">
						<h3 class="box-title">icon</h3>
						<div class="box-tools"><?=h($accessmenu['AccessMenu']['icon']);?></div>
					</div><!-- /.box-header -->

                         		<div class="box-header with-border">
						<h3 class="box-title">name</h3>
						<div class="box-tools"><?=h($accessmenu['AccessMenu']['name']);?></div>
					</div><!-- /.box-header -->

                         		<div class="box-header with-border">
						<h3 class="box-title">enabled</h3>
						<div class="box-tools"><?=h($accessmenu['AccessMenu']['enabled']);?></div>
					</div><!-- /.box-header -->

                         		<div class="box-header with-border">
						<h3 class="box-title">roles</h3>
						<div class="box-tools"><?=h($accessmenu['AccessMenu']['roles']);?></div>
					</div><!-- /.box-header -->

                         		<div class="box-header with-border">
						<h3 class="box-title">lft</h3>
						<div class="box-tools"><?=h($accessmenu['AccessMenu']['lft']);?></div>
					</div><!-- /.box-header -->

                         		<div class="box-header with-border">
						<h3 class="box-title">rght</h3>
						<div class="box-tools"><?=h($accessmenu['AccessMenu']['rght']);?></div>
					</div><!-- /.box-header -->

                         		<div class="box-header with-border">
						<h3 class="box-title">position</h3>
						<div class="box-tools"><?=h($accessmenu['AccessMenu']['position']);?></div>
					</div><!-- /.box-header -->

            					</div>
					
			</div>
			</div></section>