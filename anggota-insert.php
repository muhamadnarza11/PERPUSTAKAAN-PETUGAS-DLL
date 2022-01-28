<?php
//Proses insert data
if (isset($_POST['save'])) {
$nis        = $_POST['nis'];
$nama       = $_POST['nama'];
$jk         = $_POST['jk'];
$tpt_lahir  = $_POST['tpt_lahir'];
$tgl_lahir  = $_POST['tgl_lahir'];
$kelas      = $_POST['kelas'];
$jurusan    = $_POST['jurusan'];
$tlp        = $_POST['tlp'];
$alamat     = $_POST['alamat'];
$query_insert = mysqli_query($konek,"INSERT INTO anggota 
VALUES('','$nis','$nama','$jk','$tpt_lahir','$tgl_lahir','$kelas','$jurusan','$tlp','$alamat')");
    if($query_insert)
    {
        ?>
        <script>
            alert("Data Berhasil Di Delete");
            window.location.href = '?page=anggota';
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