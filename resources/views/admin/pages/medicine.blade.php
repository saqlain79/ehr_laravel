@extends('admin.partials.template')

@section('content')



<div class="page-content">
            <div>
            @if(auth()->user()->role == 'admin' || auth()->user()->role == 'doctor')
            <div class="col-lg-6 mx-auto pt-2">
                <div class="block">
                  <div class="title text-center"><h1><strong>Medicine List</strong></h1></div>
                  <div class="block-body text-center">
                    <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Add Medicine Data</button>
                    <!-- Modal-->
                    <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                      <div role="document" class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Add Medicine Data</strong>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                          </div>
                          <div class="modal-body">
                            <p>Medicine Details</p>
                            <form method="post" action="{{route('medicine_submit')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="medicine_name">Vaccine Name</label>
                                    <input type="text" name="medicine_name" placeholder="Write Medicine Name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="prescription_id">Prescription ID</label>
                                    <select name="prescription_id" id="" required class="form-control">
                                        <option value="" selected="">Select Prescription ID</option>
                                        @foreach($prescription as $prescription)
                                        <option value="{{$prescription->id}}">{{$prescription->id}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="medicine_type">Medicine Type</label>
                                    <input type="text" name="medicine_type" placeholder="Write Medicine Type" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="dosage">Dosage</label>
                                    <input type="text" name="dosage" placeholder="Write Dosage" class="form-control">
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
                          <th>Medicine Name</th>
                          <th>Prescription ID</th>
                          <th>Medicine Type</th>
                          <th>Dosage</th>
                          @if(auth()->user()->role == 'admin'|| auth()->user()->role == 'doctor')
                          <th>Action</th>
                          @endif
                          
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($medicine as $medicine)
                        <tr>
                            <td>{{$medicine->id}}</td>
                            <td>{{$medicine->medicine_name}}</td>
                            <td>{{$medicine->prescription_id}}</td>
                            <td>{{$medicine->medicine_type}}</td>
                            <td>{{$medicine->dosage}}</td>
                            @if(auth()->user()->role == 'doctor' || auth()->user()->role == 'admin')
                            <td>
                              <a href="#" data-toggle="modal" data-target="#mymodalmed{{$medicine->medicine_name, $medicine->prescription_id}}">Edit</a>
                              <div id="mymodalmed{{$medicine->medicine_name, $medicine->prescription_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                                  <div role="document" class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Edit Medicine Data</strong>
                                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                      </div>
                                      <div class="modal-body">
                                        <p>Details of - {{$medicine->medicine_name}}/{{$medicine->prescription_id}}</p>
                                        <form method="post" action="{{route('medicine_edit_update',[$medicine->medicine_name, $medicine->prescription_id])}}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="medicine_name">Vaccine Name</label>
                                                <input type="text" name="medicine_name" value="{{$medicine->medicine_name}}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="prescription_id">Prescription ID</label>
                                                <select name="prescription_id" id="" required class="form-control">
                                                    <option value="{{$medicine->prescription_id}}" selected="{{$medicine->prescription_id}}">{{$medicine->prescription_id}}</option>
                                                    @foreach($pres as $prescription)
                                                    @if($prescription->id != $medicine->prescription_id)
                                                    <option value="{{$prescription->id}}">{{$prescription->id}}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="medicine_type">Medicine Type</label>
                                                <input type="text" name="medicine_type" value="{{$medicine->medicine_type}}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="dosage">Dosage</label>
                                                <input type="text" name="dosage" value="{{$medicine->dosage}}" class="form-control">
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
                              /<a href="{{route('medicine_delete', [$medicine->medicine_name, $medicine->prescription_id])}}">Delete</a>
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


