<?php
    include '../../includes/koneksi.php';


    $id = $_POST['id'];
    $rand = rand();
    $ekstensi =  array('svg','png','jpg','jpeg','gif');
    $filename = $_FILES['photos']['name'];
    $ukuran = $_FILES['photos']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    
    if(!in_array($ext,$ekstensi) ) {
        header("location:index.php?alert=gagal_ekstensi");
    }else{
        if($ukuran < 1044070){		
            $x = $rand.'_'.$filename;
            move_uploaded_file($_FILES['photos']['tmp_name'], '../../frontend/img/foto/'.$rand.'_'.$filename);
            mysqli_query($koneksi,"INSERT INTO tbl_galeri_foto_detail VALUES (NULL, '$id', '$x')");
            echo '
            <script>
                history.back();
            </script>
            ';
        }else{
            echo '
            <script>
                history.back();
            </script>
            ';
        }
    }

