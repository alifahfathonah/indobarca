<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(). "css/main_cabang.css" ?>">

		<meta charset="UTF-8">
		<title>INDOBARCA FANS | CABANG</title>

		<style type="text/css">
			body{
				margin-top: 0px;
				margin-left: 0px;
				margin-right: 0px;
				margin-right: 0px;
			}
		</style>
	</head>

	<body bgcolor= #ebebeb>
		<div id="container">
			<div id="header">
				<img src="<?php echo base_url(). "gambar/fcb_header.jpg" ?>">
			</div>
			<div id="menu">
				<ul>
					<li><a href="<?php echo base_url(); ?>">HOME</a></li>
					<li><a href="#">MASTER</a>
						<ul>
							<li><a href="<?php echo base_url()."index.php/controller_barangindex"; ?>">BARANG</a></li><br/>
							<li><a href="<?php echo base_url()."index.php/controller_cabang/index"; ?>">CABANG</a></li><br/>
							<li><a href="<?php echo base_url()."index.php/controller_member/index"; ?>">MEMBER</a></li>
						</ul>
					</li>
					<li><a href="#">ABOUT</a>
						<ul>
							<li><a href="<?php echo base_url()."index.php/controller_penulis/index"; ?>">PENULIS</a></li><br/>
							<li><a href="<?php echo base_url()."index.php/controller_about/index"; ?>">WEBSITE</a></li><br/>
						</ul>
					</li>
				</ul>
			</div>
			<div id="match">
				<h2 style="font-family: sans-serif; text-align: center; color: yellow;">LIST INDOBARCA CABANG</h2>
				<table align="center" border="1" style="border-collapse: collapse; font-family: monospace;">
					<form>
						<tr bgcolor= "red" align="center">
							<td width="5">ID</td>
							<td width="150">NAMA CABANG</td>
							<td width="130">NAMA ATASAN</td>
							<td width="100">TELEPON</td>
							<td width="140">
								<a href="<?php echo base_url(). "index.php/controller_cabang/add_data"; ?>">TAMBAH DATA</a>
							</td>
						</tr>
					<?php $i=1; foreach($data as $d){ ?>
						<tr bgcolor="white">
							<td><?php echo $i; ?></td>
							<td><?php echo $d['nama_cabang'] ?></td>
							<td><?php echo $d['nama_atasan'] ?></td>
							<td><?php echo $d['telepon'] ?></td>
							<td align="center">
								<a href="<?php echo base_url(). "index.php/controller_cabang/edit_data/".$d['id']; ?>">EDIT</a> ||
								<a href="<?php echo base_url(). "index.php/controller_cabang/do_delete/".$d['id']; ?>">DELETE</a>
							</td>
						</tr>
					<?php $i++; } ?>
					</form>
				</table>
			</div>
			<div id="sidebar">
				<img src="<?php echo base_url(). "gambar/fcb_sidebar.jpg" ?>">
			</div>
			<div id="sponsor">
				<img src="<?php echo base_url(). "gambar/fcb_footer.jpg" ?>">
			</div>
			<div id="sosmed">
				<img src="<?php echo base_url(). "gambar/fcb_sosmed.jpg" ?>">
			</div>
			<div id="footer" style="text-align: center; vertical-align: middle;">
				IndoBarcaFans. All Right Reserved. Copyright <a href="http://www.instagram.com/a_pardana" target="_blank" style="color: #FFF; text-decoration: none;">@A_Pardana</a>
			</div>
		</div>
	</body>
</html>