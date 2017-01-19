<div class="roles view">
<h2><?php echo __('Role'); ?></h2>
	<dl>
		<dt><p><?php echo __('Id'); ?></p></dt>
		<dd><p>
			<?php echo h($role['Role']['id']); ?>
			&nbsp;
		</p></dd>
		<dt><p><?php echo __('Name'); ?></p></dt>
		<dd><p>
			<?php echo h($role['Role']['name']); ?>
			&nbsp;
		</p></dd>
		<dt><p><?php echo __('Home'); ?></p></dt>
		<dd><p>
			<?php echo h($role['Role']['home']); ?>
			&nbsp;
		</p></dd>
	</dl>
</div>

