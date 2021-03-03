  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('template')}}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>      
        <ul class="sidebar-menu" data-widget="tree" data-api="tree" data-accordion=1>
            <li class="header">MAIN NAVIGATION</li>
            <li class="{{ (request()->is('hardware/*')) ? 'active' : '' }}">
              <a href="/hardware/index">
                  <i class="glyphicon glyphicon-lock"></i> <span>Hardware</span>
              </a>
            </li>
            <li class="{{ (request()->is('software/*')) ? 'active' : '' }}">
              <a href="/software/index/">
                <i class="fa fa-cloud"></i> <span>Software</span>
              </a>                
            </li>
            <li class="{{ (request()->is('user/*')) ? 'active' : '' }}">
              <a href="/user/index/">
                <i class="glyphicon glyphicon-user"></i> <span>User</span>
              </a>
            </li>
            <li class="{{ Request::segment(1) === 'pemakai' ? 'active bg-navy' : null }}">
              <a href="/pemakai"><i class="fa fa-th-list"></i>
                <span>Pemakai</span>
              </a>
            </li>
            <li class="header">LABELS</li>
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
            
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>