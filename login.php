<?php
  session_start();
  include "inc/koneksi.php";

  // Jika sudah login, langsung lempar ke index
  if (isset($_SESSION["ses_username"]) && !empty($_SESSION["ses_username"])) {
      header("location: index.php");
      exit;
  }

  $pesan_error = "";

  if (isset($_POST['btnLogin'])) {  
      $username = mysqli_real_escape_string($koneksi, trim($_POST['username']));
      $password = mysqli_real_escape_string($koneksi, trim($_POST['password']));

      // Cari user berdasarkan username
      $sql_login = "SELECT * FROM tb_pengguna WHERE BINARY username='$username'";
      $query_login = mysqli_query($koneksi, $sql_login);
      $data_login = mysqli_fetch_array($query_login, MYSQLI_BOTH);
      $jumlah_login = mysqli_num_rows($query_login);

      // Verifikasi password (cocokkan plaintext atau password_verify untuk hash)
      $login_sukses = false;
      if ($jumlah_login == 1) {
          if ($data_login['password'] === $password || password_verify($password, $data_login['password'])) {
              $login_sukses = true;
          }
      }

      if ($login_sukses) {
          $_SESSION["ses_id"] = $data_login["id_pengguna"];
          $_SESSION["ses_nama"] = $data_login["nama_pengguna"];
          $_SESSION["ses_username"] = $data_login["username"];
          $_SESSION["ses_level"] = $data_login["level"];
      
          echo "<!DOCTYPE html><html><head><script src='plugins/alert.js'></script></head><body><script>
              Swal.fire({
                  title: 'Selamat Datang!',
                  text: 'Login berhasil sebagai " . addslashes($data_login["nama_pengguna"]) . "',
                  icon: 'success',
                  showConfirmButton: false,
                  timer: 1300
              }).then(() => {
                  window.location = 'index.php';
              });
          </script></body></html>";
          exit;
      } else {
          $pesan_error = "Username atau Password yang Anda masukkan salah!";
      }
  }
?>

<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login | SIDATRA - Sistem Informasi dan Administrasi Kependudukan Terpadu</title>
	<link rel="icon" href="assets/img/kabupaten-cirebon.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<!-- SweetAlert2 -->
	<script src="plugins/alert.js"></script>

	<style>
		body {
			font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
			background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #0f2b48 100%);
			min-height: 100vh;
			display: flex;
			align-items: center;
			justify-content: center;
			padding: 20px 10px;
			margin: 0;
		}
		.login-card-container {
			width: 100%;
			max-width: 440px;
		}
		.glass-card {
			background: rgba(255, 255, 255, 0.98);
			backdrop-filter: blur(12px);
			border-radius: 16px;
			box-shadow: 0 20px 40px rgba(0, 0, 0, 0.35), 0 0 0 1px rgba(255, 255, 255, 0.1);
			padding: 32px 28px;
			border: none;
		}
		.brand-header {
			text-align: center;
			margin-bottom: 24px;
		}
		.brand-logo {
			width: 82px;
			height: auto;
			filter: drop-shadow(0 4px 8px rgba(0,0,0,0.15));
			transition: transform 0.3s ease;
		}
		.brand-logo:hover {
			transform: scale(1.05);
		}
		.brand-title {
			font-size: 22px;
			font-weight: 700;
			color: #0f172a;
			margin-top: 12px;
			margin-bottom: 2px;
			letter-spacing: -0.5px;
		}
		.brand-subtitle {
			font-size: 13px;
			color: #64748b;
			margin: 0;
			font-weight: 500;
		}
		.form-control {
			border-radius: 8px;
			height: 46px;
			border: 1.5px solid #cbd5e1;
			font-size: 14px;
			transition: all 0.2s ease;
		}
		.form-control:focus {
			border-color: #2563eb;
			box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
		}
		.input-group-text {
			background-color: #f8fafc;
			border: 1.5px solid #cbd5e1;
			border-radius: 8px;
			color: #64748b;
		}
		.btn-login {
			height: 46px;
			border-radius: 8px;
			font-size: 15px;
			font-weight: 600;
			background: linear-gradient(135deg, #1e3a8a 0%, #2563eb 100%);
			border: none;
			color: white;
			box-shadow: 0 4px 12px rgba(37, 99, 235, 0.35);
			transition: all 0.2s ease;
		}
		.btn-login:hover {
			background: linear-gradient(135deg, #172554 0%, #1d4ed8 100%);
			transform: translateY(-1px);
			box-shadow: 0 6px 16px rgba(37, 99, 235, 0.45);
			color: #fff;
		}
		.footer-note {
			text-align: center;
			color: #94a3b8;
			font-size: 12px;
			margin-top: 20px;
		}
		.footer-note strong {
			color: #cbd5e1;
		}
		.toggle-pass {
			cursor: pointer;
		}
	</style>
</head>
<body>

<div class="login-card-container">
	<div class="glass-card">
		<div class="brand-header">
			<img src="assets/img/kabupaten-cirebon.png?v=2" alt="Logo Kabupaten Cirebon" class="brand-logo">
			<h1 class="brand-title">SIDATRA DESA PUTAT</h1>
			<p class="brand-subtitle">Sistem Informasi dan Administrasi Kependudukan Terpadu</p>
		</div>

		<?php if(!empty($pesan_error)): ?>
		<div class="alert alert-danger py-2 px-3 mb-3 text-center" style="font-size: 13.5px; border-radius: 8px;">
			<i class="fas fa-exclamation-circle mr-1"></i> <?php echo htmlspecialchars($pesan_error); ?>
		</div>
		<?php endif; ?>

		<form action="" method="post">
			<div class="input-group mb-3">
				<input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" required autocomplete="off">
				<div class="input-group-append">
					<div class="input-group-text">
						<span class="fas fa-user"></span>
					</div>
				</div>
			</div>

			<div class="input-group mb-3">
				<input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
				<div class="input-group-append">
					<div class="input-group-text toggle-pass" onclick="togglePassword()" title="Tampilkan/Sembunyikan Password">
						<span class="fas fa-eye" id="eyeIcon"></span>
					</div>
				</div>
			</div>

			<button type="submit" class="btn btn-login btn-block" name="btnLogin" title="Masuk ke Sistem">
				<i class="fas fa-sign-in-alt mr-1"></i> Masuk ke Sistem
			</button>
		</form>

	</div>

	<div class="footer-note">
		&copy; <?php echo date('Y'); ?> <strong>Shendy Fatihara</strong> &bull; Desa Putat, Kec. Sedong, Cirebon
	</div>
</div>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script>
	function togglePassword() {
		const passInput = document.getElementById('password');
		const eyeIcon = document.getElementById('eyeIcon');
		if (passInput.type === 'password') {
			passInput.type = 'text';
			eyeIcon.classList.remove('fa-eye');
			eyeIcon.classList.add('fa-eye-slash');
		} else {
			passInput.type = 'password';
			eyeIcon.classList.remove('fa-eye-slash');
			eyeIcon.classList.add('fa-eye');
		}
	}
</script>

</body>
</html>
