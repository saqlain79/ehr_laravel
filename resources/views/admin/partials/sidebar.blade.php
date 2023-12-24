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
              <p><a href="{{route('userpage', auth()->user()->id)}}">Edit</a></p>
            @endauth
            @endif
          </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        @if(Auth::user()->role == 'admin')
        <ul class="list-unstyled">
                <li class=""><a href="{{route('home')}}"><i class="bi bi-house-add-fill"></i>Home </a></li>
                <li><a href="{{route('patient')}}"><i class="bi bi-heart-pulse-fill"></i>Patient</a></li>
                <li><a href="{{route('allergy')}}"><i class="bi bi-lungs-fill"></i>Allergy</a></li>
                <li><a href="{{route('clinic')}}"><i class="fa fa-hospital-o" aria-hidden="true"></i>Clinic</a></li>
                <li><a href="{{route('doctor')}}"><i class="fa fa-user-md" aria-hidden="true"></i>Doctor</a></li>
                <li><a href="{{route('vaccine')}}"><i class="bi bi-bandaid-fill"></i>Vaccine</a></li>
                <li><a href="{{route('medical_report')}}"><i class="bi bi-file-medical-fill"></i>Medical Report</a></li>
                <li><a href="{{route('medicine')}}"><i class="bi bi-capsule"></i>Medicine</a></li>
                <li><a href="{{route('patient_allergy')}}"><i class="fa fa-plus-square" aria-hidden="true"></i>Patient Allergy</a></li>
                <li><a href="{{route('patient_vaccine_clinic')}}"><i class="fa fa-medkit" aria-hidden="true"></i>Patient Vaccine Clinic</a></li>
                <li><a href="{{route('prescription')}}"><i class="bi bi-prescription"></i>Prescription</a></li>
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
        @elseif(Auth::user()->role == 'doctor')

        <ul class="list-unstyled">
                <li><a href="{{route('home')}}"><i class="bi bi-house-add-fill"></i>Home</a></li>
                <li><a href="{{route('patient')}}"><i class="bi bi-heart-pulse-fill"></i>Patient</a></li>
                <li><a href="{{route('allergy')}}"><i class="bi bi-lungs-fill"></i>Allergy</a></li>
                <li><a href="{{route('clinic')}}"><i class="fa fa-hospital-o" aria-hidden="true"></i>Clinic</a></li>
                <li><a href="{{route('doctor')}}"><i class="fa fa-user-md" aria-hidden="true"></i>Doctor</a></li>
                <li><a href="{{route('vaccine')}}"><i class="bi bi-bandaid-fill"></i>Vaccine</a></li>
                <li><a href="{{route('medical_report')}}"><i class="bi bi-file-medical-fill"></i>Medical Report</a></li>
                <li><a href="{{route('medicine')}}"><i class="bi bi-capsule"></i>Medicine</a></li>
                <li><a href="{{route('patient_allergy')}}"><i class="fa fa-plus-square" aria-hidden="true"></i>Patient Allergy</a></li>
                <li><a href="{{route('patient_vaccine_clinic')}}"><i class="fa fa-medkit" aria-hidden="true"></i>Patient Vaccine Clinic</a></li>
                <li><a href="{{route('prescription')}}"><i class="bi bi-prescription"></i>Prescription</a></li>
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
        
        @elseif(Auth::user()->role == 'patient')
        
        <ul class="list-unstyled">
                <li><a href="{{route('home')}}"><i class="bi bi-house-add-fill"></i>Home </a></li>
                <li><a href="{{route('allergy')}}"><i class="bi bi-lungs-fill"></i>Allergy</a></li>
                <li><a href="{{route('clinic')}}"><i class="fa fa-hospital-o" aria-hidden="true"></i>Clinic</a></li>
                <li><a href="{{route('doctor')}}"><i class="fa fa-user-md" aria-hidden="true"></i>Doctor</a></li>
                <li><a href="{{route('vaccine')}}"><i class="bi bi-bandaid-fill"></i>Vaccine</a></li>
                <li><a href="{{route('medical_report')}}"><i class="bi bi-file-medical-fill"></i>Medical Report</a></li>
                <li><a href="{{route('medicine')}}"><i class="bi bi-capsule"></i>Medicine</a></li>
                <li><a href="{{route('patient_allergy')}}"><i class="fa fa-plus-square" aria-hidden="true"></i>Patient Allergy</a></li>
                <li><a href="{{route('patient_vaccine_clinic')}}"><i class="fa fa-medkit" aria-hidden="true"></i>Patient Vaccine Clinic</a></li>
                <li><a href="{{route('prescription')}}"><i class="bi bi-prescription"></i>Prescription</a></li>
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
        @endif
        
        <!-- <span class="heading">Extras</span>
        <ul class="list-unstyled">
          <li> <a href="#"> <i class="icon-settings"></i>Demo </a></li>
          <li> <a href="#"> <i class="icon-writing-whiteboard"></i>Demo </a></li>
          <li> <a href="#"> <i class="icon-chart"></i>Demo </a></li>
        </ul> -->
</nav>