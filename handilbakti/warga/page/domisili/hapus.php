<script src="../admin/assets/sweetalert2@11.js"></script>

<?php   
    $id_domisili = $_GET['id_domisili'];
 
    $queryGetFiles = "SELECT pengantar_rt, fc_ktp, fc_kk FROM domisili WHERE id_domisili='$id_domisili'";
    $result = $con->query($queryGetFiles);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
 
        $uploadDir = "../admin/assets/berkas/domisili/";
        $filesToDelete = [
            $uploadDir . $row['pengantar_rt'],
            $uploadDir . $row['fc_ktp'],
            $uploadDir . $row['fc_kk']
        ];
 
        foreach ($filesToDelete as $file) {
            if (file_exists($file)) {
                unlink($file);  
            }
        }
 
        $queryDelete = "DELETE FROM domisili WHERE id_domisili='$id_domisili'";

        if ($con->query($queryDelete) === TRUE) {
            echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Data berhasil dihapus.',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '?page=domisili';
                        }
                    });
                  </script>";
        } else {
            echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: 'Terjadi kesalahan saat menghapus data.',
                        confirmButtonText: 'OK'
                    });
                  </script>";
        }
    } else {
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: 'Data tidak ditemukan.',
                    confirmButtonText: 'OK'
                });
              </script>";
    }
?>
