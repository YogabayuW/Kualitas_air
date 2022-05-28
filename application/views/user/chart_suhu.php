<div>
    <canvas id="mine" style="height: 300px;"></canvas>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script>
    var myChart1 = document.getElementById('mine').getContext('2d');

    var massPopChart = new Chart(myChart1, {
    type:'line', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
    data:{
        labels:[
            <?php foreach ($date as $d) {
                echo "'".$d. "', ";
            }?>
        ],
        // labels:['Boston', 'Worcester', 'Springfield', 'Lowell', 'Cambridge', 'New Bedford'],
        datasets:[{
        label:'Suhu',
        data:[
            <?php foreach ($derajat as $j) {
                echo "'".$j. "', ";
            }?>
        ],
        // data:[
        //     617594,
        //     181045,
        //     153060,
        //     106519,
        //     105162,
        //     95072
        // ],
        // fill: false,
        backgroundColor: 'rgba(255,0,0,0.4)',
        borderColor: 'rgba(204,0,0,1)',
        borderWidth:3,
        // borderColor:'#777',
        hoverBorderWidth:5,
        hoverBorderColor:'#000'
        }]
    },
    options:{
        title:{
        display:true,
        fontSize:25,
        responsive: true
        },
        showline: true,
        animation:{
            duration:0
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
        enabled:true}}
});
</script>