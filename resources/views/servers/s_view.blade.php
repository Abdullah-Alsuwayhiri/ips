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
                <li class="breadcrumb-item active">Server</li>
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
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab" style="font-size: 14px;"> Integration </a> </li>
                   
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

                                    <input type="text" class="form-control form-control-line" placeholder="ID" name="eid" value="{{$department ?? 'not exist'}}" readonly required > 
                                </div>
                                <div class="form-group col-md-4 m-t-10">
                                    <label>Project Name</label>
                                <input type="text" class="form-control form-control-line" placeholder="Your first name" name="fname" value="{{$projectName ?? 'not exist'}}" readonly minlength="3" required> 
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
                                <h3 class="card-title">More info</h3>
                                <form method="post" action="" id="btnSubmit" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')                                   
                                    <div class="form-group col-md-4 m-t-10">
                                        <label>Pam</label>
    
                                        <input type="text" class="form-control form-control-line" placeholder="ID" name="eid" value="{{$P ?? 'not exist'}}" readonly required > 
                                    </div>
                                    <div class="form-group col-md-4 m-t-10">
                                        <label>Guardium</label>
    
                                        <input type="text" class="form-control form-control-line" placeholder="ID" name="eid" value="{{$G ?? 'not exist'}}" readonly required > 
                                    </div>
                                    <div class="form-group col-md-4 m-t-10">
                                        <label>Qradar</label>
    
                                        <input type="text" class="form-control form-control-line" placeholder="ID" name="eid" value="{{$Q ?? 'not exist'}}" readonly required > 
                                    </div>
                                    <div class="form-group col-md-4 m-t-10">
                                        <label>Sysmon</label>
    
                                        <input type="text" class="form-control form-control-line" placeholder="ID" name="eid" value="{{$S ?? 'not exist'}}" readonly required > 
                                    </div>
	                                    
                                </form>
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
            <form method="POST" action="{{ route('project.update', $sid)  }}" autocomplete="off" enctype="multipart/form-data">

                @csrf
                @method('put')
                <div class="modal-body">
                <div class="row">
                   <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Project Title</label>
                    <input type="text" name="protitle" class="form-control" id="recipient-name1" minlength="8" maxlength="250" placeholder="" value="{{$thisproject->title ?? ''}}">
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label">Department</label>
                        <select class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="prodepartment" required>
                            
                           


                          
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






