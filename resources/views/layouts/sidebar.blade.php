<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="">
                    <a href="{{ route('index') }}"><i class="la la-dashboard"></i> <span> Dashboard</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><i class="la la-object-ungroup"></i> <span> Products</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('products.index') }}">Products</a></li>
                        @role('superAdmin|inventoryAdmin')
                        <li><a href="javascript:void(0)" data-toggle="modal" data-target="#add">Add Products</a></li>
                        @endrole
                    </ul>
                </li>
                @role('superAdmin|storeAdmin|inventoryAdmin')
                <li class="submenu">
                    <a href="#"><i class="la la-object-ungroup"></i> <span> Sales</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('sales.index') }}">Sales</a></li>
                        @role('superAdmin|storeAdmin')
                        <li><a href="{{ route('sales.create') }}">Add Sale</a></li>
                        @endrole
                    </ul>
                </li>
                @endrole
                <li class="submenu">
                    <a href="#"><i class="la la-rocket"></i> <span> Reorders</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('reorders.index') }}">Reorders</a></li>
                    </ul>
                </li>
                @role('superAdmin')
                <li class="submenu">
                    <a href="#"><i class="la la-pie-chart"></i> <span> Reports</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('sales-report.index') }}">Sales Reports</a></li>
                        <li><a href="{{ route('reorders-report.index') }}">Reorders Reports</a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><i class="la la-users"></i> <span> Users</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('users.index') }}">All Users</a></li>
                        <li><a href="javascript:void(0)" data-toggle="modal" data-target="#add">Add User</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="la la-key"></i> <span> Roles</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('roles.index') }}">Roles</a></li>
                        <li><a href="{{ route('permissions.index') }}">Permissions</a></li>
                    </ul>
                </li>
                @endrole
                <li class="submenu">
                    <a href="#"><i class="la la-user"></i> <span> Profile </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('profile.index') }}"> View Profile </a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('docs.index') }}"><i class="la la-file-text"></i> <span>Documentation</span></a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->
