@if (! Auth::guest())
    <div class="user-panel">
        <div class="pull-left image">
            <img src="{{asset('/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image" />
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

        <a href="#"><i class='fa fa-link'></i> <span>Conductores</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
            @if (Auth::user()->typesrole_id==1 || Auth::user()->typesrole_id==2) <li class="active"><a href="javascript:void(0);" onclick="load_frm(1);">Crear</a></li> @endif
            <li ><a href="javascript:void(0);" onclick="load_frm(2);">Ver</a></li>
        </ul>


    </li>
    <li><a href="javascript:void(0);" onclick="load_frm(10);"><i class='fa fa-link'></i> <span>Usuarios</span></a></li>
    <li><a href="javascript:void(0);" onclick="load_frm(20);"><i class='fa fa-link'></i> <span>Asignación</span></a></li>
    <li class="treeview">
        <a href="#"><i class='fa fa-link'></i> <span>Vehículos</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          @if (Auth::user()->typesrole_id==1 || Auth::user()->typesrole_id==2)   <li><a href="javascript:void(0);"  onclick="load_frm(32);">Crear</a></li>@endif
            <li><a href="javascript:void(0);"  onclick="load_frm(30);">Vehículos Taxi</a></li>
            <li><a href="javascript:void(0);"  onclick="load_frm(31);">Vehículos Lujo</a></li>
            <li><a href="javascript:void(0);"  onclick="load_frm(33);">Vehículos Premium</a></li>
        </ul>
    </li>
    <li><a href="javascript:void(0);" onclick="load_frm(70);"><i class='fa fa-link'></i> <span>Tarjeta Operación</span></a></li>
    <li><a href="javascript:void(0);" onclick="load_frm(20);"><i class='fa fa-link'></i> <span>Asignación</span></a></li>
    <li><a href="javascript:void(0);" onclick="load_frm(40);"><i class='fa fa-link'></i> <span>Seguros</span></a></li>
    <li><a href="javascript:void(0);" onclick="load_frm(50);"><i class='fa fa-link'></i> <span>Historial</span></a></li>
    @if (Auth::user()->typesrole_id==1)
            <li><a href="javascript:void(0);" onclick="load_frm(60);"><i class='fa fa-link'></i> <span>Administradores</span></a></li>
   @endif



</ul><!-- /.sidebar-menu -->
