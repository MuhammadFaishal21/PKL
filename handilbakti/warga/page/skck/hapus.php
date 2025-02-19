<script src="../admin/assets/sweetalert2@11.js"></script>

<?php   
    $id_skck = $_GET['id_skck'];
 
    $queryGetFiles = "SELECT pengantar_rt, fc_ktp, fc_kk, fc_akta, pas_foto FROM skck WHERE id_skck='$id_skck'";
    $result = $con->query($queryGetFiles);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
 
        $uploadDir = "../admin/assets/berkas/skck/";
        $filesToDelete = [
            $uploadDir . $row['pengantar_rt'],
            $uploadDir . $row['fc_ktp'],
            $uploadDir . $row['fc_kk'],
            $uploadDir . $row['fc_akta'],
            $uploadDir . $row['pas_foto']
        ];
 
        foreach ($filesToDelete as $file) {
            if (file_exists($file)) {
                unlink($file);  
            }
        }
 
        $queryDelete = "DELETE FROM skck WHERE id_skck='$id_skck'";

        if ($con->query($queryDelete) === TRUE) {
            echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Data berhasil dihapus.',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '?page=skck';
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
