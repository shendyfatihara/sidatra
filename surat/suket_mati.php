<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-file-alt"></i> Surat Keterangan Kematian</h3>
	</div>
	<form action="./report/cetak_mati.php" method="post" target="_blank">
		<div class="card-body">
			<div class="form-group row">
				<label class="col-sm-3 col-form-label font-weight-bold">Pilih Data Kematian</label>
				<div class="col-sm-7">
					<select name="id_mendu" id="id_mendu" class="form-control select2bs4" required>
						<option value="" selected disabled>- Pilih Data Kematian -</option>
						<?php
						$query = "select m.id_mendu, m.tgl_mendu, m.sebab, p.nik, p.nama from tb_mendu m inner join tb_pdd p on m.id_pdd=p.id_pend order by m.tgl_mendu desc";
						$hasil = mysqli_query($koneksi, $query);
						while ($row = mysqli_fetch_array($hasil)) {
						?>
						<option value="<?php echo $row['id_mendu'] ?>">
							<?php echo $row['nik'] ?> - <?php echo $row['nama'] ?> (Tgl Wafat: <?php echo $row['tgl_mendu'] ?>)
						</option>
						<?php } ?>
					</select>
					<small class="form-text text-muted">Pilih almarhum/almarhumah untuk mencetak Surat Keterangan Kematian.</small>
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