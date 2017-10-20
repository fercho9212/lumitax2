@if (! Auth::guest())
    <div class="user-panel">
        <div class="pull-left image">
            <img src="{{asset('/img/homme128.png')}}" class="img-circle" alt="User Image" />
        </div>
        <div class="pull-left info">
            <p>{{ Auth::user()->name }}</p>
            <p> @if (Auth::user()->typesrole_id==1)
                    {{"SuperAdmin"}}
                 @elseif (Auth::user()->typesrole_id==2)
                    {{"Administrador"}}
                @elseif (Auth::user()->typesrole_id==2)
                    {{"Visitante"}}
                 @endif
                </p>
            <!-- Status -->
            <a href="#"><i class="fa fa-circle text-success"></i>Panel</a>
        </div>
    </div>
@endif

<!-- search form (Optional) -->
{{-- <form action="#" method="get" class="sidebar-form">
    <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
      <span class="input-group-btn">
        <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
      </span>
    </div>
</form>--}}
<!-- /.search form -->

<!-- Sidebar Menu -->
<ul class="sidebar-menu">
    <li class="header"><center>ADMINISTRACIÓN</center></li>
    <!-- Optionally, you can add icons to the links -->


    <li class="treeview">

        <a href="#"><i class='fa fa-users'></i> <span>Conductores</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
            @if (Auth::user()->typesrole_id==1 || Auth::user()->typesrole_id==2) <li class="active">
              <a href="javascript:void(0);" onclick="load_frm(1);"><i class='fa fa-plus-square'></i>Crear</a></li> @endif
            <li ><a href="javascript:void(0);" onclick="load_frm(2);"><i class='fa fa-eye'></i>Ver</a></li>
            <li ><a href="javascript:void(0);" onclick="load_frm(3);"><i class='fa fa-eye'></i>Msg</a></li>
        </ul>


    </li>
    <li><a href="javascript:void(0);" onclick="load_frm(10);"><i class='glyphicon glyphicon-user'></i> <span>Usuarios</span></a></li>
    <li class="treeview">
        <a href="#"><i class='fa fa fa-car'></i> <span>Vehículos</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          @if (Auth::user()->typesrole_id==1 || Auth::user()->typesrole_id==2)   <li><a href="javascript:void(0);"  onclick="load_frm(32);">Crear</a></li>@endif
            <li><a href="javascript:void(0);"  onclick="load_frm(30);"><i class='fa fa-taxi'></i>Vehículos Taxi</a></li>
            <li><a href="javascript:void(0);"  onclick="load_frm(31);"><i class='fa fa-taxi'></i>Vehículos Lujo</a></li>
            <li><a href="javascript:void(0);"  onclick="load_frm(33);"><i class='fa fa-taxi'></i>Vehículos Premium</a></li>
        </ul>
    </li>
    <li><a href="javascript:void(0);" onclick="load_frm(70);"><i class='glyphicon glyphicon-credit-card'></i> <span>Tarjeta Operación</span></a></li>
    {{--<li><a href="javascript:void(0);" onclick="load_frm(20);"><i class='fa fa-link'></i> <span>Asignación</span></a></li> --}}
    <li><a href="javascript:void(0);" onclick="load_frm(40);"><i class='glyphicon glyphicon-file'></i> <span>Seguros</span></a></li>
    <li><a href="javascript:void(0);" onclick="load_frm(50);"><i class='glyphicon glyphicon-th'></i> <span>Historial Servicios</span></a></li>
    <li><a href="javascript:void(0);" onclick="load_frm(90);"><i class='glyphicon glyphicon-list-alt'></i> <span>Solicitudes</span></a></li>
    {{--<li><a href="javascript:void(0);" onclick="load_frm(100);"><i class='fa fa-link'></i> <span>Reportes</span></a></li>--}}
    <li><a href="javascript:void(0);" onclick="load_frm(80);"><i class='fa fa-link'></i> <span>Publicidad</span></a></li>
    @if (Auth::user()->typesrole_id==1)
            <li><a href="javascript:void(0);" onclick="load_frm(60);"><i class='fa fa-user-secret'></i> <span>Administradores</span></a></li>
   @endif



</ul><!-- /.sidebar-menu -->
