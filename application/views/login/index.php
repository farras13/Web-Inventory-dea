<!-- <link rel="stylesheet" href="<?= base_url() ?> -->
<!doctype html>
<html lang=" en" class="fullscreen-bg">

<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/main.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="icon" type="image/png" sizes="96x96" href="<?= base_url() ?>assets/img/favicon.png">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<div class="header">
								<div class="logo text-center"><img src="<?= base_url() ?>assets/img/favicon.png" style="size: 80px"></div>
								<p class="lead">Silahkan login untuk melanjutkan</p>
							</div>
							<form action="<?= base_url() ?>Login/proses_login" id="login" method="POST" class="form-login">
								<div class="form-group">
									<label class="control-label sr-only">Username</label>
									<input type="text" class="form-control" name="username" placeholder="Username" autofocus>
								</div>
								<div class="form-group">
									<label for="signin-password" class="control-label sr-only">Password</label>
									<input type="password" class="form-control" name="password" placeholder="Password">
								</div>
								<button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i>LOGIN</button>
							</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading">Selamat Datang di Website Peminjaman Barang Berbasis Online</h1>
							<p></p>
						</div>
					</div>
					<div class="clearfix"><center><a href="<?= base_url('Dashboard') ?>"><i style="margin-top: 10px;" class="fa fa-undo"></i><p style="font-size: large;">Go Back</p></a></center></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>
