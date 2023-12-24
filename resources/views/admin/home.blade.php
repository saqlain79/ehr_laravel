@extends('admin.partials.template')

@section('content')

   <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Dashboard</h2>
          </div>
        </div>
        <section class="no-padding-top no-padding-bottom">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"><i class="icon-user-1"></i></div><strong>Number Of Patients</strong>
                    </div>
                  <!-- counting the number of patients -->
                  <?php
                    $patientnumber = DB::table('patients')->count();
                    $value = ($patientnumber/100) * 100;
                  ?>
                    <div class="number dashtext-1">{{$patientnumber}}</div>
                  </div>
                  <div class="progress progress-template">
                    <div role="progressbar" style="width: {{$value}}%" aria-valuenow="{{$value}}" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-1"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"><i class="icon-contract"></i></div><strong>Number of Doctors</strong>
                    </div>
                    <?php
                      $doctornumber = DB::table('doctors')->count();
                      $docnum = ($doctornumber/100) * 100;
                    ?>
                    <div class="number dashtext-2">{{$doctornumber}}</div>
                  </div>
                  <div class="progress progress-template">
                    <div role="progressbar" style="width: {{$docnum}}%" aria-valuenow="{{$docnum}}" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-2"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"><i class="icon-paper-and-pencil"></i></div><strong>Number of Clinics</strong>
                    </div>
                    <?php
                      $clinicnumber = DB::table('clinics')->count();
                      $num = ($clinicnumber/100) * 100;
                    ?>
                    <div class="number dashtext-3">{{$clinicnumber}}</div>
                  </div>
                  <div class="progress progress-template">
                    <div role="progressbar" style="width: {{$num}}%" aria-valuenow="{{$num}}" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-3"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"><i class="icon-paper-and-pencil"></i></div><strong>Number of Medical Reports</strong>
                    </div>
                    <?php
                      $medicalreportamount = DB::table('medical_reports')->count();
                      $medrepnum = ($medicalreportamount/100) * 100;
                    ?>
                    <div class="number dashtext-3">{{$medicalreportamount}}</div>
                  </div>
                  <div class="progress progress-template">
                    <div role="progressbar" style="width: {{$medrepnum}}%" aria-valuenow="{{$medrepnum}}" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-3"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"><i class="icon-writing-whiteboard"></i></div><strong>Different types of Vaccine</strong>
                    </div>
                    <?php
                      $vaccinenumber = DB::table('vaccines')->count();
                      $vaccnum = ($vaccinenumber/100) * 100;
                    ?>
                    <div class="number dashtext-4">{{$vaccinenumber}}</div>
                  </div>
                  <div class="progress progress-template">
                    <div role="progressbar" style="width: {{$vaccnum}}%" aria-valuenow="{{$vaccnum}}" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-4"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"><i class="icon-writing-whiteboard"></i></div><strong>Different types of Allergy found</strong>
                    </div>
                    <?php
                      $allergynum = DB::table('allergies')->count();
                      $allnum = ($allergynum/100) * 100;
                    ?>
                    <div class="number dashtext-4">{{$allergynum}}</div>
                  </div>
                  <div class="progress progress-template">
                    <div role="progressbar" style="width: {{$allnum}}%" aria-valuenow="{{$allnum}}" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-4"></div>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </section>

        <!-- <section>
          <div class="col-lg-6">
          <div class="pie-chart chart block">
          <div class="title"><strong>Pie Chart Example</strong></div>
          <div class="pie-chart chart margin-bottom-sm">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">
                <canvas id="pieChart"></canvas>
              </div>
            </div>
          </div>
          </div>
          </div>
          </div>
        </section> -->
        <section>
        <div class="col-lg-3">
                <div class="pie-chart chart block">
                  <div class="title"><strong>Patient Gender</strong></div>
                  <div class="pie-chart chart margin-bottom-sm">
                    <canvas id="piePatientGender"></canvas>
                  </div>
                </div>
              </div>
        </section>

      </div>
      <?php
        $patientmale = DB::table('patients')->where('gender', 'male')->count();
        $patientfemale = DB::table('patients')->where('gender','female')->count();
      ?>
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <script>
        var ctx = document.getElementById('piePatientGender').getContext('2d');
        var piePatientGender = new Chart(ctx, {
          type: 'pie',
          data: {
            labels: ['Male', 'Female'],
            datasets: [{
                data: [<?php echo $patientmale; ?>, <?php echo $patientfemale; ?>],
              backgroundColor: ['#36a2eb', '#ff6384']
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false
          }
        });
      </script>
        
        

@endsection



    

   