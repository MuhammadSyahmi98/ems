<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link" href="{{url('/')}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Interface</div>
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Departments
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            @if(isset(auth()->user()->role->permission['name']['department']['can-add']))
                            <a class="nav-link" href="{{route('departments-create')}}">Create </a>
                            @endif
                            @if(isset(auth()->user()->role->permission['name']['department']['can-list']))
                            <a class="nav-link" href="{{route('departments-index')}}"> View</a>@endif
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="fas fa-user fa-fw"></i></div>
                        User
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth"> Role
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav"> @if(isset(auth()->user()->role->permission['name']['role']['can-add']))
                                    <a class="nav-link" href="{{route('roles-create')}}">Create Role</a>
                                    @endif
                                    @if(isset(auth()->user()->role->permission['name']['role']['can-list']))
                                    <a class="nav-link" href="{{route('roles-index')}}">View Role</a>
                                    @endif
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="{{route('roles-index')}}" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">User
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    @if(isset(auth()->user()->role->permission['name']['user']['can-list']))
                                    <a class="nav-link" href="{{route('users-index')}}">View User</a>

                                    @endif
                                    @if(isset(auth()->user()->role->permission['name']['user']['can-add']))
                                    <a class="nav-link" href="{{route('users-create')}}">Create User</a>
                                    @endif
                                </nav>

                            </div>

                            <a class="nav-link collapsed" href="{{route('roles-index')}}" data-toggle="collapse" data-target="#pagesCollapsePermission" aria-expanded="false" aria-controls="pagesCollapsePermission">Permission
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapsePermission" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    @if(isset(auth()->user()->role->permission['name']['permission']['can-list']))
                                    <a class="nav-link" href="{{route('permissions-index')}}">View
                                        permission</a>
                                    @endif
                                    @if(isset(auth()->user()->role->permission['name']['permission']['can-add']))
                                    <a class="nav-link" href="{{route('permissions-create')}}">Create
                                        permission</a>
                                    @endif
                                </nav>

                            </div>

                        </nav>
                    </div>

                   


                </div>

            </div>

        </nav>
    </div>