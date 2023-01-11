<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-file-alt"></i> Surat Keterangan Pindah</h3>
	</div>
	<form action="./report/cetak_pindah.php" method="post" target="_blank">
		<div class="card-body">
			<div class="form-group row">
				<label class="col-sm-3 col-form-label font-weight-bold">Pilih Penduduk Pindah</label>
				<div class="col-sm-7">
					<select name="id_pend" id="id_pend" class="form-control select2bs4" required>
						<option value="" selected disabled>- Pilih Data Penduduk Pindah -</option>
						<?php
						$query = "select p.id_pend, p.nik, p.nama, pi.tgl_pindah, pi.alasan 
						          from tb_pdd p 
						          left join tb_pindah pi on pi.id_pdd = p.id_pend 
						          where p.status='Pindah' 
						          order by p.nama asc";
						$hasil = mysqli_query($koneksi, $query);
						while ($row = mysqli_fetch_array($hasil)) {
						?>
						<option value="<?php echo $row['id_pend'] ?>">
							<?php echo $row['nik'] ?> - <?php echo $row['nama'] ?> (Alasan: <?php echo !empty($row['alasan']) ? $row['alasan'] : '-'; ?>)
						</option>
						<?php } ?>
					</select>
					<small class="form-text text-muted">Pilih warga berstatus 'Pindah' yang akan dicetakkan Surat Keterangan Pindah.</small>
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