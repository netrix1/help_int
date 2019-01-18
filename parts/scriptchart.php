		<script type="text/javascript">
			var randomScalingFactor = function() {
				return Math.round(Math.random() * 100);
			};
			var color = Chart.helpers.color;
			
			/*line chart*/
			var config = {
				type: 'line',
				data: {
					labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
					datasets: [{
						label: 'Server 1',
						backgroundColor: window.chartColors.red,
						borderColor: window.chartColors.red,
						data: [
							randomScalingFactor(),
							randomScalingFactor(),
							randomScalingFactor(),
							randomScalingFactor(),
							randomScalingFactor(),
							randomScalingFactor(),
							randomScalingFactor()
						],
						borderWidth: 2,
						// pointRadius: 5,
						fill: false,
					}, {
						label: 'Server 2',
						fill: false,
						backgroundColor: window.chartColors.blue,
						borderColor: window.chartColors.blue,
						data: [
							randomScalingFactor(),
							randomScalingFactor(),
							randomScalingFactor(),
							randomScalingFactor(),
							randomScalingFactor(),
							randomScalingFactor(),
							randomScalingFactor()
						],
						// pointRadius: 5,
						borderWidth: 2,
					}]
				},
				options: {
					responsive: true,
					title: {
						display: false,
						text: 'Chart.js Line Chart'
					},
					
						legend: {
							labels: {
								usePointStyle: true
							}
						},
					tooltips: {
						mode: 'index',
						intersect: false,
					},
					hover: {
						mode: 'nearest',
						intersect: true
					},
					scales: {
						xAxes: [{
							display: true,
							gridLines: {
								display: true,
								drawBorder: true,
								drawOnChartArea: false,
							}
						}],
						yAxes: [{
							display: true,
							gridLines: {
								display: true,
								drawBorder: true,
								drawOnChartArea: false,
							} 
						}]
					}
				}
			};
			
			/*end line chart*/
			
			/*doughnut chart*/
			
			var doughnutChart = {
				type: 'doughnut',
				data: {
					datasets: [{
						data: [
							randomScalingFactor(),
							randomScalingFactor(),
							randomScalingFactor(),
							randomScalingFactor(),
							randomScalingFactor(),
							randomScalingFactor(),
						],
						backgroundColor: [
							window.chartColors.yellow,
							window.chartColors.orange,
							window.chartColors.red,
							window.chartColors.green,
							window.chartColors.blue,
							window.chartColors.grey
						],
						label: 'Dataset 1'
					}],
					labels: [
						'Chrome',
						'Firefox',
						'Opera',
						'Navigator',
						'Safari',
						'IE'
					]
				},
				options: {
					responsive: true,
					maintainAspectRatio: false,
					legend: {
						position: 'right',
					},
					title: {
						display: false,
						text: 'Chart.js Doughnut Chart'
					},
					animation: {
						animateScale: true,
						animateRotate: true
					}
				}
			};
			/*end doughnut chart*/
			
			/*load all chart*/
			window.onload = function() {
				/*line chart*/
				var ctx = document.getElementById('serverLoad').getContext('2d');
				window.myLine = new Chart(ctx, config);
				/*end line chart*/
			
				/*doughnut chart*/
				var ctx = document.getElementById('donut').getContext('2d');
				window.myDoughnut = new Chart(ctx, doughnutChart);
				/*end doughnut chart*/
			
			};
			
		</script>