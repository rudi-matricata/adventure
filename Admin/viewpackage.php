<?php if(!isset($_SESSION)) { session_start(); } ?>

<!DOCTYPE html>
<html>
	<head>
		<title>Преглед на пакетите</title>
		<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>

		<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" />
		<link href="../css/admin-style.css" rel="stylesheet" type="text/css" />
		<link href="../css/style.css" rel="stylesheet" type="text/css" media="all"/>

		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>

	<body>
		<?php
			if($_SESSION['loginstatus']=="")
			{
				header("location:loginform.php");
			}
		?>

		<?php include('../connect-to-db.php'); ?>

		<?php
			if(isset($_POST["sbmt"]))
			{
				$s="insert into category(Cat_name) values('" . $_POST["t1"] ."')";
				mysqli_query($cn,$s);

				echo "<script>alert('Record Save');</script>";
			}
		?>

		<?php include('navigation.php'); ?>

		<div style="padding-top:100px; box-shadow:1px 1px 20px black; min-height:570px" class="container">
			<div class="col-sm-3" style="border-right:1px solid #999; min-height:450px;">
				<?php include('admin-menu.php'); ?>
			</div>

			<div class="col-sm-9">
				<form method="post">
					<table border="0" width="90%" height="300px" align="center" class="tableshadow">
						<tr><td class="toptd">Преглед на пакетите</td></tr>
						<tr><td align="center" valign="top" style="padding-top:10px;">
							<table border="0" align="center" width="95%" >
								<tr>
									<td style="font-size:15px; padding:5px; font-weight:bold;">ID</td>
									<td style="font-size:15px; padding:5px; font-weight:bold;">Име на пакета</td>
									<td style="font-size:15px; padding:5px; font-weight:bold;">Категория</td>
									<td style="font-size:15px; padding:5px; font-weight:bold;">Подкатегория</td>
									<td style="font-size:15px; padding:5px; font-weight:bold;">Цена</td>
									<td style="font-size:15px; padding:5px; font-weight:bold;">Картинка1</td>
									<td style="font-size:15px; padding:5px; font-weight:bold;">Картинка2</td>
									<td style="font-size:15px; padding:5px; font-weight:bold;">Картинка3</td>
								</tr>

								<?php
									$s="select * from package";
									$result=mysqli_query($cn,$s);
									$r=mysqli_num_rows($result);

									while($data=mysqli_fetch_array($result))
									{
										echo "<tr><td style=' padding:5px;'>$data[0]</td>
										<td style=' padding:5px;'>$data[1]</td>
										<td style=' padding:5px;'>$data[2]</td>
										<td style=' padding:5px;'>$data[3]</td>
										<td style=' padding:5px;'>$data[4]</td>
										<td style=' padding:5px;'><IMG src='../images/packimages/$data[5]' style='height:50PX' /></td>
										<td style=' padding:5px;'><IMG src='../images/packimages/$data[6]' style='height:50PX' /></td>
										<td style=' padding:5px;'><IMG src='../images/packimages/$data[7]' style='height:50PX' /></td></tr>";
									}
								?>
							</table>
						</td></tr>
					</table>
				</form>
			</div>
		</div>
	</body>
</html>
