@extends('admin.partials.template')

@section('content')



<div class="page-content">
            <div>
            @if(auth()->user()->role == 'admin' || auth()->user()->role == 'doctor')
            <div class="col-lg-6 mx-auto pt-2">
                <div class="block">
                  <div class="title text-center"><h1><strong>Prescription List</strong></h1></div>
                  <div class="block-body text-center">
                    <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Add Prescription Data</button>
                    <!-- Modal-->
                    <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                      <div role="document" class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Add Prescription Data</strong>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                          </div>
                          <div class="modal-body">
                            <p>Prescription Details</p>
                            <form method="post" action="{{route('prescription_submit')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="report_id">Report ID</label>
                                    <select name="report_id" id="" required class="form-control">
                                        <option value="" selected="">Select Report ID</option>
                                        @foreach($medicalreport as $medicalreport)
                                        <option value="{{$medicalreport->id}}">{{$medicalreport->id}}</option>
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
                          <th>#</th>
                          <th>Report ID</th>
                          <th>Medicine Name</th>
                          <th>Dosage</th>
                          @if(Auth::user()->role == 'admin'|| Auth::user()->role == 'doctor')
                          <th>Action</th>
                          @endif
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($prc as $prc)
                        <tr>
                            <td>{{$prc->id}}</td>
                            <td>{{$prc->report_id}}</td>
                            <td>{{$prc->medicine_name}}</td>
                            <td>{{$prc->dosage}}</td>
                            @if(Auth::user()->role == 'doctor')
                            <td>
                              <a href="#" data-toggle="modal" data-target="#mymodalpres{{$prc->id}}">Edit</a>/
                              <div id="mymodalpres{{$prc->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                                <div role="document" class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Edit Prescription Data</strong>
                                      <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                      <p>Details of Prescription - {{$prc->id}}</p>
                                      <form method="post" action="{{route('prescription_edit_update', $prc->id)}}">
                                          @csrf
                                          <div class="form-group">
                                              <label for="report_id">Report ID</label>
                                              <select name="report_id" id="" required class="form-control">
                                                  <option value="{{$prc->report_id}}" selected="{{$prc->report_id}}">{{$prc->report_id}}</option>
                                                  @foreach($medrep as $mdr)
                                                  <option value="{{$mdr->id}}">{{$mdr->id}}</option>
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
                              <a href="{{route('prescription_delete',$prc->id)}}">Delete</a>
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


