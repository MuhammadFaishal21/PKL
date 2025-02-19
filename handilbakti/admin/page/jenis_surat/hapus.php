<!-- Sweet-Alert  -->
<script src="assets/sweetalert2@11.js"> </script> 

<?php   
	$id_jenis_surat = $_GET['id_jenis_surat'];
    $query = "DELETE FROM jenis_surat WHERE id_jenis_surat='$id_jenis_surat'";
    if ($con->query($query) === TRUE) {
        echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Data berhasil dihapus.',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '?page=jenis_surat';
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
 
?>