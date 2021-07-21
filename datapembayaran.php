<!DOCTYPE html>
<html lang="en">

<head>
	<?php
	$page = "Data Pembayaran";
	session_start();
	include 'auth/connect.php';
	include "part/head.php";

	if (isset($_POST['submit'])) {
    $id = $_POST['id'];
		$nama = $_POST['nama'];
    $pekerjaan = $_POST['pekerjaan'];
    $alamat = $_POST['alamat'];
    $tanggalpinjam = $_POST['tanggalpinjam'];
    $tanggalkembali = $_POST['tanggalkembali'];
    $typemobil = $_POST['typemobil'];
		$jumlahbayar = $_POST['jumlahbayar'];

    $up2 = mysqli_query($conn, "UPDATE datapembayaran SET nama='$nama', pekerjaan='$pekerjaan', alamat='$alamat', tanggalpinjam='$tanggalpinjam',  tanggalkembali='$tanggalkembali', typemobil='$typemobil', jumlahbayar='$jumlahbayar' WHERE id='$id'");
    echo '<script>
				setTimeout(function() {
					swal({
					title: "Data Diubah",
					text: "Data Pembayaran berhasil diubah!",
					icon: "success"
					});
					}, 500);
				</script>';
  }

  if (isset($_POST['submit2'])) {
    $nama = $_POST['nama'];
    $pekerjaan = $_POST['pekerjaan'];
    $alamat = $_POST['alamat'];
    $tanggalpinjam = $_POST['tanggalpinjam'];
    $tanggalkembali = $_POST['tanggalkembali'];
    $typemobil = $_POST['typemobil'];
		$jumlahbayar = $_POST['jumlahbayar'];

    $add = mysqli_query($conn, "INSERT INTO datapembayaran (nama, pekerjaan, alamat, tanggalpinjam, tanggalkembali, typemobil, jumlahbayar) VALUES ('$nama', '$pekerjaan', '$alamat', '$tanggalpinjam', '$tanggalkembali', '$typemobil', '$jumlahbayar')");
    echo '<script>
				setTimeout(function() {
					swal({
						title: "Berhasil!",
						text: "Data Peminjam baru telah ditambahkan!",
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
											<a href="#" class="btn btn-primary" data-target="#addUser" data-toggle="modal">Tambah Pembayaran</a>
										</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-striped" id="table-1">
												<thead>
													<tr>
														<th class="text-center">
															#
														</th>
														<th>Nama Lengkap</th>
														<th>Pekerjaan</th>
														<th>Alamat</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
														<th>Type Mobil</th>
                            <th>Jumlah Bayar</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$sql = mysqli_query($conn, "SELECT * FROM datapembayaran");
													$i = 0;
													while ($row = mysqli_fetch_array($sql)) {
														$i++;
													?>
														<tr>
															<td><?php echo $i; ?></td>
															<td><?php echo ucwords($row['nama']); ?></td>
															<td><?php echo ucwords($row['pekerjaan']); ?></td>
															<td><?php echo ucwords($row['alamat']); ?></td>
															<td><?php echo ucwords($row['tanggalpinjam']); ?></td>
                              <td><?php echo ucwords($row['tanggalkembali']); ?></td>
															<td><?php echo ucwords($row['typemobil']); ?></td>
                              <td>Rp. <?php echo number_format($row['jumlahbayar'], 0, ".", "."); ?></td>
										</div>
										</td>
										<td>
											<span data-target="#editUser" data-toggle="modal" data-id="<?php echo $row['id']; ?>" data-nik="<?php echo $row['nik']; ?>" data-nama="<?php echo $row['nama']; ?>" data-tanggalpinjam="<?php echo $row['tanggalpinjam']; ?>" data-tanggalkembali="<?php echo $row['tanggalkembali']; ?>" data-jumlahbayar="<?php echo $row['jumlahbayar']; ?>" data-alamat="<?php echo $row['alamat']; ?>" data-pekerjaan="<?php echo $row['pekerjaan']; ?>" data-typemobil="<?php echo $row['typemobil']; ?>">
												<a class="btn btn-primary btn-action mr-1" title="Edit" data-toggle="tooltip"><i class="fas fa-pencil-alt"></i></a>
											</span>
											<a class="btn btn-danger btn-action" data-toggle="tooltip" title="Hapus" data-confirm="Hapus Data|Apakah anda ingin menghapus data ini?" data-confirm-yes="window.location.href = 'auth/delete.php?type=datapembayaran&id=<?php echo $row['id']; ?>'" ;><i class="fas fa-trash"></i></a>
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

		<div class="modal fade" tabindex="-1" role="dialog" id="addUser">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Tambah Pembayaran</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="" method="POST" class="needs-validation" novalidate="">
							<div class="form-group row">
								<label class="col-sm-3 col-form-label">Nama Lengkap</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="nama" required="">
									<div class="invalid-feedback">
										Mohon data diisi!
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Pekerjaan</label>
								<select class="form-control selectric" name="pekerjaan">
									<option value="guru">Guru</option>
									<option value="pns">PNS</option>
									<option value="karyawan">Karyawan Swasta</option>
									<option value="pengusaha">Pengusaha</option>
									<option value="wiraswasta">Wiraswasta</option>
								</select>
							</div>
							<div class="form-group">
								<label>Alamat</label>
								<textarea class="form-control" required="" name="alamat"></textarea>
							</div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Tanggal Pinjam</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control datepicker" name="tanggalpinjam">
                  <div class="invalid-feedback">
                    Mohon data diisi!
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Tanggal Kembali</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control datepicker" name="tanggalkembali">
                  <div class="invalid-feedback">
                    Mohon data diisi!
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Type Mobil</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="typemobil" required="">
                  <div class="invalid-feedback">
                    Mohon data diisi!
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Jumlah Bayar</label>
                <div class="col-sm-9">
                  <input type="number" class="form-control" name="jumlahbayar" required="">
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

		<div class="modal fade" tabindex="-1" role="dialog" id="editUser">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Edit Data Pembayaran</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="" method="POST" class="needs-validation" novalidate="">
							<div class="form-group row">
								<label class="col-sm-3 col-form-label">Nama Lengkap</label>
								<div class="col-sm-9">
                  <input type="hidden" class="form-control" name="id" required="" id="getId">
									<input type="text" class="form-control" name="nama" required="" id="getnama">
									<div class="invalid-feedback">
										Mohon data diisi!
									</div>
								</div>
							</div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Pekerjaan</label>
                <div class="col-sm-9">
                  <select type="text" class="form-control" name="pekerjaan" required="" id="getpekerjaan">
                  <option value="guru">Guru</option>
                  <option value="pns">PNS</option>
                  <option value="karyawan">Karyawan Swasta</option>
                  <option value="pengusaha">Pengusaha</option>
                  <option value="wiraswasta">Wiraswasta</option>
                </select>
                  <div class="invalid-feedback">
                    Mohon data diisi!
                  </div>
                </div>
              </div>
							<div class="form-group">
								<label>Alamat</label>
								<textarea class="form-control" required="" name="alamat" id="getalamat"></textarea>
							</div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Tanggal Pinjam</label>
                <div class="form-group col-sm-9">
                  <input type="text" class="form-control datepicker" id="gettanggalpinjam" name="tanggalpinjam">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Tanggal Kembali</label>
                <div class="form-group col-sm-9">
                  <input type="text" class="form-control datepicker" id="gettanggalkembali" name="tanggalkembali">
                </div>
              </div>
							<div class="form-group row">
								<label class="col-sm-3 col-form-label">Type Mobil</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="typemobil" required="" id="gettypemobil">
									<div class="invalid-feedback">
										Mohon data diisi!
									</div>
								</div>
							</div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Jumlah Bayar</label>
                <div class="col-sm-9">
                  <input type="number" class="form-control" name="jumlahbayar" required="" id="getjumlahbayar">
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
		$('#editUser').on('show.bs.modal', function(event) {
			var button = $(event.relatedTarget)
			var nama = button.data('nama')
      var pekerjaan = button.data('pekerjaan')
			var alamat = button.data('alamat')
      var tanggalpinjam = button.data('tanggalpinjam')
      var tanggalkembali = button.data('tanggalkembali')
			var typemobil = button.data('typemobil')
      var jumlahbayar = button.data('jumlahbayar')
			var id = button.data('id')
			var modal = $(this)
			modal.find('#getId').val(id)
			modal.find('#getnama').val(nama)
      modal.find('#getalamat').val(alamat)
      modal.find('#getpekerjaan').val(pekerjaan)
			modal.find('#gettanggalpinjam').val(tanggalpinjam)
      modal.find('#gettanggalkembali').val(tanggalkembali)
			modal.find('#gettypemobil').val(typemobil)
      modal.find('#getjumlahbayar').val(jumlahbayar)
		})
	</script>
</body>

</html>
