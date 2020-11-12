@extends('layouts.app')

@section('content')


<script>
function setEventId(event_id){
    document.querySelector("#event_id").innerHTML = event_id;
}
</script>
<div class="page-wrapper">
    <div class="message"></div>
    <div class="row page-titles">
      
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Project</li>
                <li class="breadcrumb-item active">Info</li>
            </ol>
        </div>
    </div>

    
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-xlg-12 col-md-12">
                <div class="card">
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs profile-tab" role="tablist">
                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab" style="font-size: 14px;">  Basic Info </a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab" style="font-size: 14px;"> Managers </a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#servers" role="tab" style="font-size: 14px;"> Servers</a> </li>
                   
                </ul>

                  <!-- Tab panes -->

    <div class="tab-content">
        <div class="tab-pane active" id="home" role="tabpanel">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                            <form class="row" action="Update" method="post" enctype="multipart/form-data">
                                
                                <div class="form-group col-md-4 m-t-10">
                                    <label>Department</label>

                                    <input type="text" class="form-control form-control-line" placeholder="ID" name="eid" value="{{$thisproject->department->Title}}" readonly required > 
                                </div>
                                <div class="form-group col-md-4 m-t-10">
                                    <label>Project Name</label>
                                <input type="text" class="form-control form-control-line" placeholder="Your first name" name="fname" value="{{$thisproject->title}}" readonly minlength="3" required> 
                                </div>
                                <div class="form-actions col-md-12">
                                    <input type="hidden" name="emid" value="id المشروع">
                                    <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a data-toggle="modal" data-target="#TitlesModal" data-whatever="@getbootstrap" class="text-black"><i class="" aria-hidden="true"></i> Edi </a></button>

                                  
                                </div>
                              
                            </form>
                        </div>

                    </div>
                </div>
        </div>

        

        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Current Managers</h3>
                <form method="post" action="{{ route('managers.add') }}" id="btnSubmit" enctype="multipart/form-data">
                    @csrf
                    @method('put')                                    <div class="form-group">
                        <label class="control-label">Owner</label>
                            
                            
                    <input type="text" class="form-control form-control-line" value="{{$owner}}" readonly>

                        
                    </div>


                    <div class="form-group">
                        <label class="control-label">Product Manager</label>
                       
                        <input type="text" class="form-control form-control-line" value = "{{$prm}}" readonly>

                    </div>

                    <div class="form-group">
                        <label class="control-label">Technical Manager</label>
                          
                            
                    <input type="text" class="form-control form-control-line" value = "{{$techm}}" readonly>
      

                        
                    </div>
   
                                                                 
                   
                                                                
                </form>
            </div>
        </div>
        </div>
                  
              
        
         
                    <!--second tab-->
                    <div class="tab-pane" id="profile" role="tabpane2">
                        
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Managers</h3>
                                <form method="post" action="{{ route('managers.add') }}" id="btnSubmit" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')                                    <div class="form-group">
                                        <label class="control-label">Owner</label>
                                        <select class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="pro" required>
                                            
                                            <?Php foreach($users as $value): ?>
                                                     <option value="<?php echo $value->id ?>"><?php echo $value->fname .' '. $value->lname ?></option>
                                                    <?php endforeach; ?>
    
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label">Product Manager</label>
                                        <select class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="prm" required>
                                            
                                            <?Php foreach($users as $value): ?>
                                                     <option value="<?php echo $value->id ?>"><?php echo $value->fname .' '. $value->lname ?></option>
                                                    <?php endforeach; ?>
    
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Technical Manager</label>
                                        <select class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="prt" required>
                                            
                                            <?Php foreach($users as $value): ?>
                                                     <option value="<?php echo $value->id ?>"><?php echo $value->fname .' '. $value->lname ?></option>
                                                    <?php endforeach; ?>
    
                                        </select>
                                    </div>
                   
                                     		                                    
                                    <div class="form-actions col-md-12">
                                        <input type="hidden" name="rid" value="">
                                        <input type="hidden" name="id" value={{$prid}}>                                                    
                                        <button type="submit" class="btn btn-info"> <i class="fa fa-check"></i> Save</button>
                                    </div>
                                    		                                    
                                </form>
                            </div>
                        </div>
                    </div>



                     <!--third tab-->
                    <div class="tab-pane" id="servers" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                
                                <div class="row m-b-10"> 
                                    <div class="col-12">
                                        <!--<button type="button" class="btn btn-primary" id="myBtn"> Add Server</button>
                                        -->
                                        <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a data-toggle="modal" data-target="#ServersModal" data-whatever="@getbootstrap" class="text-black"><i class="" aria-hidden="true"></i> Assign Servers</a></button>
                                        <button type="button" class="btn btn-primary"><i class="fa fa-plus"></i><a data-toggle="modal" data-target="#NewServersModal" data-whatever="@getbootstrap" class="text-black"><i class="" aria-hidden="true"></i> Add Servers</a></button>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="card card-outline-info">
                                            <!--<div class="card-header">
                                                <h4 class="m-b-0 text-black"><i class="mdi-server" aria-hidden="true"></i> Servers List</h4>
                                            </div> -->

                                            <div class="card-body">
                                                <div class="table-responsive ">
                                                    <table id="employees123" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                        <thead>
                                                            <tr role="row"><th class="sorting" tabindex="0" aria-controls="employees123" rowspan="1" colspan="1" aria-label="Employee Name: activate to sort column ascending" style="width: 211px;">IP Server</th><th class="sorting_asc" tabindex="0" aria-controls="employees123" rowspan="1" colspan="1" aria-sort="ascending" aria-label="PIN: activate to sort column descending" style="width: 81px;">Title</th><th class="sorting" tabindex="0" aria-controls="employees123" rowspan="1" colspan="1" aria-label="Email : activate to sort column ascending" style="width: 237px;">Type </th><th class="sorting" tabindex="0" aria-controls="employees123" rowspan="1" colspan="1" aria-label="Contact : activate to sort column ascending" style="width: 132px;">Environment </th><th class="sorting" tabindex="0" aria-controls="employees123" rowspan="1" colspan="1" aria-label="Contact : activate to sort column ascending" style="width: 132px;">Location </th><th class="sorting" tabindex="0" aria-controls="employees123" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 108px;">Action</th></tr>
                                                        </thead>
                                                        <tfoot>
                                                               <tr><th rowspan="1" colspan="1">IP server</th><th rowspan="1" colspan="1">Title</th><th rowspan="1" colspan="1">Type </th><th rowspan="1" colspan="1">Environment </th><th rowspan="1" colspan="1">Location </th><th rowspan="1" colspan="1">Action</th></tr>
                                                        </tfoot>
                                                        <tbody>

                                                            <?php
                                                            if(!empty($ipsdetials)) {
                                                                
                                                                foreach($ipsdetials as $value): ?>
                                                            <tr>
                                                                <td title="<?php echo $value->ip; ?>"><?php echo $value->ip; ?></td>
                                                               
                                                                <td><?php echo $value->title; ?></td>
                                                                <td><?php echo $value->ttitle; ?></td>
                                                                <td><?php echo $value->etitle; ?></td>
                                                                <td><?php echo $value->ltitle; ?></td>
                                                                <td class="jsgrid-align-center ">
                                                                    <a href="" title="Edit"  class="btn btn-sm btn-info waves-effect waves-light holiday" data-id="<?php echo $value->id; ?>"><i class="fa fa-pencil-square-o"></i></a>
                                                                    <a href="{{ route('project_server.delete', $value->id) }}" class='btn btn-sm btn-info waves-effect waves-light'><i class="fa fa-trash-o"></i></a>


                                                                  
                                                                </td>
                                                            </tr>
                                                            <?php endforeach;
                                                            } ?>
                                                        </tbody>
                                                    </div>    
                                                          
                                                </table>
                                                   
                                                
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             
                    

                            </div>
                        </div>
                        
                      
                    </div>



                    

            
       

    </div>
    


<!-- sample modal content -->
<div class="modal fade" id="TitlesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel1"><i class="fa-braille"></i> Edit Project</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form method="POST" action="{{ route('project.update', $prid)  }}" autocomplete="off" enctype="multipart/form-data">

                @csrf
                @method('put')
                <div class="modal-body">
                <div class="row">
                   <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Project Title</label>
                    <input type="text" name="protitle" class="form-control" id="recipient-name1" minlength="8" maxlength="250" placeholder="" value="{{$thisproject->title}}">
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
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- /.modal -->  


 
</div>

 <!-- New Servers modal content -->

 <div class="modal fade" id="NewServersModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
 
    <script>
        $(document).ready(function(){
            $('.form-input').inputmask({
                alias: "ip",
                greedy: false //The initial mask shown will be "" instead of "-____".
            });
           
        });
    </script>
  
  
    <div class="modal-dialog" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel1">Add New IP Sever</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
       
            <form method="post" action="{{ route('create.ip') }}" id="btnSubmit" enctype="multipart/form-data">

                @csrf
                @method('put') 

            <!--<form method="post" action="add_Desciplinary" id="btnSubmit" enctype="multipart/form-data">-->
            <div class="modal-body">
                    <div class="form-group">
                        <label for="ip-address" class="control-label">IP</label>

                        <input type="text" class="form-input" id="ipv4" name="ipv4" placeholder="xxx.xxx.xxx.xxx"/>
                       <!-- <input type="text" name="ip" value="" class="form-control" id="ip-address">-->
                    </div>
                    <div class="form-group">
                        <label for="ip-title" class="control-label">Title</label>
                        <input type="text" name="ip-title" value="" class="form-control" id="ip-title">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Type</label>
                        <select class="form-control custom-select" name="ip-type" data-placeholder="Choose a Category" tabindex="1" value="" required>
                            <?Php foreach($types as $value): ?>
                                     <option value="<?php echo $value->id ?>"><?php echo $value->title ?></option>
                                    <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Environment</label>
                        <select class="form-control custom-select" name="ip-env" data-placeholder="Choose a Category" tabindex="1" value="" required>
                            <?Php foreach($envs as $value): ?>
                            <option value="<?php echo $value->id ?>"><?php echo $value->title ?></option>
                           <?php endforeach; ?>
                        </select>
                    </div>
                   
                    <div class="form-group">
                        <label class="control-label">Location</label>
                        <select class="form-control custom-select" name="ip-location" data-placeholder="Choose a Category" tabindex="1" value="" required>
                            <?Php foreach($locations as $value): ?>
                            <option value="<?php echo $value->id ?>"><?php echo $value->title ?></option>
                           <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label">PAM</label>
                        <select class="form-control custom-select" name="pam" data-placeholder="Choose a Category" tabindex="1" value="" required>
                            
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                                    
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">SYSMON</label>
                        <select class="form-control custom-select" name="sysmon" data-placeholder="Choose a Category" tabindex="1" value="" required>
                            
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                                    
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">GUARDIUM</label>
                        <select class="form-control custom-select" name="guardium" data-placeholder="Choose a Category" tabindex="1" value="" required>
                            
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                                    
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label">QRADAR</label>
                        <select class="form-control custom-select" name="qradarin" data-placeholder="Choose a Category" tabindex="1" value="" required>
                            
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                                    
                        </select>
                    </div>
                    
                
            </div>
            <div class="modal-footer">
            <input type="hidden" name="id" value="{{$prid}}">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
 

            </form> 
        </div>
    </div>
   
</div>
<!-- /.modal -->

 <!-- Update Servers modal content -->

 <div class="modal fade" id="UpdateServersModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
 
    <script>
        $(document).ready(function(){
            $('.form-input').inputmask({
                alias: "ip",
                greedy: false //The initial mask shown will be "" instead of "-____".
            });
           
        });
    </script>
  

    <div class="modal-dialog" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h4 class="modal-title" id="UpdateServersModalLabel1">Update Sever</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
       
            <form method="post" action="{{ route('update.ip', $prid) }}" id="updateServer" enctype="multipart/form-data">

                @csrf
                @method('put') 

            <!--<form method="post" action="add_Desciplinary" id="btnSubmit" enctype="multipart/form-data">-->
            <div class="modal-body">
                    <div class="form-group">
                        <label for="ip-address" class="control-label">IP</label>

                        <input type="text" class="form-input" id="ipv4" name="ipv4" value = "">
                       <!-- <input type="text" name="ip" value="" class="form-control" id="ip-address">-->
                    </div>
                    <div class="form-group">
                        <label for="ip-title" class="control-label">Title</label>
                        <input type="text" name="ip-title" value="" class="form-control" id="ip-title">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Type</label>
                        <select class="form-control custom-select" name="ip-type" data-placeholder="Choose a Category" tabindex="1" value="" required>
                            <?Php foreach($types as $value): ?>
                                     <option value="<?php echo $value->id ?>"><?php echo $value->title ?></option>
                                    <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Environment</label>
                        <select class="form-control custom-select" name="ip-env" data-placeholder="Choose a Category" tabindex="1" value="" required>
                            <?Php foreach($envs as $value): ?>
                            <option value="<?php echo $value->id ?>"><?php echo $value->title ?></option>
                           <?php endforeach; ?>
                        </select>
                    </div>
                   
                    <div class="form-group">
                        <label class="control-label">Location</label>
                        <select class="form-control custom-select" name="ip-location" data-placeholder="Choose a Category" tabindex="1" value="" required>
                            <?Php foreach($locations as $value): ?>
                            <option value="<?php echo $value->id ?>"><?php echo $value->title ?></option>
                           <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label">PAM</label>
                        <select class="form-control custom-select" name="pam" data-placeholder="Choose a Category" tabindex="1" value="" required>
                            
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                                    
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">SYSMON</label>
                        <select class="form-control custom-select" name="sysmon" data-placeholder="Choose a Category" tabindex="1" value="" required>
                            
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                                    
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">GUARDIUM</label>
                        <select class="form-control custom-select" name="guardium" data-placeholder="Choose a Category" tabindex="1" value="" required>
                            
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                                    
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label">QRADAR</label>
                        <select class="form-control custom-select" name="qradarin" data-placeholder="Choose a Category" tabindex="1" value="" required>
                            
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                                    
                        </select>
                    </div>
                    
                
            </div>
            <div class="modal-footer">
                <input type="hidden" id="sid" name="sid" value = "" readonly>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
 

            </form> 
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $("body").on("click", ".holiday", function(e) {
           
                e.preventDefault(e);
                // Get the record's ID via attribute  
                var id = $(this).attr('data-id');
                var urll = '{{ route("name", ":id") }}';
                urll = urll.replace(':id',id);

               
               // alert(id);
               // alert(id);
                $('#updateServer').trigger("reset");
                $('#UpdateServersModal').modal('show');
              
                $.ajax({
                method: 'GET',
              
                url: urll,
                
                
                   
               
              
                dataType: "json",
                
            }).done(function (response) {
                console.log(response);
                 //   alert(response);
                    $('#updateServer').find('[name="ip-title"]').val(response.title).end();
                    $('#updateServer').find('[name="ipv4"]').val(response.ip).end();
                    $('#updateServer').find('[name="ip-type"]').val(response.typeid).end();
                    $('#updateServer').find('[name="ip-env"]').val(response.env).end();
                    $('#updateServer').find('[name="ip-location"]').val(response.location).end();
                   // $('#ip-title').text(response.name);       
                   $('#updateServer').find('[name="qradarin"]').val(response.cqradar).end();
                    $('#updateServer').find('[name="pam"]').val(response.cpam).end();
                    $('#updateServer').find('[name="sysmon"]').val(response.csysmon).end();
                    $('#updateServer').find('[name="guardium"]').val(response.cguardium).end();
                    $('#updateServer').find('[name="sid"]').val(response.serverID).end();    
            	});
             });
       });
</script>  
</div>
<!-- /.modal -->

<!-- servers modal content -->
<div class="modal fade" id="ServersModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <script>
        function selectAll( obj_arr ){
            
            for ( var i = 0; i < obj_arr.length; i++ ){
            
                obj_sel = document.getElementById( obj_arr[i] );
                
                for( var j = 0; j < obj_sel.options.length; j++ ){
                    obj_sel.options[j].selected = true;
                }
                
            }
            
            }
        function move( id_1, id_2 ){
                var opt_obj = document.getElementById( id_1 );
      
                //the box where the value will be locationd
                var sel_obj = document.getElementById( id_2 );
                for ( var i = 0; i < opt_obj.options.length; i++ ){
                    if ( opt_obj.options[i].selected == true ){
                        //value to be transfered
                        var selected_text = opt_obj.options[i].text;
                        var selected_value = opt_obj.options[i].value;
                        
                        //remove from opt
                        opt_obj.remove( i );
                        //decrease value of i since an option was removed 
                        //therefore the opt_obj.options.length will also decrease
                        i--;
                         //process to sel
                        var new_option_index = sel_obj.options.length;
                        sel_obj.options[new_option_index] = new Option( selected_text, selected_value );

                    }
                } 
            }

        </script>
    
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel1"><i class="fa-braille"></i> Edit Project Servers</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form method="POST" action="{{ route('projectServers.update', $prid)  }}" autocomplete="off" enctype="multipart/form-data" onsubmit="return selectAll( new Array( 'location_right','location_left' ) );">

                @csrf
                @method('put')
                <div class="modal-body">
                <div class="row">
                    <!-- left select box -->
                    <div class='select_box'>
                        <div class='select_title'>Available IPs</div>
                        <div style='clear:both;'></div>
                        <select name='location_left[]' id='location_left' size='7' multiple='multiple'>
                  
                            <?Php foreach($ips as $value): ?>
                            <option value='{{$value->id}}'>{{$value->ip}}</option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- direction move buttons -->
                    <div class='btn'>
                        <!-- option move to right button -->
                        <button type="button" onclick="move( 'location_left', 'location_right' )"> >  </button>
                        <br />
                        <!-- option move to left button -->
                        <button type="button" onclick="move( 'location_right', 'location_left' )">  <  </button>
                    </div>

                    <!-- right select box -->
                    <div class='select_box'>
                        <div class='select_title'>Assigned IPs</div>
                        <div style='clear:both;'></div>
                        <select name='location_right[]' id='location_right' size='7' multiple='multiple'>
                            <?Php foreach($allprojectserver as $value): ?>
                            <option value='{{$value->id}}'>{{$value->ip}}</option>
                            <?php endforeach; ?>
                        </select>

                    </div>
                
                
                </div>                                            
            
                <div style='clear:both;'></div>
                <input type='submit' value='Save' />
                 
            
            
            
            </form>
             
        </div>
        
    </div>
   
    
   
</div>


<!-- /.modal --> 

<script>
    $('#employees123').DataTable({
        "aaSorting": [[1,'asc']],
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    });
</script>


@endsection






