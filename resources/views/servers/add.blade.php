@extends('layouts.app')

@section('content')

    <div class="container-fluid mt--7">
        <script>
            $(document).ready(function(){
                $('.form-input').inputmask({
                    alias: "ip",
                    greedy: false //The initial mask shown will be "" instead of "-____".
                });
               
            });
        </script>
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">SERVERS</h3>
                            </div>    


        <form class="row" method="post" action="{{ route('create.ip') }}" id="btnSubmit" enctype="multipart/form-data">

        @csrf
        @method('put') 
        <div class="form-group col-md-3 m-t-20">
            <label>IP</label>
            <input type="text" class="form-control" id="ipv4" name="ipv4" placeholder="xxx.xxx.xxx.xxx"/>
        </div>

        <div class="form-group col-md-3 m-t-20">
            <label> Title </label>
            <input type="text" name="ip-title" value="" class="form-control" id="ip-title">
        </div>
      
        <div class="form-group col-md-3 m-t-20">
            <label>Type</label>
            <select class="form-control custom-select" name="ip-type" data-placeholder="Choose a Category" tabindex="1" value="" required>
                <?Php foreach($types as $value): ?>
                         <option value="<?php echo $value->id ?>"><?php echo $value->title ?></option>
                        <?php endforeach; ?>
            </select>
        </div>
        
        <div class="form-group col-md-3 m-t-20">
            <label>Environment </label>
            <select class="form-control custom-select" name="ip-env" data-placeholder="Choose a Category" tabindex="1" value="" required>
                <?Php foreach($envs as $value): ?>
                <option value="<?php echo $value->id ?>"><?php echo $value->title ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        
        <div class="form-group col-md-3 m-t-20">
            <label>Location </label>
            <select class="form-control custom-select" name="ip-location" data-placeholder="Choose a Category" tabindex="1" value="" required>
                <?Php foreach($locations as $value): ?>
                <option value="<?php echo $value->id ?>"><?php echo $value->title ?></option>
               <?php endforeach; ?>
            </select>
        </div>
        
        <div class="form-group col-md-3 m-t-20">
            <label>PAM </label>
            <select class="form-control custom-select" name="pam" data-placeholder="Choose a Category" tabindex="1" value="" required>
                            
                <option value="0">No</option>
                <option value="1">Yes</option>
                        
            </select>        
        </div>
        <div class="form-group col-md-3 m-t-20">
            <label>SYSMON </label>
            <select class="form-control custom-select" name="sysmon" data-placeholder="Choose a Category" tabindex="1" value="" required>
                            
                <option value="0">No</option>
                <option value="1">Yes</option>
                        
            </select>
        </div>
        <div class="form-group col-md-3 m-t-20">
            <label>GUARDIUM </label>
            <select class="form-control custom-select" name="guardium" data-placeholder="Choose a Category" tabindex="1" value="" required>
                            
                <option value="0">No</option>
                <option value="1">Yes</option>
                        
            </select>
        </div>
        <div class="form-group col-md-3 m-t-20">
            <label>QRADAR </label>
            <select class="form-control custom-select" name="qradarin" data-placeholder="Choose a Category" tabindex="1" value="" required>
                            
                <option value="0">No</option>
                <option value="1">Yes</option>
                        
            </select>
        </div><!--
        <div class="form-group col-md-3 m-t-20">
            <label>Password </label>
            <input type="text" name="password" class="form-control" value="" placeholder="**********"> 
        </div>
        <div class="form-group col-md-3 m-t-20">
            <label>Confirm Password </label>
            <input type="text" name="confirm" class="form-control" value="" placeholder="**********"> 
        </div>-->
       
        <div class="form-actions col-md-12">
            <input type="hidden" name="id" value="00">

            <button type="submit" class="btn btn-info"> <i class="fa fa-check"></i> Save</button>
            <button type="button" class="btn btn-info"><a href="servers" class="text-primary text-white">Cancel</a></button>
        </div>
    </form>

    
@endsection