@extends('admin.partials.template')

@section('content')



<div class="page-content">
            <div>
            
            <div class="col-lg-6 mx-auto pt-2">
                <div class="block">
                  <div class="title text-center"><h1><strong>Doctor List</strong></h1></div>
                  <div class="block-body text-center">
                    <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Add Doctor Data</button>
                    <!-- Modal-->
                    <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                      <div role="document" class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Add Doctor Data</strong>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                          </div>
                          <div class="modal-body">
                            <p>Doctor Details</p>
                            <form method="post" action="{{route('doctor_submit')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="doctor_name">Doctor Name</label>
                                    <input type="text" name="doctor_name" placeholder="Write Doctor Name" class="form-control">
                                </div>
                                
                                <div class="form-group">
                                    <label for="contact">Contact</label>
                                    <input type="tel" name="contact" placeholder="Write contact details" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" placeholder="Write email address" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="dob">Date Of Birth</label>
                                    <input type="date" name="dob" placeholder="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="license_num">License Number</label>
                                    <input type="tel" name="license_num" placeholder="Write license number" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="years_of_exp">Years Of Experience</label>
                                    <input type="tel" name="years_of_exp" placeholder="Enter number in years" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="specialty">Specialty</label>
                                    <input type="text" name="specialty" placeholder="Specialists in?" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="center_id">Center ID</label>
                                    <select name="center_id" id="" required class="form-control">
                                        <option value="" selected="">Select Center ID</option>
                                        @foreach($clinic as $clinic)
                                        <option value="{{$clinic->id}}">{{$clinic->id}}</option>
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
            
            <div class="px-2 pt-2">
                <div class="block margin-bottom-sm">
                  <div class="table-responsive"> 
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Center ID</th>
                          <th>Doctor Name</th>
                          <th>Contact</th>
                          <th>Email</th>
                          <th>Date Of Birth</th>
                          <th>License Number</th>
                          <th>Years of Experience</th>
                          @if(auth()->user()->role == 'admin')
                          <th>Action</th>
                          @endif
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($doctor as $d)
                        <tr>
                            <td>{{$d->id}}</td>
                            <td>{{$d->center_id}}</td>
                            <td>{{$d->doctor_name}}</td>
                            <td>{{$d->contact}}</td>
                            <td>{{$d->email}}</td>
                            <td>{{$d->dob}}</td>
                            <td>{{$d->license_num}}</td>
                            <td>{{$d->years_of_exp}}</td>
                            @if(auth()->user()->role == 'admin')
                            <td>
                              <a href="" data-toggle="modal" data-target="#mymodaldoctor{{$d->id}}">Edit</a>/

                              <div id="mymodaldoctor{{$d->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                                  <div role="document" class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Add Doctor Data</strong>
                                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                      </div>
                                      <div class="modal-body">
                                        <p>Doctor Details</p>
                                        <form method="post" action="{{route('doctor_edit_update', $d->id)}}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="doctor_name">Doctor Name</label>
                                                <input type="text" name="doctor_name" value="{{$d->doctor_name}}" class="form-control">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="contact">Contact</label>
                                                <input type="tel" name="contact" value="{{$d->contact}}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" name="email" value="{{$d->email}}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="dob">Date Of Birth</label>
                                                <input type="date" name="dob" value="{{$d->dob}}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="license_num">License Number</label>
                                                <input type="tel" name="license_num" value="{{$d->license_num}}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="years_of_exp">Years Of Experience</label>
                                                <input type="tel" name="years_of_exp" value="{{$d->years_of_exp}}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="specialty">Specialty</label>
                                                <input type="text" name="specialty" value="{{$d->specialty}}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="center_id">Center ID</label>
                                                <select name="center_id" id="" required class="form-control">
                                                    <option value="{{$d->center_id}}" selected>{{$d->center_id}}</option>
                                                    @foreach($cl as $clinic)
                                                    @if($clinic->id != $d->center_id)
                                                        <option value="{{$clinic->id}}">{{$clinic->id}}</option>
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

                              <a href="{{route('doctor_delete', $d->id)}}">Delete</a>
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


