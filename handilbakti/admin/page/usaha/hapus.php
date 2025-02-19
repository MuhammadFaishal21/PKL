<script src="assets/sweetalert2@11.js"></script>

<?php   
    $id_usaha = $_GET['id_usaha'];
 
    $queryGetFiles = "SELECT pengantar_rt, fc_ktp, fc_kk, fc_pbb, foto_usaha FROM usaha WHERE id_usaha='$id_usaha'";
    $result = $con->query($queryGetFiles);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
 
        $uploadDir = "assets/berkas/usaha/";
        $filesToDelete = [
            $uploadDir . $row['pengantar_rt'],
            $uploadDir . $row['fc_ktp'],
            $uploadDir . $row['fc_kk'],
            $uploadDir . $row['fc_pbb'],
            $uploadDir . $row['foto_usaha']
        ];
 
        foreach ($filesToDelete as $file) {
            if (file_exists($file)) {
                unlink($file);  
            }
        }
 
        $queryDelete = "DELETE FROM usaha WHERE id_usaha='$id_usaha'";

        if ($con->query($queryDelete) === TRUE) {
            echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Data berhasil dihapus.',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '?page=usaha';
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
