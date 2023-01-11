<?php
  // Query statistik kependudukan
  $pend   = $koneksi->query("SELECT COUNT(id_pend) as total FROM tb_pdd WHERE status='Ada'")->fetch_assoc()['total'] ?? 0;
  $kartu  = $koneksi->query("SELECT COUNT(id_kk) as total FROM tb_kk")->fetch_assoc()['total'] ?? 0;
  $laki   = $koneksi->query("SELECT COUNT(id_pend) as total FROM tb_pdd WHERE jekel='LK' AND status='Ada'")->fetch_assoc()['total'] ?? 0;
  $prem   = $koneksi->query("SELECT COUNT(id_pend) as total FROM tb_pdd WHERE jekel='PR' AND status='Ada'")->fetch_assoc()['total'] ?? 0;
  $lahir  = $koneksi->query("SELECT COUNT(id_lahir) as total FROM tb_lahir")->fetch_assoc()['total'] ?? 0;
  $mendu  = $koneksi->query("SELECT COUNT(id_mendu) as total FROM tb_mendu")->fetch_assoc()['total'] ?? 0;
  $datang = $koneksi->query("SELECT COUNT(id_datang) as total FROM tb_datang")->fetch_assoc()['total'] ?? 0;
  $pindah = $koneksi->query("SELECT COUNT(id_pindah) as total FROM tb_pindah")->fetch_assoc()['total'] ?? 0;
?>

<!-- Welcome Banner -->
<div class="row mb-3">
	<div class="col-12">
		<div class="card shadow-sm border-0" style="background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%); color: white; border-radius: 12px;">
			<div class="card-body p-4 d-flex justify-content-between align-items-center flex-wrap">
				<div class="mb-2 mb-md-0">
					<h3 class="font-weight-bold mb-1">
						<i class="fas fa-hand-sparkles mr-2 text-warning"></i>Selamat Datang, <?php echo htmlspecialchars($data_nama); ?>!
					</h3>
					<p class="mb-0 text-light" style="font-size: 14.5px;">
						Dashboard Administrator SIDATRA (Sistem Informasi dan Administrasi Kependudukan Terpadu) Desa Putat, Kec. Sedong, Kab. Cirebon.
					</p>
				</div>
				<div>
					<a href="?page=add-pend" class="btn btn-warning font-weight-bold mr-1 shadow-sm">
						<i class="fas fa-user-plus mr-1"></i> Tambah Penduduk
					</a>
					<a href="?page=suket-domisili" class="btn btn-outline-light font-weight-bold shadow-sm">
						<i class="fas fa-print mr-1"></i> Cetak Surat
					</a>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Stat Cards -->
<div class="row">
	<div class="col-lg-3 col-6">
		<div class="small-box bg-info shadow-sm" style="border-radius: 10px;">
			<div class="inner">
				<h3><?php echo number_format($pend); ?></h3>
				<p class="font-weight-bold">Total Penduduk Aktif</p>
			</div>
			<div class="icon">
				<i class="fas fa-users"></i>
			</div>
			<a href="index.php?page=data-pend" class="small-box-footer">
				Lihat Data <i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>

	<div class="col-lg-3 col-6">
		<div class="small-box bg-success shadow-sm" style="border-radius: 10px;">
			<div class="inner">
				<h3><?php echo number_format($kartu); ?></h3>
				<p class="font-weight-bold">Kartu Keluarga (KK)</p>
			</div>
			<div class="icon">
				<i class="fas fa-id-card"></i>
			</div>
			<a href="index.php?page=data-kartu" class="small-box-footer">
				Lihat Data <i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>

	<div class="col-lg-3 col-6">
		<div class="small-box bg-primary shadow-sm" style="border-radius: 10px;">
			<div class="inner">
				<h3><?php echo number_format($laki); ?></h3>
				<p class="font-weight-bold">Laki-laki</p>
			</div>
			<div class="icon">
				<i class="fas fa-male"></i>
			</div>
			<a href="index.php?page=lk-pend" class="small-box-footer">
				Lihat Data <i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>

	<div class="col-lg-3 col-6">
		<div class="small-box bg-pink shadow-sm" style="background-color: #e83e8c !important; color: #fff; border-radius: 10px;">
			<div class="inner">
				<h3><?php echo number_format($prem); ?></h3>
				<p class="font-weight-bold">Perempuan</p>
			</div>
			<div class="icon">
				<i class="fas fa-female"></i>
			</div>
			<a href="index.php?page=pr-pend" class="small-box-footer text-white">
				Lihat Data <i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>

	<div class="col-lg-3 col-6">
		<div class="small-box bg-teal shadow-sm" style="border-radius: 10px;">
			<div class="inner">
				<h3><?php echo number_format($lahir); ?></h3>
				<p class="font-weight-bold">Data Kelahiran</p>
			</div>
			<div class="icon">
				<i class="fas fa-baby"></i>
			</div>
			<a href="index.php?page=data-lahir" class="small-box-footer">
				Lihat Data <i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>

	<div class="col-lg-3 col-6">
		<div class="small-box bg-secondary shadow-sm" style="border-radius: 10px;">
			<div class="inner">
				<h3><?php echo number_format($mendu); ?></h3>
				<p class="font-weight-bold">Data Kematian</p>
			</div>
			<div class="icon">
				<i class="fas fa-heart-broken"></i>
			</div>
			<a href="index.php?page=data-mendu" class="small-box-footer">
				Lihat Data <i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>

	<div class="col-lg-3 col-6">
		<div class="small-box bg-warning shadow-sm" style="border-radius: 10px;">
			<div class="inner">
				<h3><?php echo number_format($datang); ?></h3>
				<p class="font-weight-bold">Data Pendatang</p>
			</div>
			<div class="icon">
				<i class="fas fa-plane-arrival"></i>
			</div>
			<a href="index.php?page=data-datang" class="small-box-footer">
				Lihat Data <i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>

	<div class="col-lg-3 col-6">
		<div class="small-box bg-danger shadow-sm" style="border-radius: 10px;">
			<div class="inner">
				<h3><?php echo number_format($pindah); ?></h3>
				<p class="font-weight-bold">Data Pindah</p>
			</div>
			<div class="icon">
				<i class="fas fa-plane-departure"></i>
			</div>
			<a href="index.php?page=data-pindah" class="small-box-footer">
				Lihat Data <i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
</div>

<!-- Interactive Charts Section (Chart.js) -->
<div class="row mt-2">
	<!-- Chart 1: Donut Gender Composition -->
	<div class="col-lg-5 col-12 mb-4">
		<div class="card shadow-sm h-100" style="border-radius: 12px;">
			<div class="card-header bg-white font-weight-bold d-flex justify-content-between align-items-center">
				<span><i class="fas fa-chart-pie text-primary mr-2"></i>Komposisi Jenis Kelamin</span>
				<span class="badge badge-light border">Status: Ada</span>
			</div>
			<div class="card-body d-flex flex-column justify-content-center align-items-center">
				<div style="position: relative; height: 240px; width: 100%;">
					<canvas id="genderChart"></canvas>
				</div>
				<div class="mt-3 text-center" style="font-size: 13.5px;">
					<span class="mr-3"><i class="fas fa-circle text-primary mr-1"></i> Laki-laki: <strong><?php echo $laki; ?></strong> jiwa</span>
					<span><i class="fas fa-circle mr-1" style="color: #e83e8c;"></i> Perempuan: <strong><?php echo $prem; ?></strong> jiwa</span>
				</div>
			</div>
		</div>
	</div>

	<!-- Chart 2: Sirkulasi Kependudukan -->
	<div class="col-lg-7 col-12 mb-4">
		<div class="card shadow-sm h-100" style="border-radius: 12px;">
			<div class="card-header bg-white font-weight-bold d-flex justify-content-between align-items-center">
				<span><i class="fas fa-chart-bar text-success mr-2"></i>Statistik Sirkulasi Kependudukan</span>
				<span class="badge badge-success">Data Terkini</span>
			</div>
			<div class="card-body">
				<div style="position: relative; height: 260px; width: 100%;">
					<canvas id="sirkulasiChart"></canvas>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Village Profile Info Card -->
<div class="row">
	<div class="col-12 mb-4">
		<div class="card shadow-sm" style="border-radius: 12px;">
			<div class="card-body">
				<div class="row align-items-center">
					<div class="col-md-2 text-center mb-3 mb-md-0">
						<img src="assets/img/kabupaten-cirebon.png?v=2" alt="Lambang Kabupaten Cirebon" style="width: 85px; filter: drop-shadow(0 4px 6px rgba(0,0,0,0.1));">
					</div>
					<div class="col-md-7 mb-3 mb-md-0">
						<h5 class="font-weight-bold text-dark mb-1">Kantor Kuwu Desa Putat</h5>
						<p class="text-muted mb-1" style="font-size: 13.5px;">
							<i class="fas fa-map-marker-alt text-danger mr-1"></i> Jl. Sedong - Sindanglaut No. 01 Desa Putat, Kecamatan Sedong, Kabupaten Cirebon, Jawa Barat 45189
						</p>
						<p class="mb-0 text-secondary" style="font-size: 13px;">
							SIDATRA melayani pengarsipan kependudukan desa, kartu keluarga, mutasi penduduk (lahir, wafat, pindah, datang), serta pencetakan surat keterangan desa secara otomatis dan terstruktur.
						</p>
					</div>
					<div class="col-md-3 text-md-right text-center">
						<span class="badge badge-success px-3 py-2 mb-2 font-weight-normal" style="font-size: 13px;">
							<i class="fas fa-check-circle mr-1"></i> Layanan Siap &bull; Online
						</span>
						<br>
						<small class="text-muted">Aplikasi SIDATRA Versi 1.0</small>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Chart initialization script -->
<script>
document.addEventListener("DOMContentLoaded", function () {
	// 1. Gender Donut Chart
	var ctxGender = document.getElementById('genderChart').getContext('2d');
	new Chart(ctxGender, {
		type: 'doughnut',
		data: {
			labels: ['Laki-laki', 'Perempuan'],
			datasets: [{
				data: [<?php echo (int)$laki; ?>, <?php echo (int)$prem; ?>],
				backgroundColor: ['#2563eb', '#e83e8c'],
				hoverBackgroundColor: ['#1d4ed8', '#d63384'],
				borderWidth: 2,
				borderColor: '#ffffff'
			}]
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,
			legend: {
				position: 'bottom',
				labels: {
					boxWidth: 14,
					fontSize: 12,
					fontFamily: "'Inter', sans-serif"
				}
			},
			cutoutPercentage: 65,
			animation: {
				animateScale: true,
				animateRotate: true
			}
		}
	});

	// 2. Sirkulasi Bar Chart
	var ctxSirkulasi = document.getElementById('sirkulasiChart').getContext('2d');
	new Chart(ctxSirkulasi, {
		type: 'bar',
		data: {
			labels: ['Lahir', 'Meninggal', 'Pendatang', 'Pindah'],
			datasets: [{
				label: 'Jumlah Jiwa',
				data: [<?php echo (int)$lahir; ?>, <?php echo (int)$mendu; ?>, <?php echo (int)$datang; ?>, <?php echo (int)$pindah; ?>],
				backgroundColor: [
					'rgba(32, 201, 151, 0.85)',
					'rgba(108, 117, 125, 0.85)',
					'rgba(255, 193, 7, 0.85)',
					'rgba(220, 53, 69, 0.85)'
				],
				borderColor: [
					'#20c997',
					'#6c757d',
					'#ffc107',
					'#dc3545'
				],
				borderWidth: 1.5,
				borderRadius: 6
			}]
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,
			legend: {
				display: false
			},
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true,
						precision: 0,
						fontFamily: "'Inter', sans-serif"
					},
					gridLines: {
						color: 'rgba(0, 0, 0, 0.05)'
					}
				}],
				xAxes: [{
					gridLines: {
						display: false
					},
					ticks: {
						fontFamily: "'Inter', sans-serif"
					}
				}]
			}
		}
	});
});
</script>