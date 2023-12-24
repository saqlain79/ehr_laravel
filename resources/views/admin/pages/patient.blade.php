@extends('admin.partials.template')

@section('content')


<div class="page-content">
            <div>
            <div class="col-lg-6 mx-auto pt-2">
                <div class="block">
                  <div class="title text-center"><h1><strong>Patient Info</strong></h1></div>
                  <div class="block-body text-center">
                    <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Add Patient Data</button>
                    <!-- Modal-->
                    <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                      <div role="document" class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Add a new patient data</strong>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                          </div>
                          <div class="modal-body">
                            <p>Patient Details</p>
                            <form method="post" action="{{route('patient_submit')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <input type="text" name="first_name" placeholder="Write First Name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" name="last_name" placeholder="Write Last Name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="NID">NID</label>
                                    <input type="text" name="NID" placeholder="Write NID number" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="tel" name="phone" placeholder="Write phone number" class="form-control">
                                </div>
                              <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" placeholder="Write Email Address" class="form-control">
                              </div>
                              <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" placeholder="Write Address" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="date_of_birth">Date of birth</label>
                                    <input type="date" name="date_of_birth" placeholder="Date of birth" class="form-control">
                                </div>
                                
                                <!-- <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="gender" value="option1">
                                    <label class="form-check-label" for="inlineRadio1">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="gender" value="option2">
                                    <label class="form-check-label" for="inlineRadio2">Female</label>
                                </div> -->
                                <div class="form-group">Gender</div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                                    <label class="form-check-label" for="female">Female</label>
                                </div>

                                
                                <div class="form-group pt-3">
                                <label for="blood_group">Blood Group</label>
                                <select name="blood_group" id="blood_group" required="">
                                    <option value="" selected="">Select</option>
                                    
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                    
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
            <div class="px-2">
                <div class="block margin-bottom-sm">
                  <div class="table-responsive"> 
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>NID</th>
                          <th>Phone</th>
                          <th>Email</th>
                          <th>Address</th>
                          <th>Date Of Birth</th>
                          <th>Gender</th>
                          <th>Blood Group</th>
                          @if(Auth::user()->role == 'admin')
                          <th>Action</th>
                          @endif
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($patient as $p)
                        <tr>
                            <td>{{$p->id}}</td>
                            <td>{{$p->first_name}}</td>
                            <td>{{$p->last_name}}</td>
                            <td>{{$p->NID}}</td>
                            <td>{{$p->phone}}</td>
                            <td>{{$p->email}}</td>
                            <td>{{$p->address}}</td>
                            <td>{{$p->date_of_birth}}</td>
                            <td>{{$p->gender}}</td>
                            <td>{{$p->blood_group}}</td>
                            @if(Auth::user()->role == 'admin')
                            <td>
                              <a href="" data-toggle="modal" data-target="#myModalclinic{{$p->id}}">Edit</a>/

                             
                                    <!-- Modal-->
                                    <div id="myModalclinic{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                                    <div role="document" class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Edit patient data</strong>
                                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                        </div>
                                        <div class="modal-body">
                                          <p>Patient Details</p>
                                          <form method="post" action="{{route('patient_edit_update',$p->id)}}">
                                              @csrf
                                              <div class="form-group">
                                                  <label for="first_name">First Name</label>
                                                  <input type="text" name="first_name" value="{{$p->first_name}}" class="form-control">
                                              </div>
                                              <div class="form-group">
                                                  <label for="last_name">Last Name</label>
                                                  <input type="text" name="last_name" value="{{$p->last_name}}" class="form-control">
                                              </div>
                                              <div class="form-group">
                                                  <label for="NID">NID</label>
                                                  <input type="text" name="NID" value="{{$p->NID}}" class="form-control">
                                              </div>
                                              <div class="form-group">
                                                  <label for="phone">Phone</label>
                                                  <input type="tel" name="phone" value="{{$p->phone}}" class="form-control">
                                              </div>
                                            <div class="form-group">
                                              <label for="email">Email</label>
                                              <input type="email" name="email" value="{{$p->email}}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                  <label for="address">Address</label>
                                                  <input type="text" name="address" value="{{$p->address}}" class="form-control">
                                              </div>
                                              <div class="form-group">
                                                  <label for="date_of_birth">Date of birth</label>
                                                  <input type="date" name="date_of_birth" value="{{$p->date_of_birth}}" class="form-control">
                                              </div>
                                              
                                              
                                              <div class="form-group">Gender</div>
                                              <div class="form-check form-check-inline">
                                                  <input class="form-check-input" type="radio" name="gender" id="male" value="male" required>
                                                  <label class="form-check-label" for="male">Male</label>
                                              </div>
                                              <div class="form-check form-check-inline">
                                                  <input class="form-check-input" type="radio" name="gender" id="female" value="female" required>
                                                  <label class="form-check-label" for="female">Female</label>
                                              </div>
                                              
                                              <div class="form-group pt-3">
                                              <label for="blood_group">Blood Group</label>
                                              <select name="blood_group" id="blood_group" required="">
                                                  <option value="{{$p->blood_group}}" selected="{{$p->blood_group}}">{{$p->blood_group}}</option>
                                                  <?php
                                                      $blood_group = array('A+','A-','B+','B-','O+','O-');
                                                  ?>
                                                  @foreach($blood_group as $blood_group)
                                                    @if($blood_group != $p->blood_group)
                                                      <option value="{{$blood_group}}">{{$blood_group}}</option>
                                                    @endif
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
                                  
                              <a href="{{route('patient_delete',$p->id)}}">Delete</a>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>





            
                
                  
                    
                    <!--Edit Modal-->
                    
                <!-- Edit Modal End -->
              
            
</div>


@endsection