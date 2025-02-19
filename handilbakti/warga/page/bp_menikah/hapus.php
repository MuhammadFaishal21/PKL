<script src="../admin/assets/sweetalert2@11.js"></script>

<?php   
    $id_bp_menikah = $_GET['id_bp_menikah'];
 
    $queryGetFiles = "SELECT pengantar_rt, fc_ktp, fc_kk, pernyataan FROM bp_menikah WHERE id_bp_menikah='$id_bp_menikah'";
    $result = $con->query($queryGetFiles);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
 
        $uploadDir = "../admin/assets/berkas/bp_menikah/";
        $filesToDelete = [
            $uploadDir . $row['pengantar_rt'],
            $uploadDir . $row['fc_ktp'],
            $uploadDir . $row['fc_kk'],
            $uploadDir . $row['pernyataan']
        ];
 
        foreach ($filesToDelete as $file) {
            if (file_exists($file)) {
                unlink($file);  
            }
        }
 
        $queryDelete = "DELETE FROM bp_menikah WHERE id_bp_menikah='$id_bp_menikah'";

        if ($con->query($queryDelete) === TRUE) {
            echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Data berhasil dihapus.',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '?page=bp_menikah';
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
