<?php

    include "../inc/koneksi.php";
    if(isset($_GET['id_warga'])){

    $sql_ubah = "UPDATE warga SET status_akun='Aktif' WHERE id_warga='".$_GET['id_warga']."'";
    $query_ubah = mysqli_query($con, $sql_ubah);
    mysqli_close($con);

    if ($query_ubah) {
    
    ?>

    <script type="text/javascript">
        alert("Pendafataran Akun diverifikasi");
        window.location.href="../index.php";
    </script>

<?php } } ?> 