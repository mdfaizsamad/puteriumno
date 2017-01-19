	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			View
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?="<?=Router::url(['action'=>'index']);?>";?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">View</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-2">
				<a href="<?="<?=Router::url(['action'=>'edit']);?>";?>" class="btn btn-primary btn-block margin-bottom">Edit</a>
				<a href="<?="<?=Router::url(['action'=>'delete']);?>";?>" class="btn btn-warning btn-block margin-bottom">Delete</a>
				
			</div><!-- /.col -->
			<div class="col-md-9">
				<div class="box box-primary">
<?php
				foreach ($fields as $field) :
            $camelcaseField = Inflector::camelize($field);
            $id = $modelClass.$camelcaseField;
            if (strpos($action, 'add') !== false && $field === $primaryKey || in_array($field, array('modifier_id','creator_id','created', 'modified', 'updated'))) :
      				continue;
      		elseif ($field !== $primaryKey):?>
             		<div class="box-header with-border">
						<h3 class="box-title"><?=$field?></h3>
						<div class="box-tools"><?php
$m = strtolower($modelClass);
							echo "<?=h(\$${m}['$modelClass']['$field']);?>";?></div>
					</div><!-- /.box-header -->

            <?php
            endif;
            endforeach;
            ?>
					</div>
					
			</div>
			</div></section>