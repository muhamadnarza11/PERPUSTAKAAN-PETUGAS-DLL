<?php

if (isset($_GET['edit'])) 
{
    $id = $_GET['id'];
    $query= mysqli_query($konek,"SELECT * FROM petugas WHERE id_petugas = '$id'");

    foreach ($query as $row) 
    {
        ?>
        <div class="container">
            <center><h3>Edit Data Petugas</h3></center>
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4">
                <form action="?page=petugas-edit-proses" method="post">
                <input type="hidden" name="id_petugas" value="<?php echo $row['id_petugas'] ?>">
                <div class="form-group mt-2">
                    <input value="<?php echo $row['nama'] ?>" class="form-control" type="text" name="nama" 
                    autocomplete="off" placeholder="Nama Lengkap" required>
                </div>
                <div class="form-group mt-2">
                    <select class="form-control" name="jabatan">
                        <option value="<?php echo $row['jabatan'] ?>"><?php echo $row['jabatan'] ?></option>
                        <option value="Kepala Perpustakaan">Kepala Perpustakaan</option>
                        <option value="pustakawan">pustakawan</option>
                    </select>
                </div>
                <div class="form-group mt-2">
                    <input value="<?php echo $row['nomer_telepon']?>" class="form-control" type="text" name="nomer_telepon" 
                    placeholder="Nomer Telepon">
                </div>
                <div class="form-group mt-2">
                    <input value = "<?php echo $row['alamat']?>" name="alamat" class="form-control" 
                    autocomplete="off" placeholder="Alamat Lengkap">
                </div>
                <div class="form-group mt-2">
                    <input value="<?php echo $row['username']?>" class="form-control" type="text" name="username" 
                    autocomplete="off" placeholder="Edit Username Anda">
                </div>
                <div class="form-group mt-2">
                    <input value="<?php echo $row['password']?>" class="form-control" type="text" name="password" 
                    autocomplete="off" placeholder="Edit Passowrd Anda">
                </div>
                        <div class="form-group mt-2">
                            <center>
                                <button name="save" class="btn btn-primary mb-3" type="submit">
                                    Save
                                </button>
                            </center>
                        </div>
                    </form>
                </div>
                <div class="col-4"></div>
            </div>
        </div>
        <?php
    }
}
?>