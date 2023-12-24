@extends('admin.partials.template')

@section('content')
<style>
    .cardheight{
        min-height: 350px;
    }
</style>


<div class="page-content">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container-fluid p-5 ">
        
        <div class="row pt-2">
              <div class="col-md-4 col-sm-6" >
                <div class="statistic-block block cardheight">
                  <div class="">
                    <div class="title">
                      <div class="icon"><i class="icon-user-1"></i></div><strong>Patient Details</strong>
                    </div>
                    
                    
                    <div class="p-0">
                        <div>ID:{{Auth::user()->id}}</div>
                        <div>Name:{{Auth::user()->name}}</div>
                        
                    </div>
                    
                    
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <div class="statistic-block block cardheight" >
                  <div class="">
                    <div class="title">
                      <div class="icon"><i class="icon-user-1"></i></div><strong>Allergies</strong>
                    </div>
                    
                    @foreach($pd1 as $pd1)
                    <div>
                        @if($pd1->patient_id == Auth::user()->id)
                        <div>{{$pd1->allergyname}}</div>
                        @endif
                    </div>
                    @endforeach
                    
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <div class="statistic-block block cardheight">
                  <div class="">
                    <div class="title">
                      <div class="icon"><i class="icon-user-1"></i></div><strong>Patient Details</strong>
                    </div>
                    <div>
                        <p>{{Auth::user()->name}}</p>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    

    <div class="px-2 py-2">
        <h4>Medical Reports</h4>
        <div class="block margin-bottom-sm">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Report ID</th>
                            <th>Patient Name</th>
                            <th>Doctor Name</th>
                            <th>Visit Date</th>
                            <th>Visit Reason</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mlr as $mlr)
                        <tr>
                            <td>{{$mlr->id}}</td>
                            <td>{{$mlr->last_name}}</td>
                            <td>{{$mlr->doctor_name}}</td>
                            <td>{{$mlr->visit_date}}</td>
                            <td>{{$mlr->visit_reason}}</td>
                            <td><a href="#">Download</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    </div>
</div>



@endsection