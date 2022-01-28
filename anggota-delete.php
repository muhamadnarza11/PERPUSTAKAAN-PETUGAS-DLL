<?php
//Proses Delete
if (isset($_GET['delete'])) {
    $id = $_GET['id'];
    $query_delete = mysqli_query($konek,"DELETE FROM anggota WHERE id_anggota = '$id'");
    
    if($query_delete){
        ?>
            <script>
                alert("Data Berhasil Di Delete");
                window.location.href = '?page=anggota';
            </script>
        <?php
       
    }
}
////End of proses delete data/////////////////////////////////////////////////////////////////////////

?>