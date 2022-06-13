<?php
if (isset($_POST['id'])) {
	$id = $_POST['id'];

	require_once ('main.php');
	$sql = 'delete from nhansu where id = '.$id;
	execute($sql);

	echo 'Xoá nhan viên thành công';
}