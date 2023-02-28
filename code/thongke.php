<?php ob_start();?>
<?php session_start();?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Thống kê doanh thu</title>
	<link rel="stylesheet" type="text/css" href="./dinhdang.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

<body style="background-color:#e9ffb9;">
	<?php include 'chushopchung.php'; ?>
	<div class="cachnav">
	<?php
	$nam = $_GET['nam'];
	$idcs = $_SESSION['idcs'];
	include 'ketnoicsdl.php';
		$tong = 0;
		for($i=1;$i<=12;$i++)
		{
			$sql = "select sum(tongtien) tong from donhang where ((select month(tgkh) = ".$i.") and xacnhankh='Hoàn thành' and idcs=$idcs and (select year(tgkh))=".$nam.")";
			$result = $con->query($sql);
			$row = $result->fetch_assoc();
			if($row['tong']==null) $row['tong']=0;
			$mang[$i-1] = $row['tong'];
			$tong = $tong + $mang[$i-1];
		}
	?>
	<div class="container">
	<div style="text-align: center;"><button class="botron"><a href="thongke.php?nam=<?php $truoc = $nam -1; echo $truoc; ?>" style="text-decoration: none;">Năm trước</a></button>&nbsp;&nbsp;<span style="font-size: 25px; font-weight: bold;"><?php echo $nam; ?></span>&nbsp;&nbsp;<button class="botron"><a href="thongke.php?nam=<?php $sau = $nam + 1; echo $sau; ?>" style="text-decoration: none;">Năm sau</a></button></div>
    <canvas id="myChart"></canvas>
	<?php
		echo "<p style='text-align:center; font-size:30px;'>Tổng doanh thu: ".number_format ($tong ,0 , "." , ",")." VNĐ</p>"
	?>
	</div>
	<script>
    let myChart = document.getElementById('myChart').getContext('2d');
    // Global Options
    //Chart.defaults.global.defaultFontFamily = 'Lato';
    Chart.defaults.global.defaultFontSize = 18;
    Chart.defaults.global.defaultFontColor = '#777';

    let massPopChart = new Chart(myChart, {
      type:'horizontalBar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
      data:{
        labels:['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6','Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
        datasets:[{
          label:'Doanh thu',
          data:[
            Number(<?php echo $mang[0] ?>),
            Number(<?php echo $mang[1] ?>),
			Number(<?php echo $mang[2] ?>),
			Number(<?php echo $mang[3] ?>),
			Number(<?php echo $mang[4] ?>),
            Number(<?php echo $mang[5] ?>),
			Number(<?php echo $mang[6] ?>),
			Number(<?php echo $mang[7] ?>),
			Number(<?php echo $mang[8] ?>),
            Number(<?php echo $mang[9] ?>),
			Number(<?php echo $mang[10] ?>),
			Number(<?php echo $mang[11] ?>),
          ],
          //backgroundColor:'green',
          backgroundColor:[
            '#5664FB',
            '#5664FB',
			'#5664FB',
			'#5664FB',
			'#5664FB',
            '#5664FB',
			'#5664FB',
			'#5664FB',
			'#5664FB',
            '#5664FB',
			'#5664FB',
			'#5664FB'
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
          text:'Thống kê doanh thu',
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
            left:0,
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
  </script>
	</div>
</body>
</html>