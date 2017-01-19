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
						<h3 class="box-title">name</h3>
						<div class="box-tools"><?=h($princess['Princess']['name']);?></div>
					</div><!-- /.box-header -->

                         		<div class="box-header with-border">
						<h3 class="box-title">parlimen</h3>
						<div class="box-tools"><?=h($princess['Princess']['parlimen']);?></div>
					</div><!-- /.box-header -->

                         		<div class="box-header with-border">
						<h3 class="box-title">parliament_id</h3>
						<div class="box-tools"><?=h($princess['Princess']['parliament_id']);?></div>
					</div><!-- /.box-header -->

                         		<div class="box-header with-border">
						<h3 class="box-title">dun</h3>
						<div class="box-tools"><?=h($princess['Princess']['dun']);?></div>
					</div><!-- /.box-header -->

                         		<div class="box-header with-border">
						<h3 class="box-title">dun_id</h3>
						<div class="box-tools"><?=h($princess['Princess']['dun_id']);?></div>
					</div><!-- /.box-header -->

                         		<div class="box-header with-border">
						<h3 class="box-title">dun_undi</h3>
						<div class="box-tools"><?=h($princess['Princess']['dun_undi']);?></div>
					</div><!-- /.box-header -->

                         		<div class="box-header with-border">
						<h3 class="box-title">dun_vote_id</h3>
						<div class="box-tools"><?=h($princess['Princess']['dun_vote_id']);?></div>
					</div><!-- /.box-header -->

                         		<div class="box-header with-border">
						<h3 class="box-title">caw</h3>
						<div class="box-tools"><?=h($princess['Princess']['caw']);?></div>
					</div><!-- /.box-header -->

                         		<div class="box-header with-border">
						<h3 class="box-title">branch_id</h3>
						<div class="box-tools"><?=h($princess['Princess']['branch_id']);?></div>
					</div><!-- /.box-header -->

                         		<div class="box-header with-border">
						<h3 class="box-title">age_id</h3>
						<div class="box-tools"><?=h($princess['Princess']['age_id']);?></div>
					</div><!-- /.box-header -->

                         		<div class="box-header with-border">
						<h3 class="box-title">vote</h3>
						<div class="box-tools"><?=h($princess['Princess']['vote']);?></div>
					</div><!-- /.box-header -->

                         		<div class="box-header with-border">
						<h3 class="box-title">member</h3>
						<div class="box-tools"><?=h($princess['Princess']['member']);?></div>
					</div><!-- /.box-header -->

                         		<div class="box-header with-border">
						<h3 class="box-title">status</h3>
						<div class="box-tools"><?=h($princess['Princess']['status']);?></div>
					</div><!-- /.box-header -->

            					</div>
					
			</div>
			</div></section>