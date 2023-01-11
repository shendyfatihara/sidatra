<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-file-alt"></i> Surat Keterangan Domisili</h3>
	</div>
	<form action="./report/cetak_domisili.php" method="post" target="_blank">
		<div class="card-body">
			<div class="form-group row">
				<label class="col-sm-3 col-form-label font-weight-bold">Pilih Penduduk</label>
				<div class="col-sm-7">
					<select name="id_pend" id="id_pend" class="form-control select2bs4" required>
						<option value="" selected disabled>- Pilih Data Penduduk -</option>
						<?php
						$query = "select * from tb_pdd where status='Ada' order by nama asc";
						$hasil = mysqli_query($koneksi, $query);
						while ($row = mysqli_fetch_array($hasil)) {
						?>
						<option value="<?php echo $row['id_pend'] ?>">
							<?php echo $row['nik'] ?> - <?php echo $row['nama'] ?> (RT <?php echo $row['rt'] ?>/RW <?php echo $row['rw'] ?>)
						</option>
						<?php } ?>
					</select>
					<small class="form-text text-muted">Pilih warga aktif untuk mencetak Surat Keterangan Domisili resmi.</small>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<button type="submit" name="btnCetak" class="btn btn-info">
				<i class="fa fa-print"></i> Cetak Surat
			</button>
		</div>
	</form>
</div>