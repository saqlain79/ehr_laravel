@extends('admin.partials.template')

@section('content')



<div class="page-content">
            <div>
              @if(auth()->user()->role == 'admin' || auth()->user()->role == 'doctor')
            <div class="col-lg-6 mx-auto pt-2">
                <div class="block">
                  <div class="title text-center"><h1><strong>Patient Allergy List</strong></h1></div>
                  <div class="block-body text-center">
                    <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Add Patient Allergy Data</button>
                    <!-- Modal-->
                    <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                      <div role="document" class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Add Patient Allergy Data</strong>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                          </div>
                          <div class="modal-body">
                            <p>Patient Allergy Details</p>
                            <form method="post" action="{{route('patient_allergy_submit')}}">
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
                                    <label for="allergy_id">Allergy ID</label>
                                    <select name="allergy_id" id="" required class="form-control">
                                        <option value="" selected="">Select Allergy ID</option>
                                        @foreach($allergy as $allergy)
                                        <option value="{{$allergy->id}}">{{$allergy->id}}</option>
                                        @endforeach
                                    </select>
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
                          <th>Allergy ID</th>
                          <th>Allergy Type</th>
                          @if(Auth::user()->role == 'admin')
                          <th>Action</th>
                          @endif
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($patientallergy as $pa)
                        <tr>
                            <td>{{$pa->patient_id}}</td>
                            <td>{{$pa->last_name}}</td>
                            <td>{{$pa->allergy_id}}</td>
                            <td>{{$pa->type}}</td>
                            @if(Auth::user()->role == 'doctor' || Auth::user()->role == 'admin')
                            <td>
                            <a href="#" data-toggle="modal" data-target="#mymodalpatall{{$pa->patient_id, $pa->allergy_id}}">Edit</a>
                            <div id="mymodalpatall{{$pa->patient_id, $pa->allergy_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                              <div role="document" class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Edit Patient Allergy Data</strong>
                                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                  </div>
                                  <div class="modal-body">
                                    <p>Details of - {{$pa->patient_id}}/{{$pa->allergy_id}}</p>
                                    <form method="post" action="{{route('patient_allergy_edit_update', [$pa->patient_id, $pa->allergy_id])}}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="patient_id">Patient ID</label>
                                            <select name="patient_id" id="" required class="form-control">
                                                <option value="{{$pa->patient_id}}" selected="{{$pa->patient_id}}">{{$pa->patient_id}}</option>
                                                @foreach($pt as $patient)
                                                <option value="{{$patient->id}}">{{$patient->id}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="allergy_id">Allergy ID</label>
                                            <select name="allergy_id" id="" required class="form-control">
                                                <option value="{{$pa->allergy_id}}" selected="{{$pa->allergy_id}}">{{$pa->allergy_id}}</option>
                                                @foreach($all as $allergy)
                                                <option value="{{$allergy->id}}">{{$allergy->id}}</option>
                                                @endforeach
                                            </select>
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

                            @if(Auth::user()->role == 'admin')
                            /<a href="{{route('patient_allergy_delete', [$pa->patient_id, $pa->allergy_id])}}">Delete</a>
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


