<script src="assets/sweetalert2@11.js"></script>

<?php   
    $id_tidak_mampu = $_GET['id_tidak_mampu'];
 
    $queryGetFiles = "SELECT pengantar_rt, fc_ktp, fc_kk FROM tidak_mampu WHERE id_tidak_mampu='$id_tidak_mampu'";
    $result = $con->query($queryGetFiles);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
 
        $uploadDir = "assets/berkas/tidak_mampu/";
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
 
        $queryDelete = "DELETE FROM tidak_mampu WHERE id_tidak_mampu='$id_tidak_mampu'";

        if ($con->query($queryDelete) === TRUE) {
            echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Data berhasil dihapus.',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '?page=tidak_mampu';
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
