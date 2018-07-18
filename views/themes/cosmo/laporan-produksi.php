<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script type="text/javascript">
var f=jQuery.noConflict();
f(function () {
f('#grafik').highcharts({
chart: {
zoomType: 'x',
type : 'coloumn'
},
title: {
text: 'Statistik Laporan Produksi'
},
xAxis: {
type: 'datetime'
},
yAxis: {
title: {
text: 'Laporan Produksi'
}
},
legend: {
enabled: false
},
plotOptions: {
area: {
fillColor: {
linearGradient: {
x1: 0,
y1: 0,
x2: 0,
y2: 1
},
stops: [
[0, Highcharts.getOptions().colors[0]],
[1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
]
},
marker: {
radius: 2
},
lineWidth: 1,
states: {
hover: {
lineWidth: 1
}
},
threshold: null
}
},
series: [{
type: 'area',
name: 'Jumlah Produksi',
data: [
<?php
$trackers = get_tracker();
foreach($produksi as $tracker)
{?>
[Date.UTC(<?php echo date("Y,m-1,d", strtotime($tracker->tanggal)) ?>),<?php echo $tracker->jumlah ?>],
<?php }?>
]
}]
});
});
</script>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div id="grafik" style="width:100%; height:400px;"></div>
		</div>
	</div>
</div>