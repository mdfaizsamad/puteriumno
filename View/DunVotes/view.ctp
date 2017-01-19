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
						<h3 class="box-title">dun_id</h3>
						<div class="box-tools"><?=h($dunvote['DunVote']['dun_id']);?></div>
					</div><!-- /.box-header -->

                         		<div class="box-header with-border">
						<h3 class="box-title">code</h3>
						<div class="box-tools"><?=h($dunvote['DunVote']['code']);?></div>
					</div><!-- /.box-header -->

                         		<div class="box-header with-border">
						<h3 class="box-title">vote</h3>
						<div class="box-tools"><?=h($dunvote['DunVote']['vote']);?></div>
					</div><!-- /.box-header -->

                         		<div class="box-header with-border">
						<h3 class="box-title">status</h3>
						<div class="box-tools"><?=h($dunvote['DunVote']['status']);?></div>
					</div><!-- /.box-header -->

            					</div>
					
			</div>
			</div></section>