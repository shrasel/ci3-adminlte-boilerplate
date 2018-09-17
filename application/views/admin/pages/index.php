<section class="content-header">
  <h1>
    Pages
    <small>( Take a look at all of your pages )</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?=site_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">pages</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">pages</h3>

          <div class="box-tools">
            <a href="<?=site_url('admin/pages/create')?>" class="btn btn-success btn-sm">+ Create New Page</a>
          </div>
        </div>
        
        <div class="box-body table-responsive">

        <div class="col-xs-12 no-padding" style="margin:10px 0">            
            <div class="box-tools">
             <form action="<?=site_url('admin/pages/index')?>">
              <div class="input-group input-group-sm">
                <input type="text" name="q" class="form-control pull-right" value="<?=@$_GET['q']?>" placeholder="Search">
                <div class="input-group-btn">
                  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>
              </div>
            </form>
          </div>
        </div>

        <table class="table table-striped">
          <thead class="bg-sky">
          <tr>
            <th>ID</th>
            <th width="20%">Title</th> 
            <th width="40%">Content</th>
            <th class="text-right">Link</th>
            <th class="text-center">Status</th>
            <th class="text-center">Action</th>
          </tr>
          </thead>
          <tbody>
          <?php if(!$pages):?>
            <tr>
              <td colspan="7" class="text-center">You have not added any page yet. Please <a class="btn btn-default" href="<?=site_url('pages/create')?>">Create New Page</a>
              </td>
            </tr>
          <?php endif; ?>
          <?php foreach($pages as $key=>$page):?>
            <tr>
              <td><?=$page['id']?></td>
              <td>
                <a href="<?=site_url('admin/pages/view/'.$page['id'])?>" >
                  <?=$page['title']?>
                </a>
              </td>
              <td><?=word_limiter($page['content'],40)?></td>
              <td class="text-right"><?=$page['slug']?></td>
              <td class="text-center"><?=$page['status']==1?'<span class="label label-success">Published</span>':'<span class="label label-danger">Draft</span>'?></td>
              <td class="text-center">
                <a href="<?=site_url('admin/pages/edit/'.$page['id'])?>" class="btn btn-success btn-xs">Edit</a>
              <?php if ($this->ion_auth->is_super_admin()):?>
                <a href="<?=site_url('admin/pages/delete/'.$page['id'])?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger btn-xs">X</a>
              <?php endif;?>
              </td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
      </div> 
      <div class="box-footer">

        <?=$page_links?>

      </div>
    </div>
  </div>
</div>

</section>