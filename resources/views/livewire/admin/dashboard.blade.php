<div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <div class="grid md:grid-cols-2 grid-cols-1">
        <!-- Bar chart -->
        <div class="shadow-lg rounded-lg overflow-hidden">
            <div class="py-3 px-5 bg-gray-50">Bar chart</div>
            <canvas class="p-10" id="chartBar"></canvas>
        </div>
        <!-- end of barchart -->
        <!-- pie chart -->
        <div class="shadow-lg rounded-lg ">
            <div class="py-3 px-5 bg-gray-50">Pie chart</div>
            <canvas class="p-10" id="chartPie"></canvas>
        </div>
        <!-- pie chart end -->
        <!-- Graph -->
        <div class="shadow-lg rounded-lg">
            <div class="py-3 px-5 bg-gray-50">Graph chart</div>
            <canvas id="graph" class="p-10"></canvas>
        </div>
    </div>
    <!-- Chart bar -->
    <script>
        const labelsBarChart = [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "May",
        "Augest",
        "September",
        "October",
        "November",
        "December",
        ];
        const dataBarChart = {
        labels: labelsBarChart,
        datasets: [
            {
            label: "My First dataset",
            backgroundColor: "hsl(252, 82.9%, 67.8%)",
            borderColor: "hsl(252, 82.9%, 67.8%)",
            data: {{$data}},
            },
        ],
        };
    
        const configBarChart = {
        type: "bar",
        data: dataBarChart,
        options: {},
        };
    
        var chartBar = new Chart(
        document.getElementById("chartBar"),
        configBarChart
        );
    </script>
    <!-- End of Barchart -->

    <!-- Chart pie -->
    <script>
        const dataPie = {
        labels: ["JavaScript", "Python", "Ruby","Php"],
        datasets: [
            {
            label: "My First Dataset",
            data: [30, 50, 100,60],
            backgroundColor: [
                "rgb(133, 105, 241)",
                "rgb(164, 101, 241)",
                "rgb(101, 143, 241)",
                "rgb(200, 143, 76)",
            ],
            hoverOffset: 4,
            },
        ],
        };
        const configPie = {
        type: "pie",
        data: dataPie,
        options: {
            tooltips: {
                enabled:true
            }
           },
          };
        var chartBar = new Chart(document.getElementById("chartPie"), configPie);
    </script>
    <!-- end of pie -->
    <!-- Graph -->
    <script>
        var xValues = [100,200,300,400,500,600,700,800,900,1000];

        new Chart("graph", {
        type: "line",
        data: {
            labels: xValues,
            datasets: [{ 
            data: [860,1140,1060,1060,1070,1110,1330,2210,7830,2478],
            borderColor: "red",
            fill: false
            }, { 
            data: [1600,1700,1700,1900,2000,2700,4000,5000,6000,7000],
            borderColor: "green",
            fill: false
            }, { 
            data: [300,700,2000,5000,6000,4000,2000,1000,200,100],
            borderColor: "blue",
            fill: false
            }]
        },
        options: {
            legend: {display: false}
        }
        });
    </script>
</div>