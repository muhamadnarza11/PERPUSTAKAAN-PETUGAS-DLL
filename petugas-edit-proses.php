<?php
include('koneksi.php');
if (isset($_POST['save'])) {
    
    $id               = $_POST['id_petugas'];
    $nama               = $_POST['nama'];
    $jabatan            = $_POST['jabatan'];
    $nomer_telepon      = $_POST['nomer_telepon'];
    $alamat             = $_POST['alamat'];
    $username           = $_POST['username'];
    $password           = $_POST['password'];

    // proses enskripsi password
    $options = [
        'cost' => 12,
    ];
    $passenkr = password_hash($password, PASSWORD_BCRYPT, $options);
    // 

    $query_update = mysqli_query($konek,"UPDATE petugas 
    SET
        nama                = '$nama',     
        jabatan             = '$jabatan',    
        nomer_telepon       = '$nomer_telepon',  
        alamat              = '$alamat',
        username            = '$username',
        password            = '$passenkr'
    
    WHERE id_petugas = '$id'");

    if ($query_update) {
        ?>
        <script>
            alert('Data Berhasil Diupdate')
            window.location.href='?page=petugas';
        </script>
        <?php
    }else{
        ?>
        <script>
            alert('Data Berhasil Diupdate')
            window.location.href='?page=petugas';
        </script>
        <?php
    }
}
?>