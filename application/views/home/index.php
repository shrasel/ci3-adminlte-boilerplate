<section class="content-header">
  <h1>
    Dashboard
    <small>( everything at a glance ) | Time: <?=date('d M, Y H:i:s')?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3>20</h3>

          <p>New Orders</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="<?=site_url('orders/index')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3>40</h3>

          <p>Delivered Order</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="<?=site_url('orders/index/?q=Delivered')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3>45</h3>

          <p>New Register Member</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="<?=site_url('customers/index')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3>1</h3>

          <p>Return Order</p>
          
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="<?=site_url('orders/index/?q=Return')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>
  <!-- /.row -->
  <!-- Main row -->
  <div class="row">
    <!-- Left col -->
    <section class="col-lg-6">
      <!-- Custom tabs (Charts with tabs)-->
      <div class="nav-tabs-custom">
        <canvas id="myChart" width="100%" height="60px"></canvas>
      </div>
      <!-- /.nav-tabs-custom -->
    </section>

    <section class="col-lg-6">
      <!-- Custom tabs (Charts with tabs)-->
      <div class="nav-tabs-custom">
        <canvas id="myCustomerChart" width="100%" height="60px"></canvas>
      </div>
      <!-- /.nav-tabs-custom -->

    </section>

    <!-- right col -->
  </div>
  <!-- /.row (main row) -->

</section>
<!-- /.content -->
<script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
<script>

  var order_chart_data = {"labels":["1 Sep","2 Sep","3 Sep","4 Sep","5 Sep","6 Sep","7 Sep","8 Sep","9 Sep"],"datasets":[{"label":"Number of Orders","data":["6","8","13","8","4","8","9","8",0],"backgroundColor":"rgba(178, 224, 232, 0.5)","borderColor":"rgba(47, 169, 214, 0.6)"},{"label":"Return Orders","data":[0,0,0,0,"1",0,0,0,0],"backgroundColor":"rgba(237, 162, 154, 0.5)","borderColor":"rgba(221, 75, 57,0.6)"}]};
  var customer_chart_data = {"labels":["1 Sep","2 Sep","3 Sep","4 Sep","5 Sep","6 Sep","7 Sep","8 Sep"],"datasets":[{"label":"Number of Customer","data":["5","8","16","9","5","9","9","8"],"backgroundColor":"rgba(243, 156, 18, 1)","borderColor":"rgba(243, 156, 18, 0.9)"}]};


  var ctx = document.getElementById("myChart");
  var myChart = new Chart(ctx, {
    type: 'line',
    data: order_chart_data,
    options: {
      responsive: true,
      title:{
        display:true,
        text:'Daily Orders'
      },
      tooltips: {
        mode: 'index',
        intersect: true,
      },
      hover: {
        mode: 'nearest',
        intersect: true
      },
      scales: {
        xAxes: [{
          display: true,
          scaleLabel: {
            display: true,
            labelString: 'Days'
          }
        }],
        yAxes: [{
          display: true,
          scaleLabel: {
            display: true,
            labelString: 'Order #'
          }
        }]
      }
    }
  });


  var ctx = document.getElementById("myCustomerChart");
  var myCustomerChart = new Chart(ctx, {
    type: 'bar',
    data: customer_chart_data,
    options: {
      responsive: true,
      title:{
        display:true,
        text:'Daily Customer'
      },
      tooltips: {
        mode: 'index',
        intersect: true,
      },
      hover: {
        mode: 'nearest',
        intersect: true
      },
      scales: {
        xAxes: [{
          display: true,
          scaleLabel: {
            display: true,
            labelString: 'Days'
          }
        }],
        yAxes: [{
          display: true,
          scaleLabel: {
            display: true,
            labelString: 'Customer #'
          }
        }]
      }
    }
  });
  
</script>