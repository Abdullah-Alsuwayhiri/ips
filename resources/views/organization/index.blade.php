@extends('layouts.app')

@section('content')


  <div class="message"></div> 
  <div class="container-fluid">         
      <div class="row">
          <div class="col-lg-5">
              <?php if (isset($editdepartment)) { ?>
              <div class="card card-outline-info">
                  <div class="card-header">
                      <h4 class="m-b-0 text-white">Edit Department</h4>
                  </div>
                  
                 
                  

                  <div class="card-body">
                          <form method="post" action="organization/Update_dep" enctype="multipart/form-data">
                              <div class="form-body">
                                  <div class="row ">
                                      <div class="col-md-12">
                                          <div class="form-group">
                                              <label class="control-label">Department Name</label>
                                              <input type="text" name="department" id="firstName" value="<?php  echo $editdepartment->dep_name;?>" class="form-control" placeholder="">
                                              <input type="hidden" name="id" value="<?php  echo $editdepartment->id;?>">
                                          </div>
                                      </div>
                                      <!--/span-->
                                  </div>
                                  <!--/row-->
                              </div>
                              <div class="form-actions">
                                  <button type="submit" class="btn btn-info"> <i class="fa fa-check"></i> Save</button>
                                  <button type="button" class="btn btn-info">Cancel</button>
                              </div>
                          </form>
                  </div>
              </div>
              <?php } else { ?>
                                        

            

                <div class="card card-outline-info">
                    <div class="card-header">
                      <h4 class="m-b-0 text-black">Add Department / اضافة محفظه</h4>
                  </div>
                  
               
             
                  

                  <div class="card-body">
                @if(isset($dep_edit)) 
                {{ Form::model($dep_edit, ['route' => ['department.update', $dep_edit->id], 'method' => 'patch']) }}      
                    
                @else
                    <form method="POST" action="{{ route('department.add') }}" enctype="multipart/form-data" autocomplete="off">
                @endif  
                @csrf
                @method('put')
                              <div class="form-body">
                                  <div class="row ">
                                      <div class="col-md-12">
                                          <div class="form-group">
                                              <label class="control-label">Department Name / المحفظه</label>
                                              @if(isset($dep_edit))  
                                          <input type="text" name="department" id="firstName" value="{{$dep_edit->Title}}" class="form-control" placeholder="" minlength="3" required>
                                              @else
                                              <input type="text" name="department" id="firstName" value="" class="form-control" placeholder="" minlength="3" required>
                                            @endif
                                        </div>
                                      </div>
                                      <!--/span-->
                                  </div>
                                  <!--/row-->
                              </div>
                              <div class="form-actions">
                                  <button type="submit" class="btn btn-info"> <i class="fa fa-check"></i> Save</button>
                                  <button type="button" class="btn btn-info">Cancel</button>
                              </div>
                          </form>
                      </div>
                 </div>
                  <?php }?>
                </div>

            <div class="col-7">
              <div class="card card-outline-info">
                  <div class="card-header">
                      <h4 class="m-b-0 text-black"> Department List / قائمة المحافظ</h4>
                  </div>
                  <div class="card-body">
                        
                      <div class="table-responsive ">
                          <table id="" class="display  table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                              <thead>
                                  <tr>
                                      <th>Department Name / المحفظه</th>
                                      <th>Action</th>
                                      
                                  </tr>
                              </thead>
                              <tfoot>
                                  <tr>
                                      <th>Department Name / المحفظه</th>
                                      <th>Action</th>
                                  </tr>
                              </tfoot>
                              
                              <tbody>
                                @foreach($departments as $dep)
                                  <tr>
                                   
                                      <td>{{$dep->Title}}</td>
                                      <td class="jsgrid-align-center ">      
                                        
                                        <a href="{{route('department.edit',['id'=>$dep->id])}}" title="Edit" class="btn btn-sm btn-info waves-effect waves-light">Edit<i class="fa fa-pencil-square-o"></i></a>
                                          <a onclick="return confirm('Are you sure to delete this data?')" href="{{ route('department.delete',base64_encode($dep->id))}}" title="Delete" class="btn btn-sm btn-info waves-effect waves-light">Delete<i class="fa fa-trash-o"></i></a>
                                      </td>
                                  </tr>
                                @endforeach
                              </tbody>
                          </table>
                      </div>

                </div>
              </div>
          </div>
        </div>
  </div>

@endsection