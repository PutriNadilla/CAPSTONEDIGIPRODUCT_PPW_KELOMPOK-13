<div class="page-wrapper">
	<div class="page-breadcrumb">
		<div class="row">
			<div class="col-7 align-self-center">
				<h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Daftar Universitas</h4>
				<div class="d-flex align-items-center">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb m-0 p-0">
							<li class="breadcrumb-item"><a href="#" class="text-muted">Home</a></li>
							<li class="breadcrumb-item text-muted active" aria-current="page">Daftar Universitas</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<?php
				if ($_SESSION['admin']['level'] == 'Admin') {
				?>
					<div class="card">
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered nowrap" id="tabel" style="width: 100%;">
									<thead class="bg-primary text-white">
										<tr>
											<th style="width: 10px !important;">Rank</th>
											<th>Universitas</th>
											<th>Foto</th>
											<th>Negara</th>
											<th>Rangking Nasional</th>
											<th>Kualitas Pendidikan</th>
											<th>Pegawai Alumni</th>
											<th>Kualitas Fakultas</th>
											<th>Publikasi</th>
											<th>Skor</th>
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
										<?php $ambil = $koneksi->query("SELECT * FROM universitas order by rangkingdunia asc"); ?>
										<?php while ($data = $ambil->fetch_assoc()) { ?>
											<tr>
												<td><?php echo $data["rangkingdunia"] ?></td>
												<td><?php echo $data["namauniversitas"] ?></td>
												<td><img src="../foto/<?= $data['file'] ?>" width="150px" alt=""></td>
												<td><?php echo $data["negara"] ?></td>
												<td><?php echo $data["rangkingnasional"] ?></td>
												<td><?php echo $data["kualitaspendidikan"] ?></td>
												<td><?php echo $data["pegawaialumni"] ?></td>
												<td><?php echo $data["kualitasfakultas"] ?></td>
												<td><?php echo $data["publikasi"] ?></td>
												<td><?php echo $data["skor"] ?></td>
												<?php
												if ($_SESSION['admin']['level'] == 'Admin') {
												?>
													<td>
														<a href="#" class="btn btn-primary btn-sm mb-1" data-toggle="modal" data-target="#lihat<?= $nomor ?>">Detail</a>
														<a href="index.php?halaman=universitasubah&id=<?php echo $data['iduniversitas']; ?>" class="btn btn-warning btn-sm mb-1">Ubah</a>
														<a href="index.php?halaman=universitashapus&id=<?php echo $data['iduniversitas']; ?>" class="btn btn-danger btn-sm mb-1" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ?')">Hapus</a>
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
							<?php $nomor = 1; ?>
							<?php $ambil = $koneksi->query("SELECT * FROM universitas order by rangkingdunia asc"); ?>
							<?php while ($data = $ambil->fetch_assoc()) { ?>
								<div class="modal fade" id="lihat<?= $nomor ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="staticBackdropLabel"><?= $data['namauniversitas'] ?></h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<center>
													<img src="../foto/<?= $data['file'] ?>" width="80%" alt="">
												</center>
												<br>
												<p class="text-justify"><?= $data['deskripsi'] ?></p>
												<div class="table-responsive">
													<table class="table table-bordered" style="width: 100%;" width="100%">
														<tbody>
															<tr>
																<td>Rangking</td>
																<td> : <?= $data['rangkingdunia'] ?></td>
															</tr>
															<tr>
																<td>Negara</td>
																<td> : <?= $data['negara'] ?></td>
															</tr>
															<tr>
																<td>Rangking Nasional</td>
																<td> : <?= $data['rangkingnasional'] ?></td>
															</tr>
															<tr>
																<td>Kualitas Pendidikan</td>
																<td> : <?= $data['kualitaspendidikan'] ?></td>
															</tr>
															<tr>
																<td>Pegawai Alumni</td>
																<td> : <?= $data['pegawaialumni'] ?></td>
															</tr>
															<tr>
																<td>Kualitas Fakultas</td>
																<td> : <?= $data['kualitasfakultas'] ?></td>
															</tr>
															<tr>
																<td>Publikasi</td>
																<td> : <?= $data['publikasi'] ?></td>
															</tr>
																<td>Skor</td>
																<td> : <?= $data['skor'] ?></td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
											</div>
										</div>
									</div>
								</div>
								<?php $nomor++; ?>
							<?php } ?>
						</div>
					</div>
				<?php } else { ?>
					<?php
					if (!empty($_POST['keyword'])) {
						$keyword = $_POST['keyword'];
					} else {
						$keyword = "";
					}
					?>
					<div class="row mb-5">
						<div class="col-md-12">
							<form method="post">
								<div class="row">
									<div class="col-md-9 col-9 my-auto">
										<div class="form-group">
											<input type="text" name="keyword" value="<?= $keyword ?>" placeholder="Masukkan Kata Pencarian" class="form-control">
										</div>
									</div>
									<div class="col-span-3 col-3">
										<button type="submit" name="cari" value="cari" class="btn btn-primary btn-block">Cari</button>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="row">
						<?php
						$nomor = 1;
						if (isset($_POST['cari'])) {
							$ambil = $koneksi->query("SELECT * FROM universitas WHERE namauniversitas LIKE '%$keyword%' OR negara LIKE '%$keyword%' OR deskripsi LIKE '%$keyword%' ORDER BY CAST(rangkingdunia AS UNSIGNED) ASC");
						} else {
							$ambil = $koneksi->query("SELECT * FROM universitas ORDER BY CAST(rangkingdunia AS UNSIGNED) ASC");
						}
						while ($data = $ambil->fetch_assoc()) { ?>
							<div class="col-12 col-md-4">
								<div class="card">
									<center>
										<img src="../foto/<?= $data['file'] ?>" width="300px" height="300px" alt="...">
									</center>
									<div class="card-body">
										<h5 class="card-title"><?= $data['namauniversitas'] ?> <span class="text-danger float-right">#<?= $data['rangkingdunia'] ?></span></h5>
										<p class="card-text text-justify"><?= potong($data['deskripsi'], 200) ?>...</p>
										<div class="row">
											<div class="col-12 col-md-6 mb-3">
												<?php
												$id = $_SESSION['admin']['id'];
												$ambilfavorit = $koneksi->query("SELECT * FROM favorit WHERE id='$id' AND iduniversitas='$data[iduniversitas]'");
												$cekfavorit = $ambilfavorit->num_rows;
												if ($cekfavorit >= 1) {
												?>
													<a href="index.php?halaman=universitasfavorithapus&id=<?php echo $data['iduniversitas']; ?>&page=universitasdaftar" class="btn btn-danger">Hapus dari Favorit <i class="fa fa-times"></i></a>
												<?php } else { ?>
													<a href="index.php?halaman=universitasfavorit&id=<?php echo $data['iduniversitas']; ?>" class="btn btn-success">Simpan ke Favorit <i class="fa fa-heart"></i></a>
												<?php } ?>
											</div>
											<div class="col-12 col-md-6 mb-3">
												<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#detail<?= $nomor ?>">Selengkapnya <i class="fa fa-arrow-right"></i></a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="modal fade" id="detail<?= $nomor ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="staticBackdropLabel"><?= $data['namauniversitas'] ?></h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<center>
												<img src="../foto/<?= $data['file'] ?>" width="80%" alt="">
											</center>
											<br>
											<p class="text-justify"><?= $data['deskripsi'] ?></p>
											<div class="table-responsive">
												<table class="table table-bordered" style="width: 100%;" width="100%">
													<tbody>
														<tr>
															<td>Rangking</td>
															<td> : <?= $data['rangkingdunia'] ?></td>
														</tr>
														<tr>
															<td>Negara</td>
															<td> : <?= $data['negara'] ?></td>
														</tr>
														<tr>
															<td>Rangking Nasional</td>
															<td> : <?= $data['rangkingnasional'] ?></td>
														</tr>
														<tr>
															<td>Kualitas Pendidikan</td>
															<td> : <?= $data['kualitaspendidikan'] ?></td>
														</tr>
														<tr>
															<td>Pegawai Alumni</td>
															<td> : <?= $data['pegawaialumni'] ?></td>
														</tr>
														<tr>
															<td>Kualitas Fakultas</td>
															<td> : <?= $data['kualitasfakultas'] ?></td>
														</tr>
														<tr>
															<td>Publikasi</td>
															<td> : <?= $data['publikasi'] ?></td>
														</tr>
														<tr>
															<td>Skor</td>
															<td> : <?= $data['skor'] ?></td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
										</div>
									</div>
								</div>
							</div>
						<?php
							$nomor++;
						}
						?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>