@extends('layouts.app')

@section('content')



<div class="page-wrapper">
    <div class="message"></div>
    <div class="row page-titles">
      
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Servers</li>
                
            </ol>
        </div>
    </div>

    
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-12">
                <div class="card card-outline-info">
                    <div class="card-header">
                        <a href="/addserver" class="btn btn-primary"><i class="fa fa-plus"></i>Add Server</a>

                       <!-- <button type="button" class="btn btn-primary"><i class="fa fa-plus"></i><a data-toggle="modal" data-target="#NewServersModal" data-whatever="@getbootstrap" class="text-black"><i class="" aria-hidden="true"></i> Add Server</a></button>
                       -->
                        <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a data-toggle="modal" data-target="#Filter" data-whatever="@getbootstrap" class="text-black"><i class="" aria-hidden="true"></i> Filter </a></button>

                    </div>
                    <div class="card-body">
                        
                        <div class="table-responsive ">
                            <table id="serversList" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="serversList" rowspan="1" colspan="1" aria-label="Employee Name: activate to sort column ascending" style="width: 211px;">IP Server</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="serversList" rowspan="1" colspan="1" aria-sort="ascending" aria-label="PIN: activate to sort column descending" style="width: 81px;">Title</th>
                                            <th class="sorting" tabindex="0" aria-controls="serversList" rowspan="1" colspan="1" aria-label="Email : activate to sort column ascending" style="width: 237px;">Type </th>
                                            <th class="sorting" tabindex="0" aria-controls="serversList" rowspan="1" colspan="1" aria-label="Contact : activate to sort column ascending" style="width: 132px;">Environment </th>
                                            <th class="sorting" tabindex="0" aria-controls="serversList" rowspan="1" colspan="1" aria-label="Contact : activate to sort column ascending" style="width: 132px;">Location </th>
                                            <th class="sorting" tabindex="0" aria-controls="serversList" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 108px;">Action</th>
                                        </tr>

                                    
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">IP server</th>
                                        <th rowspan="1" colspan="1">Title</th>
                                        <th rowspan="1" colspan="1">Type </th>
                                        <th rowspan="1" colspan="1">Environment </th><th rowspan="1" colspan="1">Location </th>
                                        <th rowspan="1" colspan="1">Action</th>
                                    </tr>

                                </tfoot>
                                <tbody>
                                    <?php
                            if(!empty($servers)) {
                                                                
                             foreach($servers as $value): ?>
                             <tr>
                            <td title="<?php echo $value->ip; ?>"><?php echo $value->ip; ?></td>
                                                               
                          <td><?php echo $value->title; ?></td>
                            <td><?php echo $value->ttitle; ?></td>
                           <td><?php echo $value->etitle; ?></td>
                            <td><?php echo $value->ltitle; ?></td>
                           <td class="jsgrid-align-center ">
                              <a href="servers/<?php echo base64_encode($value->id); ?>" title="Info" class="btn btn-sm btn-info waves-effect waves-light"><i class="fa fa-info-circle"></i></a>
                              <a href="" title="Edit"  class="btn btn-sm btn-info waves-effect waves-light updatingServer" data-id="<?php echo $value->id; ?>"><i class="fa fa-pencil-square-o"></i></a>

                              <a href="{{ route('servers.delete',base64_encode($value->id))}}" title="Delete" onclick="alert('Are Yoy Want To Delet This Server!!!')" class="btn btn-sm btn-info waves-effect waves-light projectdelet"><i class="fa fa-trash-o"></i></a>

                            </td>
                            </tr>
                             <?php endforeach;
                              } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                   
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
            <input type="hidden" name="id" value="">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
 

            </form> 
        </div>
    </div>
   
</div>
<!-- /.modal -->            
              
        

<div class="modal fade" id="Filter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
 
  
  
    <div class="modal-dialog" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel1">Filter</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
       
            <form method="post" action="{{ route('filter.servers') }}" id="btnSubmit" enctype="multipart/form-data">

                @csrf
                @method('put') 

                <div class="modal-body">
                    <div class="form-group">
                        <label for="ip-address" class="control-label">Pam</label>

                        <input type="checkbox" value="1" name="pam"><br />
                      <!-- <input type="text" name="ip" value="" class="form-control" id="ip-address">-->
                    </div>
                    <div class="form-group">
                        <label for="ip-address" class="control-label">Sysmon</label>

                        <input type="checkbox" value="1" name="sysmon"><br />
                    </div>
                    <div class="form-group">
                        <label for="ip-address" class="control-label">Guradium</label>

                        <input type="checkbox" value="1" name="guardium"><br />
                    </div>

                    <div class="form-group">
                        <label for="ip-address" class="control-label">Qradar</label>

                        <input type="checkbox" value="1" name="qradar"><br />
                    </div>
                    <div class="form-group col-md-3 m-t-20">
                        <label>Environment</label>
                        <select name="env" value="" class="form-control custom-select" required>
                            <option value="0">Select Environment</option>
                            
                             <option value="1">Production</option>
                             <option value="2">Staging</option>
                             <option value="3">Testing</option>


                             
                           
                        </select>
                    </div>
                    <div class="form-group col-md-3 m-t-20">
                        <label>Type</label>
                        <select name="type" value="" class="form-control custom-select" required>
                            <option value="0">Select Type</option>
                            
                             <option value="1">FrontEnd</option>
                             <option value="2">BackEnd</option>
                             <option value="3">DB</option>

                        </select>
                    </div>
                    <div class="form-group col-md-3 m-t-20">
                        <label>Location</label>
                        <select name="location" value="" class="form-control custom-select" required>
                            <option value="0">Select Location</option>
                            
                             <option value="1">DMZ</option>
                             <option value="2">DC</option>
                             <option value="3">DR</option>

                        </select>
                    </div>

                    <input type="submit" name="search" value="Search" /></td></tr>


                </div>

                

            </form> 
        </div>
    </div>
   
</div>
                           
                   
                                     		                                    
                                    

    


    <script>
        $('#serversList').DataTable({
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
       
            <form method="post" action="{{ route('update.ip', 0) }}" id="updateServer" enctype="multipart/form-data">

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
            $("body").on("click", ".updatingServer", function(e) {
           
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
@endsection






