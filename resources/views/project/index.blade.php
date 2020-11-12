
@extends('layouts.app')

@section('content')

<div class="page-wrapper">
    <div class="message"></div>
    <div class="row page-titles">
      
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Projects</li>
            </ol>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row m-b-10"> 
            <div class="col-12">
                <?php if (!$user_type->contains('admin')){ ?>
 
                    <?php } else { ?>

                        <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" class="text-black"><i class="" aria-hidden="true"></i> Add Project </a></button>

                    <?php } ?>
            </div>
        </div>  


        <!-- Part 3 -->
        <div class="row">
            <div class="col-12">
                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white"> Project List                        
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive ">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Project Title</th>
                                        <th>Department </th>
                                        <th>Total Servers</th>
                                        
                                        <th>Action </th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Project Title</th>
                                        <th>Department </th>
                                        <th>Total Servers</th>
                                        
                                        <th>Action </th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                   <?php foreach($projects as $value): ?>
                                    <tr>
                                        <td><?php echo substr($value->title,0,50).'....' ?></td>
                                        <td>{{ $value->department->Title }}</td>
                                        
                                        
                                        <td> 
                                    <?php echo $value->project_server->pluck('project_id')->count(); ?>
                                        </td>
                                        
                                        <td class="jsgrid-align-center ">
                                            <a href="project/<?php echo base64_encode($value->id); ?>" title="Edit" class="btn btn-sm btn-info waves-effect waves-light"><i class="fa fa-pencil-square-o"></i></a>
                                            <a href="{{ route('project.delete',base64_encode($value->id))}}" title="Delete" onclick="alert('Are Yoy Want To Delet This Project!!!')" class="btn btn-sm btn-info waves-effect waves-light projectdelet"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of part 3 -->


        <!-- sample modal content -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1"><i class="fa-braille"></i> Add Project</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    {!! Form::open(['action' => 'App\Http\Controllers\ProjectController@store', 'method' => 'POST']) !!}

                   <!-- <form method="post" action="{{ route('project.add') }}" id="btnSubmit" enctype="multipart/form-data">-->
                        
                        <div class="modal-body">
                        <div class="row">
                           <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Project Title</label>
                                <input type="text" name="protitle" class="form-control" id="recipient-name1" minlength="8" maxlength="250" placeholder="">
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label">Department</label>
                                <select class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="prodepartment" required>
                                    
                                    <?Php foreach($departments as $value): ?>
                                             <option value="<?php echo $value->id ?>"><?php echo $value->Title ?></option>
                                            <?php endforeach; ?>


                                  
                                </select>
                            </div>
                        </div>                                            
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    {!! Form::close() !!}
                    <!--</form>-->
                </div>
            </div>
        </div>
        <!-- /.modal -->    

    </div>

</div>

@endsection