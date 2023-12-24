@extends('admin.partials.template')

@section('content')



<div class="page-content">
            <div>
            @if(auth()->user()->role == 'admin' || auth()->user()->role == 'doctor')
            <div class="col-lg-6 mx-auto pt-2">
                <div class="block">
                  <div class="title text-center"><h1><strong>Clinic List</strong></h1></div>
                  <div class="block-body text-center">
                    <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Add Clinic Data</button>
                    <!-- Modal-->
                    <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                      <div role="document" class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Add Clinic Data</strong>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                          </div>
                          <div class="modal-body">
                            <p>Clinic Details</p>
                            <form method="post" action="{{route('clinic_submit')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="clinicname">Clinic Name</label>
                                    <input type="text" name="clinicname" placeholder="Write Clinic Name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="location">Location</label>
                                    <input type="text" name="location" placeholder="Write Location address" class="form-control">
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
                          <th>Clinic Name</th>
                          <th>Location</th>
                          <th>Contact</th>
                          <th>Email</th>
                          @if(auth()->user()->role == 'admin')
                          <th>Action</th>
                          @endif
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($clinic as $c)
                        <tr>
                            <td>{{$c->id}}</td>
                            <td>{{$c->clinicname}}</td>
                            <td>{{$c->location}}</td>
                            <td>{{$c->contact}}</td>
                            <td>{{$c->email}}</td>
                            @if(auth()->user()->role == 'admin')
                            <td>
                              <a href="" data-toggle="modal" data-target="#mymodalclinic{{$c->id}}">Edit</a>
                              
                                    <!-- Modal-->
                                    <div id="mymodalclinic{{$c->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                                      <div role="document" class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Add Clinic Data</strong>
                                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                          </div>
                                          <div class="modal-body">
                                            <p>Details of Clinic ID - {{$c->id}}</p>
                                            <form method="post" action="{{route('clinic_submit')}}">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="clinicname">Clinic Name</label>
                                                    <input type="text" name="clinicname" value="{{$c->clinicname}}" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="location">Location</label>
                                                    <input type="text" name="location" value="{{$c->location}}" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="contact">Contact</label>
                                                    <input type="tel" name="contact" value="{{$c->contact}}" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" name="email" value="{{$c->email}}" class="form-control">
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
                                 


                              <!-- /<a href="{{route('clinic_delete',$c->id)}}">Delete</a> -->
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


