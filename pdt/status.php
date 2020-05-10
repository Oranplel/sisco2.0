<?php
	
	$status = $_POST['status'];
	$id = $_POST['id'];

	require_once '../dao/connect_db.php';

	$sql = "UPDATE tb_ocorrencia SET status_pdt='$status' WHERE idtb_ocorrencia='$id'";
        $result = mysqli_query($mysqli, $sql);
	mysqli_free_result($result);

	echo "<script>window.location=\"index.php\";</script>";

	?>
