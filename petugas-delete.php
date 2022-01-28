<?php
//Proses Delete
if (isset($_GET['delete'])) {
    $id = $_GET['id'];
    $query_delete = mysqli_query($konek,"DELETE FROM petugas WHERE id_petugas = '$id'");
    
    if($query_delete)
    {
        ?>
        <script>
            alert('data berhasil dihapus !!!!')
            window.location.href='?page=petugas';
        </script>
        <?php
    }
    else
    {
        ?>
            <div class="alert alert-danger">
                Data GAGAL Dihapus !!!!!!!!!
            </div>
        <?php
    }
}
////End of proses delete data/////////////////////////////////////////////////////////////////////////

