<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-file-alt"></i> Surat Keterangan Kelahiran</h3>
	</div>
	<form action="./report/cetak_lahir.php" method="post" target="_blank">
		<div class="card-body">
			<div class="form-group row">
				<label class="col-sm-3 col-form-label font-weight-bold">Pilih Data Bayi / Anak</label>
				<div class="col-sm-7">
					<select name="lahir" id="lahir" class="form-control select2bs4" required>
						<option value="" selected disabled>- Pilih Data Kelahiran -</option>
						<?php
						$query = "select l.*, k.kepala from tb_lahir l inner join tb_kk k on l.id_kk=k.id_kk order by l.tgl_lh desc";
						$hasil = mysqli_query($koneksi, $query);
						while ($row = mysqli_fetch_array($hasil)) {
						?>
						<option value="<?php echo $row['id_lahir'] ?>">
							<?php echo $row['nama'] ?> (Tgl Lahir: <?php echo $row['tgl_lh'] ?>) - Anak dari: <?php echo $row['kepala'] ?>
						</option>
						<?php } ?>
					</select>
					<small class="form-text text-muted">Pilih data kelahiran yang akan dicetakkan Surat Keterangan Lahir.</small>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<button type="submit" name="Cetak" class="btn btn-info">
				<i class="fa fa-print"></i> Cetak Surat
			</button>
		</div>
	</form>
</div>