<section class="content-header">
	<h1> Groups <small>( Manage user group )</small></h1>
	<ol class="breadcrumb">
		<li><a href="<?=site_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="<?=site_url('auth')?>">Group</a></li>
		<li class="active">Edit Group</li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<!-- left column -->
		<div class="col-sm-12">
			<!-- general form elements -->
			<div class="box box-primary">

				<div class="box-body">

					<h1><?php echo lang('edit_group_heading');?></h1>
					<p><?php echo lang('edit_group_subheading');?></p>

					<div id="infoMessage"><?php echo $message;?></div>
					<div class="col-sm-6">
						<?php echo form_open(current_url());?>

						<p>
							<?php echo lang('edit_group_name_label', 'group_name');?> <br />
							<?php echo form_input($group_name,'','class="form-control"');?>
						</p>

						<p>
							<?php echo lang('edit_group_desc_label', 'description');?> <br />
							<?php echo form_input($group_description,'','class="form-control"');?>
						</p>

						<p><?php echo form_submit('submit', lang('edit_group_submit_btn'), array('class' => 'btn btn-success'));?></p>

						<?php echo form_close();?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>