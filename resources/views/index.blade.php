<!DOCTYPE html>
<html>
<head>
	<title>Tutorial Membuat CRUD Pada Laravel - www.malasngoding.com</title>
	<link rel="stylesheet" type="text/css" href="/css/app.css">
	<link rel="stylesheet" type="text/css" href="/assets/css.css">
</head>
<body>
<div class="container">
	<div class="card">
	<img class="icard-img-top" src="/img/employee-img.jpg" alt="Data Pegawai">
		<div class="card-body">
			<center><h2>Data Pegawai</h2></center>
			<br/>
			<div class="float-md-left">
				<a class="btn btn-primary" href="/pegawai/tambah"> + Tambah Pegawai Baru</a>
			</div>
			<div class="float-md-right form-group">
				<form action="/pegawai/cari" class="form-inline" method="GET">
					<input type="text" class="form-control" name="cari" placeholder="Cari nama pegawai..." value="{{ old('cari')}}">
					<input type="submit" class="btn btn-primary" value="CARI">
				</form>
			</div>			
			<br/>
			<br/>
			<table class='table table-bordered' border="1">
				<tr>
					<th>Nama</th>
					<th>Jabatan</th>
					<th>Umur</th>
					<th>Alamat</th>
					<th>Opsi</th>
				</tr>
				@foreach($pegawai as $p)
				<tr>
					<td>{{ $p->pegawai_nama }}</td>
					<td>{{ $p->pegawai_jabatan }}</td>
					<td>{{ $p->pegawai_umur }}</td>
					<td>{{ $p->pegawai_alamat }}</td>
					<td>
						<a href="/pegawai/edit/{{ $p->pegawai_id }}" class="btn-sm btn-secondary">Edit</a>
						|
						<a href="/pegawai/hapus/{{ $p->pegawai_id }}" class="btn-sm btn-danger">Hapus</a>
					</td>
				</tr>
				@endforeach
			</table>
			<br />
			Halaman : {{ $pegawai->currentPage()}} <br />
			Jumlah Data : {{ $pegawai->total()}}<br />
			@if ($cari=="0")
				Data per Halaman :{{$pegawai->perPage()}}<br />
			@endif

			<div class="d-flex justify-content-center">{{$pegawai->links()}}</div>
		</div>
	</div>
</div>
</body>
</html>