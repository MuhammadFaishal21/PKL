<!-- Sweet-Alert  -->
<script src="assets/sweetalert2@11.js"> </script> 

<?php   
	$id_warga = $_GET['id_warga'];
    $query = "DELETE FROM warga WHERE id_warga='$id_warga'";
    if ($con->query($query) === TRUE) {
        echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Data berhasil dihapus.',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '?page=warga';
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