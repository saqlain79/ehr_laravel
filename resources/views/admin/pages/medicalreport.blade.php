@extends('admin.partials.template')

@section('content')



<div class="page-content">
            <div>
              @if(auth()->user()->role == 'admin' || auth()->user()->role == 'doctor')
            <div class="col-lg-6 mx-auto pt-2">
                <div class="block">
                  <div class="title text-center"><h1><strong>Medical Report List</strong></h1></div>
                  <div class="block-body text-center">
                    <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Add Medical Report Data</button>
                    <!-- Modal-->
                    <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                      <div role="document" class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Add Medical Report Data</strong>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                          </div>
                          <div class="modal-body">
                            <p>Medical Report Details</p>
                            <form method="post" action="{{route('medical_report_submit')}}">
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
                                    <label for="doctor_id">Doctor ID</label>
                                    <select name="doctor_id" id="" required class="form-control">
                                        <option value="" selected="">Select Doctor ID</option>
                                        @foreach($doctor as $doctor)
                                        <option value="{{$doctor->id}}">{{$doctor->id}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="visit_reason">Visit Reason</label>
                                    <input type="text" name="visit_reason" placeholder="Enter Visit reason" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="visit_date">Visit Date</label>
                                    <input type="date" name="visit_date" placeholder="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="diagnosis">Diagnosis</label>
                                    <input type="text" name="diagnosis" placeholder="Enter Diagnosis details" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="test">Test</label>
                                    <input type="text" name="test" placeholder="Write Company Name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="test_results">Test Result</label>
                                    <input type="text" name="test_results" placeholder="Write test result" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="temperature">Temperature</label>
                                    <input type="tel" name="temperature" placeholder="Enter body temperature" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="blood_pressure">Blood Pressure</label>
                                    <input type="tel" name="blood_pressure" placeholder="Enter Blood Pressure" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="heart_rate">Heart Rate</label>
                                    <input type="tel" name="heart_rate" placeholder="Enter Heart Rate" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="blood_oxygen">Blood Oxygen</label>
                                    <input type="tel" name="blood_oxygen" placeholder="Enter Blood Oxygen" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="remarks">Remarks</label>
                                    <input type="text" name="remarks" placeholder="Write Remarks" class="form-control">
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
                          <th>#</th>
                          <th>Patient ID</th>
                          <th>Patient Name</th>
                          <th>Doctor ID</th>
                          <th>Doctor Name</th>
                          <th>Visit Reason</th>
                          <th>Visit Date</th>
                          <th>Diagnosis</th>
                          <th>Tests</th>
                          <th>Test Result</th>
                          <th>Temperature</th>
                          <th>Blood Pressure</th>
                          <th>Heart Rate</th>
                          <th>Blood Oxygen</th>
                          <th>Remarks</th>
                          @if(auth()->user()->role == 'admin' || auth()->user()->role == 'doctor')
                          <th>Action</th>
                          @endif
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($medicalreport as $mc)
                        @if(auth()->user()->role == 'admin')
                        <tr>
                            <td>{{$mc->id}}</td>
                            <td>{{$mc->patient_id}}</td>
                            <td>{{$mc->last_name}}</td>
                            <td>{{$mc->doctor_id}}</td>
                            <td>{{$mc->doctor_name}}</td>
                            <td>{{$mc->visit_reason}}</td>
                            <td>{{$mc->visit_date}}</td>
                            <td>{{$mc->diagnosis}}</td>
                            <td>{{$mc->test}}</td>
                            <td>{{$mc->test_results}}</td>
                            <td>{{$mc->temperature}}</td>
                            <td>{{$mc->blood_pressure}}</td>
                            <td>{{$mc->heart_rate}}</td>
                            <td>{{$mc->blood_oxygen}}</td>
                            <td>{{$mc->remarks}}</td>
                            @if(auth()->user()->role == 'admin' || auth()->user()->role == 'doctor')
                            <td>
                              <a href="#" data-toggle="modal" data-target="#mymodalmedreport{{$mc->id}}">Edit</a>

                              <div id="mymodalmedreport{{$mc->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                                  <div role="document" class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Edit Medical Report Data</strong>
                                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                      </div>
                                      <div class="modal-body">
                                        <p>Details of ID - {{$mc->id}}</p>
                                        <form method="post" action="{{route('medical_report_edit_update',$mc->id)}}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="patient_id">Patient ID</label>
                                                <select name="patient_id" id="patient_id" required class="form-control">
                                                    <option value="{{$mc->patient_id}}" selected="{{$mc->patient_id}}">{{$mc->patient_id}}</option>
                                                    @foreach($pt as $pat)
                                                    <option value="{{$pat->id}}">{{$pat->id}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="doctor_id">Doctor ID</label>
                                                <select name="doctor_id" id="" required class="form-control">
                                                    <option value="{{$mc->doctor_id}}" selected="{{$mc->doctor_id}}">{{$mc->doctor_id}}</option>
                                                    @foreach($doc as $doctor)
                                                    <option value="{{$doctor->id}}">{{$doctor->id}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="visit_reason">Visit Reason</label>
                                                <input type="text" name="visit_reason" value="{{$mc->visit_reason}}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="visit_date">Visit Date</label>
                                                <input type="date" name="visit_date" value="{{$mc->visit_date}}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="diagnosis">Diagnosis</label>
                                                <input type="text" name="diagnosis" value="{{$mc->visit_reason}}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="test">Test</label>
                                                <input type="text" name="test" value="{{$mc->visit_reason}}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="test_results">Test Result</label>
                                                <input type="text" name="test_results" value="{{$mc->test_results}}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="temperature">Temperature</label>
                                                <input type="tel" name="temperature" value="{{$mc->temperature}}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="blood_pressure">Blood Pressure</label>
                                                <input type="tel" name="blood_pressure" value="{{$mc->blood_pressure}}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="heart_rate">Heart Rate</label>
                                                <input type="tel" name="heart_rate" value="{{$mc->heart_rate}}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="blood_oxygen">Blood Oxygen</label>
                                                <input type="tel" name="blood_oxygen" value="{{$mc->blood_oxygen}}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="remarks">Remarks</label>
                                                <input type="text" name="remarks" value="{{$mc->remarks}}" class="form-control">
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
                              /<a href="{{route('medical_report_delete',[$mc->patient_id, $mc->doctor_id])}}">Delete</a>
                              @endif
                            </td>
                            @endif
                        </tr>
                        @elseif(auth()->user()->role == 'doctor')
                          @if(auth()->user()->email == $mc->email)
                          <tr>
                            <td>{{$mc->id}}</td>
                            <td>{{$mc->patient_id}}</td>
                            <td>{{$mc->last_name}}</td>
                            <td>{{$mc->doctor_id}}</td>
                            <td>{{$mc->doctor_name}}</td>
                            <td>{{$mc->visit_reason}}</td>
                            <td>{{$mc->visit_date}}</td>
                            <td>{{$mc->diagnosis}}</td>
                            <td>{{$mc->test}}</td>
                            <td>{{$mc->test_results}}</td>
                            <td>{{$mc->temperature}}</td>
                            <td>{{$mc->blood_pressure}}</td>
                            <td>{{$mc->heart_rate}}</td>
                            <td>{{$mc->blood_oxygen}}</td>
                            <td>{{$mc->remarks}}</td>
                            <td>
                              <a href="#" data-toggle="modal" data-target="#mymodalmedreport{{$mc->id}}">Edit</a>

                              <div id="mymodalmedreport{{$mc->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                                  <div role="document" class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Edit Medical Report Data</strong>
                                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                      </div>
                                      <div class="modal-body">
                                        <p>Details of ID - {{$mc->id}}</p>
                                        <form method="post" action="{{route('medical_report_edit_update',$mc->id)}}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="patient_id">Patient ID</label>
                                                <select name="patient_id" id="patient_id" required class="form-control">
                                                    <option value="{{$mc->patient_id}}" selected="{{$mc->patient_id}}">{{$mc->patient_id}}</option>
                                                    @foreach($pt as $pat)
                                                    <option value="{{$pat->id}}">{{$pat->id}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="doctor_id">Doctor ID</label>
                                                <select name="doctor_id" id="" required class="form-control">
                                                    <option value="{{$mc->doctor_id}}" selected="{{$mc->doctor_id}}">{{$mc->doctor_id}}</option>
                                                    @foreach($doc as $doctor)
                                                    <option value="{{$doctor->id}}">{{$doctor->id}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="visit_reason">Visit Reason</label>
                                                <input type="text" name="visit_reason" value="{{$mc->visit_reason}}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="visit_date">Visit Date</label>
                                                <input type="date" name="visit_date" value="{{$mc->visit_date}}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="diagnosis">Diagnosis</label>
                                                <input type="text" name="diagnosis" value="{{$mc->visit_reason}}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="test">Test</label>
                                                <input type="text" name="test" value="{{$mc->visit_reason}}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="test_results">Test Result</label>
                                                <input type="text" name="test_results" value="{{$mc->test_results}}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="temperature">Temperature</label>
                                                <input type="tel" name="temperature" value="{{$mc->temperature}}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="blood_pressure">Blood Pressure</label>
                                                <input type="tel" name="blood_pressure" value="{{$mc->blood_pressure}}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="heart_rate">Heart Rate</label>
                                                <input type="tel" name="heart_rate" value="{{$mc->heart_rate}}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="blood_oxygen">Blood Oxygen</label>
                                                <input type="tel" name="blood_oxygen" value="{{$mc->blood_oxygen}}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="remarks">Remarks</label>
                                                <input type="text" name="remarks" value="{{$mc->remarks}}" class="form-control">
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
                              
                            </td>
                          </tr>
                          @endif
                          @elseif(auth()->user()->role == 'patient')
                            @if(auth()->user()->email == $mc->email)
                            <tr>
                              <td>{{$mc->id}}</td>
                              <td>{{$mc->patient_id}}</td>
                              <td>{{$mc->last_name}}</td>
                              <td>{{$mc->doctor_id}}</td>
                              <td>{{$mc->doctor_name}}</td>
                              <td>{{$mc->visit_reason}}</td>
                              <td>{{$mc->visit_date}}</td>
                              <td>{{$mc->diagnosis}}</td>
                              <td>{{$mc->test}}</td>
                              <td>{{$mc->test_results}}</td>
                              <td>{{$mc->temperature}}</td>
                              <td>{{$mc->blood_pressure}}</td>
                              <td>{{$mc->heart_rate}}</td>
                              <td>{{$mc->blood_oxygen}}</td>
                              <td>{{$mc->remarks}}</td>
                              
                            </tr>
                            @endif
                          @endif
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>
</div>


@endsection


