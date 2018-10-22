<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0," charset="utf-8">
		<title>UPLOAD XLS FILE</title>
		<link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
		<style type="text/css">
			.row-center
			{
				text-align:center;
			}
			container-fluid 
			{
				font-family: 'Kanit', sans-serif;
			}
		</style>
		<?php
			$server = "us-cdbr-iron-east-01.cleardb.net";
			$username = "b798786b8aa714";
			$password = "2e0e0451";
			$db = "heroku_ce52199dd4f50e1";
			$conn = new mysqli($server, $username, $password, $db);
			mysqli_query($conn, "SET NAMES utf8");
		?>
	</head>
	<body>
		<div class="container-fluid" style="background-color:pink;">
			<div class="row row-center">
				<div class="col-lg-4 offset-lg-4" style="background-color:pink;">
					<h4>UPLOAD XLS FILE</h4>
				</div>
			</div>
		</div>
		<div class="mt-2 container"> 
			<div class="row">
				<div class="col-lg-2" >
					<form action="recive.php" method="post">
						<div class="row">
							<label for="vocfile">ไฟล์ xls</label>
                    <input type="file" required name="vocfile" class="form-control-file btn btn-dark" id="vocfile" accept="application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
						</div>
						<div class="mt-2 row">
							<input class="btn btn-success btn-block" type="submit" value="บันทึก">
						</div>
					</form>
				</div>
				<div class="col-lg-10">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>ชื่อ</th>
									<th>นามสกุล</th>
									<th>email</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$sql = "SELECT * FROM inserttesting";
									$query = mysqli_query($conn,$sql);
									while($obj = mysqli_fetch_array($query))
									{
										echo "<tr>";
										echo "<td>".$obj["number"]."</td>";
										echo "<td>".$obj["office"]."</td>";
										echo "</tr>";
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>