<ul class="sidebar-menu">
    <li class="header">MAIN NAVIGATION</li>
    <li <?=$this->router->class=='home'?'class="active"':''?> >
        <a  href="<?=site_url()?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
    </li>
    <li class="treeview<?=$this->router->class=='customers'?' active':''?>">

        <a href="<?=site_url('customers')?>"><i class="fa fa-users"></i> <span>Customers</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>

        <ul class="treeview-menu">
            <li><a href="<?=site_url('customers/index')?>"><i class="fa fa-th-list"></i>Customer List</a></li>
            <li><a href="<?=site_url('customers/create')?>"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Create Customer</a></li>
            <li><a href="<?=site_url('customers/queries')?>"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>Customer Queries</a></li>
        </ul>
    </li>
    <li class="treeview<?=$this->router->class=='orders'?' active':''?>">

        <a href="<?=site_url('orders')?>"><i class="fa fa-book"></i> <span>Orders</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>

        <ul class="treeview-menu">
            <li <?=$this->router->class=='orders' && $this->router->method=='index'?'class="active"':''?>><a href="<?=site_url('orders/index')?>"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>Order List</a></li>
            <li <?=$this->router->class=='orders' && $this->router->method=='create'?'class="active"':''?>><a href="<?=site_url('orders/create')?>"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Create Order</a></li>
        </ul>
    </li>

    <li class="treeview<?=$this->router->class=='report'?' active':''?>">

        <a href="<?=site_url('report')?>"><i class="fa fa-book"></i> <span>Report</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>

        <ul class="treeview-menu">
            <li <?=$this->router->class=='report' && $this->router->method=='index'?'class="active"':''?>><a href="<?=site_url('report/index')?>"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>Overview</a></li>
            <li <?=$this->router->class=='report' && $this->router->method=='bill_by_courier'?'class="active"':''?>><a href="<?=site_url('report/bill_by_courier')?>"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>Bill by Courier</a></li>
            <li <?=$this->router->class=='report' && $this->router->method=='monthly_sale'?'class="active"':''?>><a href="<?=site_url('report/monthly_sale')?>"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Monthly Sale</a></li>
            <li <?=$this->router->class=='report' && $this->router->method=='sales_by_product_code'?'class="active"':''?>><a href="<?=site_url('report/sales_by_product_code')?>"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>  Product sale</a></li>
            <li <?=$this->router->class=='report' && $this->router->method=='my_attendance'?'class="active"':''?>><a href="<?=site_url('report/my_attendance')?>"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>My Attendance</a></li>
            <?php if ( $this->ion_auth->is_super_admin()):?>
                <li <?=$this->router->class=='report' && $this->router->method=='attendance'?'class="active"':''?>><a href="<?=site_url('report/attendance')?>"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Attendance</a></li>
            <?php endif ?>
        </ul>
    </li>

    <?php if ($this->ion_auth->is_admin() || $this->ion_auth->is_super_admin()):?>
    
    <li class="treeview<?=in_array($this->router->class,array('purchases','payments','expenses'))?' active':''?>" >
        <a href="#">
            <i class="fa fa-area-chart"></i> <span>Transactions</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li <?=$this->router->class=='expenses'?'class="active"':''?>><a href="<?=site_url('expenses')?>"><span class="glyphicon glyphicon-usd" aria-hidden="true"></span> <span>Expenses</span></a></li>
            <li <?=$this->router->class=='payments'?'class="active"':''?>><a href="<?=site_url('payments')?>"><i class="fa fa-area-chart"></i>Payments</a></li>
            <li><a href="<?=site_url('purchases')?>"><i class="fa fa-circle-o"></i>Purchase</a></li>
            <li><a href="<?=site_url('transactions/bank')?>"><i class="fa fa-bank"></i> Bank</a></li>
        </ul>
    </li>

    <li class="treeview <?=in_array($this->router->class, array('settings','auth'))?' active':''?>">
        <a href="#">
            <i class="fa fa-laptop"></i> <span>Administration</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li <?=$this->router->class=='auth' && $this->router->method=='index'?'class="active"':''?>><a href="<?=site_url('auth/index')?>"><i class="fa fa-circle-o"></i>Manage Users</a></li>
            <li <?=$this->router->class=='settings' && $this->router->method=='index'?'class="active"':''?>><a href="<?=site_url('settings')?>"><i class="fa fa-circle-o"></i>Site Settings</a></li>
        </ul>
    </li>

    <?php endif; ?>
    
</ul>