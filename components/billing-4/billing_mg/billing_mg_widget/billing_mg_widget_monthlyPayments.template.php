
<div class="head"><lang>آمار ماهیانه پرداخت ها (ضریب ۱۰۰۰)</lang></div>

<canvas id="canvas_daily" height="250" width="900"></canvas>

<script src="http://parsunix.com/cdn/js/chartjs/Chart.min.js" ></script>
<script>
	
	var barChartData_daily = {
		labels : [{list_of_days_str}],
		datasets : [
			{
				fillColor : "rgba(151,187,205,0.5)",
				strokeColor : "rgba(151,187,205,0.8)",
				highlightFill : "rgba(151,187,205,0.75)",
				highlightStroke : "rgba(151,187,205,1)",
				data : [{list_of_days_str_cost}]
			}
		]
	}

	window.onload = function(){
		var ctx_daily = document.getElementById("canvas_daily").getContext("2d");
		window.myBar = new Chart(ctx_daily).Bar(barChartData_daily, {
			responsive : true
		});
	}
	
</script>

