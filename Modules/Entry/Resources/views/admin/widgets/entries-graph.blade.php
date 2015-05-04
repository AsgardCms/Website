<style>
    span.legend {
        width: 10px;
        height:10px;
        display: inline-block;
    }
</style>
<canvas width="409" height="204" style="width: 409px; height: 204px;" id="entries-graph"></canvas>
<ul>
    <li>
        <span class="legend" style="background:#F7464A;"></span> Total not invited ({{ $totalNotInvited }})
    </li>
    <li>
        <span class="legend" style="background:#FDB45C;"></span> Total accepted and not completed ({{ $totalAcceptedAndNotCompleted }})
    </li>
    <li>
        <span class="legend" style="background:#46BFBD;"></span> Total accepted and completed ({{ $totalAcceptedAndCompleted }})
    </li>
</ul>

<script>
    $( document ).ready(function() {
        var options = {
            segmentShowStroke : false,
            animationSteps : 100,
            animationEasing : "easeOutBounce",
            animateRotate : true,
            animateScale : false,
        };
        var data = [
            {
                value: {{ $totalNotInvited }},
                color:"#F7464A",
                highlight: "#FF5A5E",
                label: "Total not invited"
            },
            {
                value: {{ $totalAcceptedAndCompleted }},
                color: "#46BFBD",
                highlight: "#5AD3D1",
                label: "Total Accepted and Completed"
            },
            {
                value: {{ $totalAcceptedAndNotCompleted }},
                color: "#FDB45C",
                highlight: "#FFC870",
                label: "Total Accepted and not completed"
            }
        ]
        var ctx = $("#entries-graph").get(0).getContext("2d");
        var myPieChart = new Chart(ctx).Pie(data, options);
    });
</script>
