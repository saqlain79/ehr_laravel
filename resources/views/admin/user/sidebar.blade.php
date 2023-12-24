<nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          @if(Auth::user()->role == 'admin')
          <div class="avatar"><img src="{{asset('asset/img/admin.png')}}" alt="" class="img-fluid rounded-circle"></div>
          @elseif(Auth::user()->role == 'doctor')
          <div class="avatar"><img src="{{asset('asset/img/doctor.jpg')}}" alt="" class="img-fluid rounded-circle"></div>
          @elseif(Auth::user()->role == 'patient')
          <div class="avatar"><img src="{{asset('asset/img/patient.jpg')}}" alt="" class="img-fluid rounded-circle"></div>
          @endif
          <div class="title">
            @if(Auth::check())
            @auth
              <h1 class="h5">{{Auth::user()->name}}</h1>
              <p>{{Auth::user()->role}}</p>
              <p>{{Auth::user()->email}}</p>
            @endauth
            @endif
          </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
                <li class=""><a href="{{route('home')}}"><i class="bi bi-house-add-fill"></i>Home </a></li>
                
                <!-- <li><a href="tables.html"> <i class="icon-grid"></i>Tables </a></li>
                <li><a href="charts.html"> <i class="fa fa-bar-chart"></i>Charts </a></li>
                <li><a href="forms.html"> <i class="icon-padnote"></i>Forms </a></li>
                <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Example dropdown </a>
                  <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                    <li><a href="#">Page</a></li>
                    <li><a href="#">Page</a></li>
                    <li><a href="#">Page</a></li>
                  </ul>
                </li>
                <li><a href="login.html"> <i class="icon-logout"></i>Login page </a></li> -->
        </ul>
        <!-- <span class="heading">Extras</span>
        <ul class="list-unstyled">
          <li> <a href="#"> <i class="icon-settings"></i>Demo </a></li>
          <li> <a href="#"> <i class="icon-writing-whiteboard"></i>Demo </a></li>
          <li> <a href="#"> <i class="icon-chart"></i>Demo </a></li>
        </ul> -->
</nav>