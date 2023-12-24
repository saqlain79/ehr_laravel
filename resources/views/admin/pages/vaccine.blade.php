@extends('admin.partials.template')

@section('content')



<div class="page-content">
            <div>
            @if(Auth::user()->role == 'admin' || Auth::user()->role == 'doctor')
            <div class="col-lg-6 mx-auto pt-2">
                <div class="block">
                  <div class="title text-center"><h1><strong>Vaccine List</strong></h1></div>
                  <div class="block-body text-center">
                    <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Add Vaccine Data</button>
                    <!-- Modal-->
                    <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                      <div role="document" class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Add Vaccine Data</strong>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                          </div>
                          <div class="modal-body">
                            <p>Vaccine Details</p>
                            <form method="post" action="{{route('vaccine_submit')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="vaccinename">Vaccine Name</label>
                                    <input type="text" name="vaccinename" placeholder="Write Clinic Name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="quantity">Quantity</label>
                                    <input type="number" name="quantity" placeholder="Enter Quantity" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="targetDisease">Target Disease</label>
                                    <input type="tel" name="targetDisease" placeholder="Enter Target Disease" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="company">Company</label>
                                    <input type="text" name="company" placeholder="Write Company Name" class="form-control">
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
                          <th>Vaccine Name</th>
                          <th>Quantity</th>
                          <th>Target Disease</th>
                          <th>Company</th>
                          @if(Auth::user()->role == 'admin' || Auth::user()->role == 'doctor')
                          <th>Action</th>
                          @endif
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($vaccine as $v)
                        <tr>
                            <td>{{$v->id}}</td>
                            <td>{{$v->vaccinename}}</td>
                            <td>{{$v->quantity}}</td>
                            <td>{{$v->targetDisease}}</td>
                            <td>{{$v->company}}</td>
                            @if(Auth::user()->role == 'doctor' || Auth::user()->role == 'admin')
                            <td>
                            <a href="" data-toggle="modal" data-target="#myModalvaccine{{$v->id}}">Edit</a>

                              <div id="myModalvaccine{{$v->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                                  <div role="document" class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Edit Vaccine Data</strong>
                                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                      </div>
                                      <div class="modal-body">
                                        <p>Details of ID - {{$v->id}}</p>
                                        <form method="post" action="{{route('vaccine_edit_update', $v->id)}}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="vaccinename">Vaccine Name</label>
                                                <input type="text" name="vaccinename" value="{{$v->vaccinename}}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="quantity">Quantity</label>
                                                <input type="number" name="quantity" value="{{$v->quantity}}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="targetDisease">Target Disease</label>
                                                <input type="tel" name="targetDisease" value="{{$v->targetDisease}}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="company">Company</label>
                                                <input type="text" name="company" value="{{$v->company}}" class="form-control">
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

                              @if(auth()->user()->role == 'admin')

                              /<a href="{{route('vaccine_delete',$v->id)}}">Delete</a>

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


@endsection


