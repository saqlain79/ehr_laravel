@extends('admin.partials.template')

@section('content')



<div class="page-content">
            <div>
            @if(auth()->user()->role == 'admin' || auth()->user()->role == 'doctor')
            <div class="col-lg-6 mx-auto pt-2">
                <div class="block">
                  <div class="title text-center"><h1><strong>Allergy List</strong></h1></div>
                  <div class="block-body text-center">
                    <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary" >Add Allergy Data</button>
                    <!-- Modal-->
                    <div  id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                      <div role="document" class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Add allergy data</strong>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                          </div>
                          <div class="modal-body">
                            <p>Patient Details</p>
                            <form method="post" action="{{route('patient_submit')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="allergyname">Allergy Name</label>
                                    <input type="text" name="allergyname" placeholder="Write Allergy Name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="type">Type</label>
                                    <input type="text" name="type" placeholder="Write Allergy Type" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input type="text" name="description" placeholder="Write description details" class="form-control">
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
                          <th>Allergy Name</th>
                          <th>Type</th>
                          <th>Description</th>
                          @if(Auth::user()->role == 'admin' || Auth::user()->role == 'doctor')
                          <th>Action</th>
                          @endif
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($allergy as $a)
                        
                        <tr>
                            <td>{{$a->id}}</td>
                            <td>{{$a->allergyname}}</td>
                            <td>{{$a->type}}</td>
                            <td>{{$a->description}}</td>
                            @if(Auth::user()->role == 'doctor' || Auth::user()->role == 'admin')
                            <td>
                              <a href="" data-toggle="modal" data-target="#mymodalallergy{{$a->id}}">Edit</a>
                              
                                    <!-- Modal-->
                                    <div id="mymodalallergy{{$a->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                                      <div role="document" class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Add allergy data</strong>
                                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                          </div>
                                          <div class="modal-body">
                                            <p>Patient Details</p>
                                            <form method="post" action="{{route('allergy_edit_update',$a->id)}}">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="allergyname">Allergy Name</label>
                                                    <input type="text" name="allergyname" value="{{$a->allergyname}}" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="type">Type</label>
                                                    <input type="text" name="type" value="{{$a->type}}" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="description">Description</label>
                                                    <input type="text" name="description" value="{{$a->description}}" class="form-control">
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
                                  
                              <!-- @if(Auth::user()->role == 'admin')
                              /<a href="{{route('allergy_delete',$a->id)}}">Delete</a>
                              @endif -->
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


