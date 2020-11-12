@extends('layouts.app')

@section('content')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Users</h3>
                            </div>    


    <form class="row" method="post" action="{{ route('user.add') }}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group col-md-3 m-t-20">
            <label>First Name</label>
            <input type="text" name="fname" class="form-control form-control-line" placeholder="Your first name" minlength="2" required > 
        </div>
        <div class="form-group col-md-3 m-t-20">
            <label>Last Name </label>
            <input type="text" id="" name="lname" class="form-control form-control-line" value="" placeholder="Your last name" minlength="2" required> 
        </div>
      
        <div class="form-group col-md-3 m-t-20">
            <label>Department</label>
            <select name="dept" value="" class="form-control custom-select" required>
                
                
                <?Php foreach($deps as $value): ?>
                <option value='{{$value->id}}'>{{$value->Title}}</option>
                <?php endforeach; ?>
               
            </select>
        </div>
        
        <div class="form-group col-md-3 m-t-20">
            <label>Role </label>
            <select name="role" class="form-control custom-select" required>
                <?Php foreach($roles as $value): ?>
                <option value='{{$value->id}}'>{{$value->name}}</option>
                <?php endforeach; ?>
            </select>
        </div>
        
        <div class="form-group col-md-3 m-t-20">
            <label>Contact Number </label>
            <input type="text" name="contact" class="form-control" value="" placeholder="0512345678" minlength="10" maxlength="15" required> 
        </div>
        
        <div class="form-group col-md-3 m-t-20">
            <label>Username </label>
            <input type="text" name="username" class="form-control form-control-line" value="" placeholder="Username"> 
        </div>
        <div class="form-group col-md-3 m-t-20">
            <label>Password </label>
            <input type="password" name="password" class="form-control form-control-line" value="" placeholder=""> 
        </div>
        <div class="form-group col-md-3 m-t-20">
            <label>Email </label>
            <input type="email" id="example-email2" name="email" class="form-control" placeholder="email@moj.gov.sa" minlength="7" required > 
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
            <button type="submit" class="btn btn-info"> <i class="fa fa-check"></i> Save</button>
            <button type="button" class="btn btn-info">Cancel</button>
        </div>
    </form>
@endsection