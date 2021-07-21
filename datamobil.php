<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  $page = "Data Mobil";
  session_start();
  include 'auth/connect.php';
  include "part/head.php";

  if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $typemobil = $_POST['typemobil'];
    $tahunkeluar = $_POST['tahunkeluar'];
    $nomorpolisi = $_POST['nomorpolisi'];
    $jumlahunit = $_POST['jumlahunit'];
    $hargasewa = $_POST['hargasewa'];

    $up2 = mysqli_query($conn, "UPDATE datamobil SET typemobil='$typemobil', tahunkeluar='$tahunkeluar', nomorpolisi='$nomorpolisi', jumlahunit='$jumlahunit', hargasewa='$hargasewa' WHERE id='$id'");
    echo '<script>
				setTimeout(function() {
					swal({
					title: "Data Diubah",
					text: "Data Unit berhasil diubah!",
					icon: "success"
					});
					}, 500);
				</script>';
  }

  if (isset($_POST['submit2'])) {
    $typemobil = $_POST['typemobil'];
    $tahunkeluar = $_POST['tahunkeluar'];
    $nomorpolisi = $_POST['nomorpolisi'];
    $jumlahunit = $_POST['jumlahunit'];
    $hargasewa = $_POST['hargasewa'];

    $add = mysqli_query($conn, "INSERT INTO datamobil (typemobil, tahunkeluar, nomorpolisi, jumlahunit, hargasewa) VALUES ('$typemobil', '$tahunkeluar', '$nomorpolisi', '$jumlahunit', '$hargasewa')");
    echo '<script>
				setTimeout(function() {
					swal({
						title: "Berhasil!",
						text: "Unit baru telah ditambahkan!",
						icon: "success"
						});
					}, 500);
			</script>';
  }
  ?>
</head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>

      <?php
      include 'part/navbar.php';
      include 'part/sidebar.php';
      ?>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?php echo $page; ?></h1>
          </div>
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4><?php echo $page; ?></h4>
                    <div class="card-header-action">
                      <a href="#" class="btn btn-primary" data-target="#addMobil" data-toggle="modal">Tambahkan Unit Baru</a>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-center">#</th>
                            <th>Nama</th>
                            <th>Tahun Keluaran</th>
                            <th>Nomor Polisi</th>
                            <th>Jumlah Unit</th>
                            <th>Sewa Perhari</th>
                            <th class="text-center">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $sql = mysqli_query($conn, "SELECT * FROM datamobil");
                          $i = 0;
                          while ($row = mysqli_fetch_array($sql)) {
                            $i++;
                          ?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td><?php echo ucwords($row['typemobil']) ?></td>
                              <td><?php echo ($row['tahunkeluar']) ?></td>
                              <td><?php echo ($row['nomorpolisi']) ?></td>
                              <td><?php echo $row['jumlahunit'] . " Unit"; ?></td>
                              <td>Rp. <?php echo number_format($row['hargasewa'], 0, ".", "."); ?></td>
                              <td align="center">
                                <span data-target="#editMobil" data-toggle="modal" data-id="<?php echo $row['id']; ?>" data-typemobil="<?php echo $row['typemobil']; ?>" data-tahunkeluar="<?php echo $row['tahunkeluar']; ?>" data-nomorpolisi="<?php echo $row['nomorpolisi']; ?>"  data-hargasewa="<?php echo $row['hargasewa']; ?>" data-jumlahunit="<?php echo $row['jumlahunit']; ?>">
                                  <a class="btn btn-primary btn-action mr-1" title="Edit Data Unit" data-toggle="tooltip"><i class="fas fa-pencil-alt"></i></a>
                                </span>
                                <a class="btn btn-danger btn-action mr-1" data-toggle="tooltip" title="Hapus" data-confirm="Hapus Data|Apakah anda ingin menghapus data ini?" data-confirm-yes="window.location.href = 'auth/delete.php?type=datamobil&id=<?php echo $row['id']; ?>'" ;><i class="fas fa-trash"></i></a>
                              </td>
                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

      <div class="modal fade" tabindex="-1" role="dialog" id="addMobil">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Tambah Data Mobil</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="" method="POST" class="needs-validation" novalidate="" autocomplete="off">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Nama Type Unit</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="typemobil" required="" id="gettypemobil">
                    <div class="invalid-feedback">
                      Mohon data diisi!
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Tahun Keluar</label>
                  <div class="form-group col-sm-9">
                    <input type="number" class="form-control" name="tahunkeluar" required="" value="0">
                    <div class="invalid-feedback">
                      Mohon data diisi!
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Nomor Polisi</label>
                  <div class="form-group col-sm-9">
                    <input type="text" class="form-control" name="nomorpolisi" required="">
                    <div class="invalid-feedback">
                      Mohon data diisi!
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Jumlah Unit</label>
                  <div class="form-group col-sm-9">
                    <input type="number" class="form-control" name="jumlahunit" required="" value="0">
                    <div class="invalid-feedback">
                      Mohon data diisi!
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Harga Sewa per hari</label>
                  <div class="input-group col-sm-9">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        Rp
                      </div>
                    </div>
                    <input type="number" class="form-control" name="hargasewa" required="" value="0">
                    <div class="invalid-feedback">
                      Mohon data diisi!
                    </div>
                  </div>
                </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="submit2">Tambah</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" tabindex="-1" role="dialog" id="editMobil">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Edit Data</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="" method="POST" class="needs-validation" novalidate="">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Type Mobil</label>
                  <div class="col-sm-9">
                    <input type="hidden" class="form-control" name="id" required="" id="getId">
                    <input type="text" class="form-control" name="typemobil" required="" id="gettypemobil">
                    <div class="invalid-feedback">
                      Mohon data diisi!
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Tahun Keluar</label>
                  <div class="form-group col-sm-9">
                    <input type="number" class="form-control" name="tahunkeluar" required="" id="gettahunkeluar">
                    <div class="invalid-feedback">
                      Mohon data diisi!
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Nomor Polisi</label>
                  <div class="form-group col-sm-9">
                    <input type="text" class="form-control" name="nomorpolisi" required="" id="getnomorpolisi">
                    <div class="invalid-feedback">
                      Mohon data diisi!
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Jumlah Unit</label>
                  <div class="form-group col-sm-9">
                    <input type="number" class="form-control" name="jumlahunit" required="" id="getjumlahunit">
                    <div class="invalid-feedback">
                      Mohon data diisi!
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Harga Sewa per Hari</label>
                  <div class="input-group col-sm-9">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        Rp
                      </div>
                    </div>
                    <input type="number" class="form-control" name="hargasewa" required="" id="gethargasewa">
                    <div class="invalid-feedback">
                      Mohon data diisi!
                    </div>
                  </div>
                </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="submit">Edit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php include 'part/footer.php'; ?>
    </div>
  </div>
  <?php include "part/all-js.php"; ?>

  <script>
    $('#editMobil').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget)
      var typemobil = button.data('typemobil')
      var id = button.data('id')
      var tahunkeluar = button.data('tahunkeluar')
      var nomorpolisi = button.data('nomorpolisi')
      var jumlahunit = button.data('jumlahunit')
      var hargasewa = button.data('hargasewa')
      var modal = $(this)
      modal.find('#getId').val(id)
      modal.find('#gettypemobil').val(typemobil)
      modal.find('#gettahunkeluar').val(tahunkeluar)
      modal.find('#getnomorpolisi').val(nomorpolisi)
      modal.find('#getjumlahunit').val(jumlahunit)
      modal.find('#gethargasewa').val(hargasewa)
    })
  </script>
</body>

</html>
