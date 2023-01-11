<?php
	include "../inc/koneksi.php";
	
	$id = isset($_POST['id_pend']) ? $_POST['id_pend'] : (isset($_GET['id']) ? $_GET['id'] : '');

	function tgl_indo($tanggal){
		$bulan = array (
			1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
			'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
		);
		$pecahkan = explode('-', $tanggal);
		if(count($pecahkan) == 3){
			return (int)$pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
		}
		return $tanggal;
	}

	function bulan_romawi($bln){
		$romawi = array(1=>'I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII');
		return isset($romawi[(int)$bln]) ? $romawi[(int)$bln] : $bln;
	}

	$bln_romawi = bulan_romawi(date('n'));
	$tahun_ini = date('Y');
	$tgl_sekarang = tgl_indo(date('Y-m-d'));

	$sql_tampil = "SELECT pi.*, p.nik, p.nama, p.jekel, p.tempat_lh, p.tgl_lh, p.desa, p.rt, p.rw, p.agama, p.pekerjaan 
	               FROM tb_pdd p 
	               LEFT JOIN tb_pindah pi ON pi.id_pdd = p.id_pend 
	               WHERE p.id_pend = '$id' OR pi.id_pindah = '$id'";
	$query_tampil = mysqli_query($koneksi, $sql_tampil);
	$data = mysqli_fetch_array($query_tampil, MYSQLI_BOTH);

	if(!$data) {
		echo "<script>alert('Data pindah tidak ditemukan!'); window.close();</script>";
		exit;
	}
?>
<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Surat Keterangan Pindah - <?php echo htmlspecialchars($data['nama']); ?></title>
	<link rel="icon" href="../assets/img/kabupaten-cirebon.png">
	<style>
		* {
			box-sizing: border-box;
			font-family: 'Times New Roman', Times, serif;
		}
		body {
			margin: 0;
			padding: 20px;
			background-color: #f4f6f9;
			color: #000;
		}
		.sheet {
			background: white;
			width: 210mm;
			min-height: 297mm;
			margin: 0 auto;
			padding: 20mm 25mm;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
			position: relative;
		}
		/* KOP SURAT */
		.kop {
			display: table;
			width: 100%;
			margin-bottom: 2px;
		}
		.kop-logo {
			display: table-cell;
			width: 90px;
			vertical-align: middle;
			text-align: center;
		}
		.kop-logo img {
			width: 75px;
			height: auto;
		}
		.kop-text {
			display: table-cell;
			vertical-align: middle;
			text-align: center;
		}
		.kop-text h2 {
			margin: 0;
			font-size: 16pt;
			font-weight: bold;
			text-transform: uppercase;
			letter-spacing: 0.5px;
		}
		.kop-text h3 {
			margin: 2px 0;
			font-size: 14pt;
			font-weight: bold;
			text-transform: uppercase;
		}
		.kop-text h1 {
			margin: 2px 0;
			font-size: 18pt;
			font-weight: bold;
			text-transform: uppercase;
		}
		.kop-text p {
			margin: 2px 0 0 0;
			font-size: 9.5pt;
			font-style: italic;
		}
		.garis-kop {
			border: 0;
			border-top: 2px solid #000;
			border-bottom: 1px solid #000;
			height: 4px;
			margin: 6px 0 20px 0;
		}
		/* JUDUL SURAT */
		.judul-surat {
			text-align: center;
			margin: 15px 0 20px 0;
		}
		.judul-surat h4 {
			margin: 0;
			font-size: 13pt;
			font-weight: bold;
			text-decoration: underline;
			letter-spacing: 0.5px;
		}
		.judul-surat p {
			margin: 3px 0 0 0;
			font-size: 11pt;
		}
		/* ISI SURAT */
		.isi-surat {
			font-size: 12pt;
			line-height: 1.6;
			text-align: justify;
		}
		.tabel-data {
			width: 100%;
			margin: 12px 0 16px 20px;
			font-size: 12pt;
			border-collapse: collapse;
		}
		.tabel-data td {
			padding: 4px 6px;
			vertical-align: top;
		}
		.label-col {
			width: 170px;
		}
		.titik-col {
			width: 15px;
			text-align: center;
		}
		/* TANDA TANGAN */
		.ttd-box {
			width: 100%;
			margin-top: 40px;
			display: table;
		}
		.ttd-kiri {
			display: table-cell;
			width: 50%;
		}
		.ttd-kanan {
			display: table-cell;
			width: 50%;
			text-align: center;
			font-size: 12pt;
		}
		.ttd-space {
			height: 75px;
		}
		.ttd-nama {
			font-weight: bold;
			text-decoration: underline;
		}
		/* TOOLBAR (SCREEN ONLY) */
		.no-print-bar {
			width: 210mm;
			margin: 0 auto 15px auto;
			display: flex;
			justify-content: space-between;
			align-items: center;
			background: #2c3e50;
			color: #fff;
			padding: 10px 18px;
			border-radius: 6px;
			box-shadow: 0 2px 6px rgba(0,0,0,0.2);
			font-family: Arial, sans-serif;
			font-size: 14px;
		}
		.btn-print {
			background: #27ae60;
			color: white;
			border: none;
			padding: 8px 18px;
			border-radius: 4px;
			font-size: 14px;
			font-weight: bold;
			cursor: pointer;
			display: inline-flex;
			align-items: center;
			gap: 6px;
		}
		.btn-print:hover {
			background: #219653;
		}
		.btn-back {
			background: #7f8c8d;
			color: white;
			border: none;
			padding: 8px 16px;
			border-radius: 4px;
			font-size: 14px;
			cursor: pointer;
			text-decoration: none;
		}
		.btn-back:hover {
			background: #636e72;
		}
		@media print {
			body {
				background: white;
				padding: 0;
			}
			.sheet {
				box-shadow: none;
				margin: 0;
				width: 100%;
				min-height: auto;
				padding: 10mm 15mm;
			}
			.no-print-bar {
				display: none !important;
			}
			@page {
				size: A4 portrait;
				margin: 10mm;
			}
		}
	</style>
</head>
<body>

	<div class="no-print-bar">
		<div>
			<strong>Preview Cetak Surat Keterangan Pindah</strong>
		</div>
		<div>
			<a href="javascript:window.close()" class="btn-back">Tutup Halaman</a>
			<button onclick="window.print()" class="btn-print">&#128438; Cetak Dokumen</button>
		</div>
	</div>

	<div class="sheet">
		<!-- KOP SURAT -->
		<div class="kop">
			<div class="kop-logo">
				<img src="../assets/img/kabupaten-cirebon.png?v=2" alt="Logo Kabupaten Cirebon">
			</div>
			<div class="kop-text">
				<h2>PEMERINTAH KABUPATEN CIREBON</h2>
				<h3>KECAMATAN SEDONG</h3>
				<h1>KANTOR KUWU DESA PUTAT</h1>
				<p>Jl. Sedong - Sindanglaut No. 01 Desa Putat Kec. Sedong Kab. Cirebon 45189</p>
			</div>
		</div>
		<hr class="garis-kop">

		<!-- JUDUL SURAT -->
		<div class="judul-surat">
			<h4>SURAT KETERANGAN PINDAH</h4>
			<p>Nomor : 475.2 / <?php echo sprintf('%03d', !empty($data['id_pindah']) ? $data['id_pindah'] : $data['id_pend']); ?> / Ket.Pindah / <?php echo $bln_romawi; ?> / <?php echo $tahun_ini; ?></p>
		</div>

		<!-- ISI SURAT -->
		<div class="isi-surat">
			<p style="text-indent: 30px;">
				Yang bertanda tangan di bawah ini Kuwu Desa Putat, Kecamatan Sedong, Kabupaten Cirebon, dengan ini menerangkan bahwa :
			</p>

			<table class="tabel-data">
				<tr>
					<td class="label-col">NIK</td>
					<td class="titik-col">:</td>
					<td><strong><?php echo htmlspecialchars($data['nik']); ?></strong></td>
				</tr>
				<tr>
					<td class="label-col">Nama Lengkap</td>
					<td class="titik-col">:</td>
					<td><strong><?php echo htmlspecialchars($data['nama']); ?></strong></td>
				</tr>
				<tr>
					<td class="label-col">Jenis Kelamin</td>
					<td class="titik-col">:</td>
					<td><?php echo ($data['jekel'] == 'LK') ? 'Laki-laki' : 'Perempuan'; ?></td>
				</tr>
				<tr>
					<td class="label-col">Tempat / Tgl Lahir</td>
					<td class="titik-col">:</td>
					<td><?php echo htmlspecialchars($data['tempat_lh']); ?>, <?php echo tgl_indo($data['tgl_lh']); ?></td>
				</tr>
				<tr>
					<td class="label-col">Alamat Asal</td>
					<td class="titik-col">:</td>
					<td>Desa Putat RT <?php echo htmlspecialchars($data['rt']); ?> / RW <?php echo htmlspecialchars($data['rw']); ?>, Kec. Sedong, Kab. Cirebon</td>
				</tr>
				<?php if(!empty($data['tgl_pindah'])) { ?>
				<tr>
					<td class="label-col">Tanggal Pindah</td>
					<td class="titik-col">:</td>
					<td><?php echo tgl_indo($data['tgl_pindah']); ?></td>
				</tr>
				<?php } ?>
				<?php if(!empty($data['alasan'])) { ?>
				<tr>
					<td class="label-col">Alasan Pindah</td>
					<td class="titik-col">:</td>
					<td><?php echo htmlspecialchars($data['alasan']); ?></td>
				</tr>
				<?php } ?>
			</table>

			<p style="text-indent: 30px;">
				Bahwa nama tersebut di atas adalah benar tercatat pernah berdomisili di Desa Putat dan saat ini telah mengajukan permohonan <strong>Pindah Domisili</strong>.
			</p>

			<p style="text-indent: 30px;">
				Demikian Surat Keterangan Pindah ini kami buat dengan sebenarnya agar dapat dipergunakan sebagaimana mestinya untuk pengurusan administrasi kependudukan di daerah tujuan.
			</p>
		</div>

		<!-- TTD -->
		<div class="ttd-box">
			<div class="ttd-kiri"></div>
			<div class="ttd-kanan">
				<p>
					Putat, <?php echo $tgl_sekarang; ?><br>
					<strong>Kuwu Desa Putat</strong>
				</p>
				<div class="ttd-space"></div>
				<p class="ttd-nama">( .................................................... )</p>
			</div>
		</div>
	</div>

</body>
</html>