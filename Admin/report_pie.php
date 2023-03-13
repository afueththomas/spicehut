<?php
include("header.php");
include("config.php");
$query =("Select count(*) as count,category from tbl_product p inner join tbl_category c on p.si_no=c.c_id group by p.si_no");
$res =$con-> query($query);
?>
<html>
  <head><div style="">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['f_name', 'number'],
        <?php
		while ($row=$res->fetch_assoc())
		{
			echo "['".$row['category']."',".$row['count']."],";
		}
		?>
        ]);

        var options = {
          title: 'Count of Product in Each Category',
		  is3D:true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
    <br />
</div>
  </head>
  <body>
  <form >
 
    <div id="piechart" style="width: 900px; height: 500px; "> </div></form>
  </body>
</html>
<?php
?>