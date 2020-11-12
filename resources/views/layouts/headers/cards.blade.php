<link href="{{ asset('/css/submitT.css') }}" rel="stylesheet">


<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
       
        <div class="header-body">
            <!-- Card stats -->
            
            <div class="row">
              
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                
                                <div class="col">
                                   
                                    
                                    <!-- total_production_servers" target="_blank -->
                                    <h5 class="card-title text-uppercase text-muted mb-0"><a href="">Total Production Servers</a></h5>
                                    <form method="post" action="{{ route('filter.servers') }}" id="btnSubmit" enctype="multipart/form-data">

                                        @csrf
                                        @method('put')
                                        <input type="hidden" name="envs" value="1">
                                        {!! csrf_field() !!}
                                        <button type="submit" class="submitLink">{{$cpr}}
                                        </button>
                                    </form>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                        <i class="fas fa-server"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm"></p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <!-- href for later v2 total_pam_accounts  target="_blank" -->
                                    <h5 class="card-title text-uppercase text-muted mb-0"><a href="">Total PAM Accounts</h5>
                                        <form method="post" action="{{ route('filter.servers') }}" id="btnSubmit" enctype="multipart/form-data">

                                            @csrf
                                            @method('put')
                                            <input type="hidden" name="envs" value="2">
                                            {!! csrf_field() !!}
                                            <button type="submit" class="submitLink">{{$cpam}}
                                            </button>
                                        </form>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                        <i class="fas fa-server"></i>
                                    </div>
                                </div>
                            </div>

                            <p class="mt-3 mb-0 text-muted text-sm"></p>
                            {{--                            For Later--}}
                            {{--                            <p class="mt-3 mb-0 text-muted text-sm">--}}
                            {{--                                <span class="text-success mr-2"><i class="fas fa-arrow-up"></i>increased 3.48%</span>--}}

{{--                                <span class="text-nowrap">Since last week</span>--}}
{{--                            </p>--}}
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <!--servers_without_pam  target="_blank -->

                                    <h5 class="card-title text-uppercase text-muted mb-0"><a href="">Servers without PAM</a></h5>
                                    <form method="post" action="{{ route('filter.servers') }}" id="btnSubmit" enctype="multipart/form-data">

                                        @csrf
                                        @method('put')
                                        <input type="hidden" name="envs" value="3">
                                        {!! csrf_field() !!}
                                        <button type="submit" class="submitLink">{{$cnopam}}
                                        </button>
                                    </form>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                        <i class="fas fa-server"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm"></p>

                            {{--                            <p class="mt-3 mb-0 text-muted text-sm">--}}
{{--                                <span class="text-warning mr-2"><i class="fas fa-arrow-down"></i>increased 1.10%</span>--}}
{{--                                <span class="text-nowrap">Since yesterday</span>--}}
{{--                            </p>--}}
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">SERVERS WITH GUARDIUM</h5>
                                    <form method="post" action="{{ route('filter.servers') }}" id="btnSubmit" enctype="multipart/form-data">

                                        @csrf
                                        @method('put')
                                        <input type="hidden" name="envs" value="4">
                                        {!! csrf_field() !!}
                                        <button type="submit" class="submitLink">{{$cguardium}}
                                        </button>
                                    </form>
                                  
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                        <i class="fas fa-database"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm"></p>

                            {{--                            <p class="mt-3 mb-0 text-muted text-sm">--}}
{{--                                <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>--}}
{{--                                <span class="text-nowrap">Since last month</span>--}}
{{--                            </p>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



