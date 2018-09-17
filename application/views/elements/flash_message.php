<?php if($this->session->flashdata('_success')):?>
<div class="alert alert-success alert-dismissible fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><?=$this->session->flashdata('_success')?></div>
<?php endif?>
<?php if($this->session->flashdata('_error')):?>
<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><?=$this->session->flashdata('_error')?></div>
<?php endif?>
<?php if($this->session->flashdata('_info')):?>
<div class="alert alert-info alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><?=$this->session->flashdata('_info')?></div>
<?php endif?>
<?php if($this->session->flashdata('_warning')):?>
<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><?=$this->session->flashdata('_warning')?></div>
<?php endif?>