<?php
require_once ('main.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>QL NHANSU</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h1 style="text-align: center; margin: 60px">Danh sách cán bộ công nhân viên</h1>
				<form method="get">
					<input type="text" name="s" class="form-control" style="margin-top: 15px; margin-bottom: 15px; width: 400px;" placeholder="Tìm kiếm theo tên">
				</form>
			</div>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead style="background-color: #00CCFF;">
						<tr>
							<th>STT</th>
							<th>Họ Tên</th>
							<th>Tuổi</th>
							<th>Địa chỉ</th>
							<!-- <th>Giới tính</th> -->
							<th width="60px"></th>
							<th width="60px"></th>
						</tr>
					</thead>
					<tbody>
<?php
if (isset($_GET['s']) && $_GET['s'] != '') {
	$sql = 'select * from nhansu where fullname like "%'.$_GET['s'].'%"';
} else {
	$sql = 'select * from nhansu';
}

$studentList = executeResult($sql);

$index = 1;
foreach ($studentList as $std) {
	echo '<tr>
			<td>'.($index++).'</td>
			<td>'.$std['fullname'].'</td>
			<td>'.$std['age'].'</td>
			<td>'.$std['address'].'</td>
			
			<td><button class="btn btn-warning" onclick=\'window.open("input.php?id='.$std['id'].'","_self")\'>Sửa</button></td>
			<td><button class="btn btn-danger" onclick="deleteStudent('.$std['id'].')">Xoá</button></td>
		</tr>';
}
?>
					</tbody>
				</table>
				<button class="btn btn-success" onclick="window.open('input.php', '_self')">Thêm nhân viên</button>
				<a href="index.php" style="background-color:red;" class="btn btn-success">Home</a>	
			</div>
		</div>
	</div>

	<script type="text/javascript">
		function deleteStudent(id) {
			option = confirm('Bạn có muốn nhân viên này không')
			if(!option) {
				return;
			}

			console.log(id)
			$.post('delete.php', {
				'id': id
			}, function(data) {
				alert(data)
				location.reload()
			})
		}
	</script>
</body>
</html>