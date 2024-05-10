<div class="page-wrapper">
	<div class="page-breadcrumb">
		<div class="row">
			<div class="col-7 align-self-center">
				<h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Daftar User</h4>
				<div class="d-flex align-items-center">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb m-0 p-0">
							<li class="breadcrumb-item"><a href="#" class="text-muted">Home</a></li>
							<li class="breadcrumb-item text-muted active" aria-current="page">Daftar User</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered nowrap" id="tabel" style="width: 100%;">
								<thead class="bg-primary text-white">
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>Email</th>
										<?php
										if ($_SESSION['admin']['level'] == 'Admin') {
										?>
											<th>Aksi</th>
										<?php
										}
										?>
									</tr>
								</thead>
								<tbody>
									<?php $nomor = 1; ?>
									<?php $ambil = $koneksi->query("SELECT * FROM pengguna where level = 'User'"); ?>
									<?php while ($row = $ambil->fetch_assoc()) { ?>
										<tr>
											<td><?php echo $nomor; ?></td>
											<td><?php echo $row['nama'] ?></td>
											<td><?php echo $row['email'] ?></td>
											<?php
											if ($_SESSION['admin']['level'] == 'Admin') {
											?>
												<td>
													<a href="index.php?halaman=hapuspengguna&id=<?php echo $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ?')">Hapus</a>
												</td>
											<?php
											}
											?>
										</tr>
										<?php $nomor++; ?>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>