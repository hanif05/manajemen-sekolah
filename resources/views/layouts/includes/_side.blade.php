<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="user-pro"> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><img src="{{ asset('assets') }}/images/users/1.jpg" alt="user-img" class="img-circle"><span class="hide-menu">Mark Jeckson</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('logout') }}"><i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                </li>
                <li class="nav-small-cap">--- PERSONAL</li>
                <li> <a class="waves-effect waves-dark" href="{{ route('home.index') }}" aria-expanded="false"><i class="fas fa-home"></i><span class="hide-menu">Home</span></a>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-database"></i><span class="hide-menu">Master</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="#">Guru</a></li>
                        <li><a href="#">Siswa</a></li>
                        <li><a href="{{ route('kelas.index') }}">Kelas</a></li>
                    </ul>
                </li>
                <li> 
                    
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>