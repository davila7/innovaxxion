<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset("img/user-default.png") }}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">Panel de Control</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="@yield('active_home')"><a href="{!! url('home') !!}"><span>Home</span></a></li>
            <li class="@yield('active_general') treeview">
                <a href="#">
                   <span>Generales</span>
                   <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                 <li class="@yield('active_profile')"><a href="{!! url('perfiles') !!}"><i class="fa fa-circle-o"></i><span>Perfiles</span></a></li>
                 <li class="@yield('active_travels')"><a href="{!! url('travels') !!}"><i class="fa fa-circle-o"></i><span>Viajes</span></a></li>
                 <li class="@yield('active_overall_cost')"><a href="{!! url('overall_cost') !!}"><i class="fa fa-circle-o"></i><span>Gastos Generales</span></a></li>
                 <li class="@yield('active_etapas')"><a href="{!! url('etapas') !!}"><i class="fa fa-circle-o"></i><span>Etapas</span></a></li>
                </ul>
            </li>
            <li class="@yield('active_proyect')"><a href="{!! url('evaluations') !!}"><span>Evaluaciones</span></a></li>
            <li class="@yield('active_evaluations')"><a href="{!! url('home') !!}"><span>Proyectos</span></a></li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>