<?php
if (isset($_SESSION['status'])) {
?>
<center><h1 class="mt-4 mb-3">Data Anggota</h1></center>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-1" data-bs-toggle="modal" data-bs-target="#tambahanggota">
  Tambah Data
</button>
<table class="table table-dark table-hover">
    <tr class="text-center">
        <th>No</th>
        <th>NIS</th>
        <th>Nama</th>
        <th>Gender</th>
        <th>Tpt Lahir</th>
        <th>Tgl Lahir</th>
        <th>Kelas</th>
        <th>Jurusan</td>
        <th>No. Tlp</th>
        <th>Alamat</th>
        <th>--Action--</th>
    </tr>
    <?php
        $query = mysqli_query($konek,"SELECT * FROM anggota");
        $no = 1;
        foreach ($query as $row) {
    ?>
    <tr style="font-size: 11px; table-layout: fixed">
        <td align="center" valign="middle"><?php echo $no; ?></td>
        <td align="center" valign="middle"><?php echo $row['nis']; ?></td>
        <td align="center" valign="middle"><?php echo $row['nama']; ?></td>
        <td align="center" valign="middle"><?php echo $row['jk']=="L"?"Laki-laki":"Perempuan"; ?></td>
        <td align="center" valign="middle"><?php echo $row['tgl_lahir']; ?></td>
        <td align="center" valign="middle"><?php echo $row['tpt_lahir']; ?></td>

        <td align="center" valign="middle">
            <?php
             $idkelas = $row['id_kelas']; 
             $querykelas = mysqli_query($konek, "SELECT * FROM kelas where id_kelas = '$idkelas'");
             foreach ($querykelas as $kelas) {
                 echo $kelas['nama_kelas'] ;
             }
            ?>
        </td>
        <td align="center" valign="middle">
            <?php
             $idjurusan = $row['id_jurusan']; 
             $queryjurusan = mysqli_query($konek, "SELECT * FROM jurusan where id_jurusan = '$idjurusan'");
             foreach ($queryjurusan as $jurusan) {
                echo $jurusan['nama_jurusan'] ;
             }
           ?>
        </td>

        <td align="center" valign="middle"><?php echo $row['tlp']; ?></td>
        <td align="center" valign="middle"><?php echo $row['alamat']; ?></td>
        <td align="center" valign="middle">
            <a href="?page=anggota-delete&delete=&id=<?php echo $row['id_anggota'];?>">
                <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
            </a>
            <a href="?page=anggota-edit&edit=&id=<?php echo $row['id_anggota'];?>">
                <button class="btn btn-warning"><i class="fas fa-edit"></i></button>
            </a>
        </td>
    </tr>
    <?php
    $no++;
    }
    ?>
</table>

<!-- Modal -->
<div class="modal fade" id="tambahanggota" tabindex="-1" aria-labelledby="tambahanggotaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="tambahanggotaLabel">Form Tambah Anggota</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="?page=anggota-insert" method="post">
                <div class="form-group">
                    <input class="form-control" type="text" name="nis" placeholder="Nomor Induk Siswa" required>
                </div>
                <div class="form-group mt-2">
                    <input class="form-control" type="text" name="nama" placeholder="Nama Lengkap" required>
                </div>
                <div class="form-group mt-2">
                    <select class="form-control" name="jk">
                        <option value="">--Pilih Jenis Kelamin--</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
                <div class="form-group mt-2">
                    <input class="form-control" type="text" name="tpt_lahir" placeholder="Tempat Lahir">
                </div>
                <div class="form-group mt-2">
                    <input class="form-control" type="date" name="tgl_lahir">
                </div>
                <div class="form-group mt-2">
                    <select class="form-control" name="kelas" required>
                        <option value="">--Pilih Kelas--</option>
                        <?php
                        $query = mysqli_query($konek,"SELECT * FROM kelas");
                        foreach ($query as $row) {
                            ?>
                            <option value="<?php echo $row["id_kelas"]?>">
                                <?php echo $row["nama_kelas"]?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group mt-2">
                    <select class="form-control" name="jurusan" required>
                        <option value="">--Pilih Jurusan--</option>
                        <?php
                        $query = mysqli_query($konek,"SELECT * FROM jurusan");
                        foreach ($query as $row) {
                            ?>
                            <option value="<?php echo $row["id_jurusan"]?>">
                                <?php echo $row["nama_jurusan"]?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                
                <div class="form-group mt-2">
                    <input class="form-control" type="text" name="tlp" placeholder="Nomor Telepon">
                </div>
                <div class="form-group mt-2">
                    <textarea name="alamat" class="form-control" placeholder="Alamat Lengkap"></textarea>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="save" class="btn btn-primary">Save changes</button>
            </form>
        </div>
        </div>
    </div>
</div>

<?php
}
?>