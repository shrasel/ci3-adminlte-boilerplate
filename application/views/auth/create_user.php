<section class="content-header">
  <h1> Users <small>( Manage users )</small></h1>
  <ol class="breadcrumb">
    <li><a href="<?=site_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="<?=site_url('auth')?>">Users</a></li>
    <li class="active">Create User</li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-sm-12">
      <!-- general form elements -->
      <div class="box box-primary">

        <div class="box-body">


          <h1><?php echo lang('create_user_heading'); ?></h1>
          <p><?php echo lang('create_user_subheading'); ?></p>

          <div id="infoMessage" class="error"><?php echo $message; ?></div>
          <div class="col-sm-6">


            <?php echo form_open("auth/create_user"); ?>

            <div class="form-group">
              <?php echo lang('create_user_fname_label', 'first_name'); ?> <br />
              <?php echo form_input($first_name, '', 'class="form-control"'); ?>
            </div>

            <div class="form-group">
              <?php echo lang('create_user_lname_label', 'last_name'); ?> <br />
              <?php echo form_input($last_name, '', 'class="form-control"'); ?>
            </div>

            <?php
            if ($identity_column !== 'email') {
                echo '<div class="form-group">';
                echo lang('create_user_identity_label', 'identity');
                echo '<br />';
                echo form_error('identity');
                echo form_input($identity, '', 'class="form-control"');
                echo '</div>';
            }
            ?>

            <div class="form-group">
              <?php echo lang('create_user_company_label', 'company'); ?> <br />
              <?php echo form_input($company, '', 'class="form-control"'); ?>
            </div>

            <div class="form-group">
              <?php echo lang('create_user_email_label', 'email'); ?> <br />
              <?php echo form_input($email, '', 'class="form-control"'); ?>
            </div>

            <div class="form-group">
              <?php echo lang('create_user_phone_label', 'phone'); ?> <br />
              <?php echo form_input($phone, '', 'class="form-control"'); ?>
            </div>

            <div class="form-group">
              <?php echo lang('create_user_password_label', 'password'); ?> <br />
              <?php echo form_input($password, '', 'class="form-control"'); ?>
            </div>

            <div class="form-group">
              <?php echo lang('create_user_password_confirm_label', 'password_confirm'); ?> <br />
              <?php echo form_input($password_confirm, '', 'class="form-control"'); ?>
            </div>
            <?php if ($this->ion_auth->is_super_admin()): ?>

            <h3>Departments <small>(User access)</small></h3>
            <div class="checkbox">
            <?php foreach ($groups as $group): ?>
            <label>
                <input type="checkbox" name="groups[]" value="<?php echo $group['id']; ?>">
                    <?php echo htmlspecialchars($group['description'], ENT_QUOTES, 'UTF-8'); ?>
                  </label><br>
                <?php endforeach?>
              </div>

            <?php endif?>

            <?php echo form_hidden($csrf); ?>

            <div class="form-group">
              <?php echo form_submit('submit', lang('create_user_submit_btn'), array('class' => 'btn btn-success')); ?>
            </div>

            <?php echo form_close(); ?>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>