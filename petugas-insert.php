<?php
//Proses insert data
if (isset($_POST['save'])) {
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
$query_insert = mysqli_query($konek,"INSERT INTO petugas 
VALUES('','$nama','$jabatan','$nomer_telepon','$alamat','$username','$passenkr')");
    if($query_insert)
    {
        ?>
        <script>
            alert('data berhasil ditambahkan !!!!')
            window.location.href='?page=petugas';
        </script>
        <?php

    }
    else
    {
        ?>
            <div class="alert alert-danger">
                Data GAGAL Disimpan !!!!!!!!!
            </div>
        <?php
    }
}
//// End of proses insert /////////////////////////////////////////////////////////
?>