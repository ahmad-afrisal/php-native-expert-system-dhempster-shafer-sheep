<?php
include '../../includes/koneksi.php';
$id_detail = $_GET['id_detail'];
mysqli_query($koneksi, "DELETE FROM tbl_galeri_foto_detail WHERE id='$id_detail'");
// $_SERVER[HTTP_REFERER];
// header("location:javascript://history.go(-1)");
// header("location:javascript://history.back()");
?>

<script>
    history.back();
</script>