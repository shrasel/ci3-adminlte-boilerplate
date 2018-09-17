<section class="content-header">
    <h1>
        Page
        <small>( Manage your page )</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=site_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?=site_url('admin/pages')?>">Pages</a></li>
        <li class="active">Update Page</li>
    </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-xs-8">
      <div class="box box-info">
        <div class="box-header with-border">
        <h3 class="box-title">Update Page</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <?php echo validation_errors(); ?>
       <form data-validate method="POST" name="add_employee" action="<?=site_url('admin/pages/update')?>" validate >
        <input type="hidden" name="id" value="<?=$page['id']?>">
        <div class="box-body">
            
            <div class="form-group">
              <label for="title">Page Title</label>
              <input type="text" class="form-control" id="title" name="title" value="<?php echo set_value('title',@$page['title']); ?>" placeholder="Enter Title">
            </div>

            <div class="form-group">
              <label for="content">Page content</label>
              <textarea class="form-control ckeditor" name="content"><?php echo set_value('content',@$page['content']); ?></textarea>
            </div>

            <div class="form-group">
              <label for="slug">Page slug</label>
              <input type="text" class="form-control" id="slug" name="slug" value="<?php echo set_value('slug',@$page['slug']); ?>" placeholder="Enter slug">
            </div>
            
            <div class="checkbox">
              <label for="status">Status</label>
              <select name="status" class="form-control">
                <option value="1" <?=$page['status']==1?'selected':''?>>Published</option>
                <option value="0" <?=$page['status']==0?'selected':''?>>Draft</option>
              </select>
            </div>
            
        </div>
        <div class="box-footer">
          <a href="<?=site_url('admin/products')?>" class="btn btn-default">Cancel</a>
          <button type="submit" class="btn btn-success pull-right">SAVE</button>
        </div>
        <!-- /.box-footer -->
        </form>
      </div>
    </div>
    <div class="col-xs-4">
      <div class="box box-info">
        <div class="box-header with-border">
        <h3 class="box-title">Help?</h3>
        </div>
        <div class="box-body">
        </div>
  </div>
</section>