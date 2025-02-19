<!-- Sweet-Alert  -->
<script src="assets/sweetalert2@11.js"> </script> 

<?php   
	$id_pegawai = $_GET['id_pegawai'];
    $query = "DELETE FROM pegawai WHERE id_pegawai='$id_pegawai'";
    if ($con->query($query) === TRUE) {
        echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Data berhasil dihapus.',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '?page=pegawai';
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