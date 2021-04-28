<!DOCTYPE html>
<html lang="en">
<head>
  <title>COVID-19 Tracker</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
     .chart-container{
      position: relative;
      margin: auto;
      height: 10vh;
      width: auto;
    }
</style>
</head>
<body>

<div class="container-fluid">
  <div class="jumbotron" style="text-align: center;">
    <h1>COVID 19 TRACKER</h1>      
    <p>Numbers that matter.</p>
  </div>
  <div class="row">
      <div class="col-3">
        <button class="btn btn-primary" onclick="getData()">
            GET DATA
        </button>
        <div class="form-group">
            <label for="state">Select state:</label>
            <select class="form-control" id="state" name="state" onchange="changeState()">
            </select>
        </div>
        <div class="form-group">
            <label for="district">Select district:</label>
            <select class="form-control" id="district" name="district" onchange="changeDistrict()">
            </select>
        </div>
      </div>
      <div class="col-9">
        <div class="chart-container">

        </div>
      </div>
  </div>     
</div>
<script>
    
    function changeDistrict(){
        let districtSelected=decodeURIComponent($('#district').val());
        let stateSelected=decodeURIComponent($('#state').val());
        // alert(districtSelected);
        let districtData={...$global_data[stateSelected]['districtData'][districtSelected]};
        let chartLabels=['active','deceased','confirmed','recovered'];
        let chartData=[];
        chartLabels.forEach(label=>{
            chartData.push(districtData[label]);
        })
        document.querySelector('.chart-container').innerHTML=`<canvas id="pieChart"  style="height: 10vh;width: auto;"></canvas>`;
        let myChart = document.getElementById('pieChart').getContext('2d');
        let massPopChart = new Chart(myChart, {
            type:'pie', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
            data:{
                labels:chartLabels,
                datasets:[{
                label:'Case Study',
                data:chartData,
                //backgroundColor:'green',
                backgroundColor:[
                    'rgba(255, 99, 132, 0.9)',
                    'rgba(154, 162, 235, 0.9)',
                    'rgba(255, 206, 86, 0.9)',
                    'rgba(75, 192, 192, 0.9)',
                ],
                borderWidth:1,
                borderColor:'#777',
                hoverBorderWidth:3,
                hoverBorderColor:'#000'
                }]
            },
            options:{
                title:{
                display:true,
                text:`Cases in ${decodeURIComponent(districtSelected)}-${decodeURIComponent(stateSelected)}`,
                fontSize:25
                },
                legend:{
                display:true,
                position:'right',
                labels:{
                    fontColor:'#000'
                }
                },
                layout:{
                padding:{
                    left:50,
                    right:0,
                    bottom:0,
                    top:0
                }
                },
                tooltips:{
                enabled:true
                }
            }
            });
    }

    $global_data={};
    function changeState(){
        let stateSelected=decodeURIComponent($('#state').val());
        let districtsData={...$global_data[stateSelected]['districtData']};
        // console.log(districtsData);
        document.getElementById('district').innerHTML='';
        let districtNames=Object.keys(districtsData);
        let districtOptions=``;
        districtNames.forEach(district=>{
            districtOptions+=`<option value="`+encodeURIComponent(district)+`">`+district+`</option>`
        })
        document.getElementById('district').innerHTML+=districtOptions;
    }

    function getData(){
        // alert('GET DATA');
        var url='https://api.covid19india.org/state_district_wise.json';
        $.getJSON(url,function(data){
            if(typeof(data)==undefined){
                alert('ERROR IN RECEIVING DATA')
            }else{
                // alert('DATA RECEIVED SUCCESSFULLY');
                // console.log('Fetched data succesffully');
                // console.log(data);
                $global_data=data;
                document.getElementById('state').innerHTML=``;
                let stateNames=Object.keys($global_data);
                let stateOptions=``;
                stateNames.forEach(state=>{
                    stateOptions+=`<option value="`+encodeURIComponent(state)+`">`+state+`</option>`
                })
                document.getElementById('state').innerHTML+=stateOptions;
            }
        })
    }
</script>
</body>
</html>
