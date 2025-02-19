<?php
date_default_timezone_set('Asia/Makassar'); 
	$con = mysqli_connect("localhost","root","","db_kelurahan");

	if (!$con){
		echo "Koneksi Ke Database Gagal";
	} 

?> 
 
<?php $ambil_meta=$con->query("SELECT * FROM meta"); ?>
<?php $meta = $ambil_meta->fetch_assoc(); ?> 

<?php $ambil_jensu=$con->query("SELECT * FROM jenis_surat"); ?>
<?php $jensu = $ambil_jensu->fetch_assoc(); ?> 

 