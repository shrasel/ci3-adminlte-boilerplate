<section class="content-header">
	<h1>
	Users
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?=site_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Users</li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<!-- left column -->
		<div class="col-sm-12">
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title"><?php echo lang('index_heading');?> </h3> ( <span><?php echo lang('index_subheading');?></span> )

					<p><?php echo anchor('auth/create_user', lang('index_create_user_link'),array('class'=>'btn btn-default btn-xs'))?> | <?php echo anchor('auth/create_group', lang('index_create_group_link'),array('class'=>'btn btn-default btn-xs'))?></p>
				</div>

				<div class="box-body table-responsive">
			
				

				<div id="infoMessage"><?php echo $message;?></div>

				<table class="table table-striped">
				<thead class="bg-sky">
					<tr>
						<th><?php echo lang('index_fname_th');?></th>
						<th><?php echo lang('index_lname_th');?></th>
						<th><?php echo lang('index_email_th');?></th>
						<th><?php echo lang('index_groups_th');?></th>
						<th><?php echo lang('index_status_th');?></th>
						<th class="text-center"><?php echo lang('index_action_th');?></th>
					</tr>

					</thead>
					<tbody>
					<?php foreach ($users as $user):?>
						<tr>
							<td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
							<td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
							<td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
							<td>
								<?php foreach ($user->groups as $group):?>
									<span class="label label-default"><?php echo anchor("auth/edit_group/".$group->id, htmlspecialchars($group->description,ENT_QUOTES,'UTF-8')) ;?></span>
								<?php endforeach?>
							</td>
							<td><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, lang('index_active_link'),array('class'=>'btn btn-success btn-xs')) : anchor("auth/activate/". $user->id, lang('index_inactive_link'),array('class'=>'btn btn-danger btn-xs'));?></td>
							<td class="text-center"><?php echo anchor("auth/edit_user/".$user->id, 'Edit',array('class'=>'btn btn-info btn-xs')) ;?></td>
						</tr>
					<?php endforeach;?>
					</tbody>
				</table>

				</div>
			</div>
		</div>
	</div>

</section>