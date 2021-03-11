google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
	var data = google.visualization.arrayToDataTable([
		['Month', 'Sales', 'Expenses'],
		['Jan',  100,       400],
		['Feb',  100,       460],
		['Mar',  660,       460],
		['Apr',  660,       460],
		['May',  660,       460],
		['Jun',  660,       460],
		['Jul',  660,       460],
		['Aug',  660,       460],
		['Sep',  660,       460],
		['Oct',  660,       460],
		['Nov',  660,       460],
		['Dec',  1000,      540]
	]);

	var options = {
		title: '',
		curveType: 'function',
		legend: { position: 'right' }
	};
	var chart = new google.visualization.LineChart(document.getElementById('curve-chart'));

	chart.draw(data, options);
}
