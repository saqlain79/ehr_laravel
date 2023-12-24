@extends('admin.partials.template')

@section('content')



<div class="page-content">
            <div>
            @if(auth()->user()->role == 'admin' || auth()->user()->role == 'doctor')
            <div class="col-lg-6 mx-auto pt-2">
                <div class="block">
                  <div class="title text-center"><h1><strong>Patient Vaccine Clinic List</strong></h1></div>
                  <div class="block-body text-center">
                    <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Add Patient Vaccine Clinic Data</button>
                    <!-- Modal-->
                    <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                      <div role="document" class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Add Patient Vaccine Clinic Data</strong>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                          </div>
                          <div class="modal-body">
                            <p>Patient Vaccine Clinic Details</p>
                            <form method="post" action="{{route('patient_vaccine_clinic_submit')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="patient_id">Patient ID</label>
                                    <select name="patient_id" id="" required class="form-control">
                                        <option value="" selected="">Select Center ID</option>
                                        @foreach($patient as $patient)
                                        <option value="{{$patient->id}}">{{$patient->id}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="vaccine_id">Vaccine ID</label>
                                    <select name="vaccine_id" id="" required class="form-control">
                                        <option value="" selected="">Select Vaccine ID</option>
                                        @foreach($vaccine as $vaccine)
                                        <option value="{{$vaccine->id}}">{{$vaccine->id}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="center_id">Clinic ID</label>
                                    <select name="center_id" id="" required class="form-control">
                                        <option value="" selected="">Select Vaccine ID</option>
                                        @foreach($clinic as $clinic)
                                        <option value="{{$clinic->id}}">{{$clinic->id}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="vaccination_date">Vaccination Date</label>
                                    <input type="date" name="vaccination_date" placeholder="Date of birth" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="dosage">Dosage</label>
                                    <input type="text" name="dosage" placeholder="Enter Dosage" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="vaccine_administrator">Vaccine Administrator</label>
                                    <input type="text" name="vaccine_administrator" placeholder="Enter Vaccine Admin Name" class="form-control">
                                </div>
                                
                              <div class="form-group">       
                                <input type="submit" value="Submit" class="btn btn-primary">
                              </div>
                            </form>
                          </div>
                          <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endif
            <div class="px-2 pt-2">
                <div class="block margin-bottom-sm">
                  <div class="table-responsive"> 
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Patient ID</th>
                          <th>Patient Name</th>
                          <th>Vaccine ID</th>
                          <th>Vaccine Name</th>
                          <th>Center ID</th>
                          <th>Center Name</th>
                          <th>Vaccination Date</th>
                          <th>Dosage</th>
                          <th>Vaccine Administrator</th>
                          @if(auth()->user()->role == 'admin' || auth()->user()->role == 'doctor')
                          <th>Action</th>
                          @endif
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($pvcjoin as $pvcjoin)
                        <tr>
                            <td>{{$pvcjoin->patient_id}}</td>
                            <td>{{$pvcjoin->last_name}}</td>
                            <td>{{$pvcjoin->vaccine_id}}</td>
                            <td>{{$pvcjoin->vaccinename}}</td>
                            <td>{{$pvcjoin->center_id}}</td>
                            <td>{{$pvcjoin->clinicname}}</td>
                            <td>{{$pvcjoin->vaccination_date}}</td>
                            <td>{{$pvcjoin->dosage}}</td>
                            <td>{{$pvcjoin->vaccine_administrator}}</td>
                            @if(auth()->user()->role == 'doctor' || auth()->user()->role == 'admin')
                            <td>
                            <a href="#" data-toggle="modal" data-target="#mymodalpvc{{$pvcjoin->patient_id . $pvcjoin->vaccine_id . $pvcjoin->center_id}}">Edit</a>
                              <div id="mymodalpvc{{$pvcjoin->patient_id . $pvcjoin->vaccine_id . $pvcjoin->center_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                                <div role="document" class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Edit Patient Vaccine Clinic Data</strong>
                                      <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                      <p>Details of PVC - {{$pvcjoin->patient_id}}/{{$pvcjoin->vaccine_id}}/{{$pvcjoin->center_id}}</p>
                                      <form method="post" action="{{route('patient_vaccine_clinic_edit_update', [$pvcjoin->patient_id, $pvcjoin->vaccine_id, $pvcjoin->center_id])}}">
                                          @csrf
                                          <div class="form-group">
                                              <label for="patient_id">Patient ID</label>
                                              <select name="patient_id" id="" required class="form-control">
                                                  <option value="{{$pvcjoin->patient_id}}" selected="{{$pvcjoin->patient_id}}">{{$pvcjoin->patient_id}}</option>
                                                  @foreach($pt as $patient)
                                                    <option value="{{$patient->id}}">{{$patient->id}}</option>
                                                  @endforeach
                                              </select>
                                          </div>
                                          <div class="form-group">
                                              <label for="vaccine_id">Vaccine ID</label>
                                              <select name="vaccine_id" id="" required class="form-control">
                                                  <option value="{{$pvcjoin->vaccine_id}}" selected="{{$pvcjoin->vaccine_id}}">{{$pvcjoin->vaccine_id}}</option>
                                                  @foreach($vc as $vaccine)
                                                  <option value="{{$vaccine->id}}">{{$vaccine->id}}</option>
                                                  @endforeach
                                              </select>
                                          </div>
                                          <div class="form-group">
                                              <label for="center_id">Clinic ID</label>
                                              <select name="center_id" id="" required class="form-control">
                                                  <option value="{{$pvcjoin->center_id}}" selected="{{$pvcjoin->center_id}}">{{$pvcjoin->center_id}}</option>
                                                  @foreach($cl as $clinic)
                                                  <option value="{{$clinic->id}}">{{$clinic->id}}</option>
                                                  @endforeach
                                              </select>
                                          </div>
                                          <div class="form-group">
                                              <label for="vaccination_date">Vaccination Date</label>
                                              <input type="date" name="vaccination_date" value="{{$pvcjoin->vaccination_date}}" class="form-control">
                                          </div>
                                          <div class="form-group">
                                              <label for="dosage">Dosage</label>
                                              <input type="text" name="dosage" value="{{$pvcjoin->dosage}}" class="form-control">
                                          </div>
                                          <div class="form-group">
                                              <label for="vaccine_administrator">Vaccine Administrator</label>
                                              <input type="text" name="vaccine_administrator" value="{{$pvcjoin->vaccine_administrator}}" class="form-control">
                                          </div>
                                          
                                        <div class="form-group">       
                                          <input type="submit" value="Submit" class="btn btn-primary">
                                        </div>
                                      </form>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            @if(auth()->user()->role == 'admin')
                            /<a href="{{route('patient_vaccine_clinic_delete',[$pvcjoin->patient_id, $pvcjoin->vaccine_id, $pvcjoin->center_id])}}">Delete</a>
                            @endif
                            </td>
                            @endif
                        </tr>
                        
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>
</div>


@endsection


