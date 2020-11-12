<link href="{{ asset('/css/submitT.css') }}" rel="stylesheet">

@extends('layouts.app')

@section('content')

@include('layouts.headers.cards')
 

        

       



<div class="container">
    
    <div class="row justify-content-center">
        
        <div class="col-md-8">
            
            <div class="card">
                <div id="pie_chart" style="width:700px; height:450px;">

                </div>
                <script type="text/javascript">
                    var analytics = <?php echo $envs; ?>
            
                    google.charts.load('current', {'packages':['corechart']});
                    google.charts.setOnLoadCallback(drawChart);
            
                    function drawChart()
                    {
                        var data = google.visualization.arrayToDataTable(analytics);
                        var options = {
                            title : 'Percentage of Enivronments Servers'
                        };
                        var chart = new google.visualization.PieChart(document.getElementById('pie_chart'));
                       
                       
                        chart.draw(data, options);

                     
                    }
                </script>

                <div class="card-header">{{ __('IP REFRENCES') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                            
                        </div>
                    @endif

                 

                    <br>
                    Information Security Center
                    
                
                </div>
            </div>
        </div>
    </div>
</div>

        </div>



@endsection

