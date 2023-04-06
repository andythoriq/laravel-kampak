<!DOCTYPE html>
<html>
<head>
    <title>WEB PENILAIAN</title>
  <style>
    body {
        background: #24C6DC;
        background: -webkit-linear-gradient(to bottom, #514A9D, #24C6DC);
        background: linear-gradient(to bottom, #514A9D, #24C6DC);
        font-family:Verdana, Tahoma, sans-serif
    }
    .container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .container a {
        color: #ECF9FF;
        background-image: linear-gradient(19deg, #21D4FD 0%, #B721FF 100%);
        padding: 2px 4px;
        border-radius: 10px;
    }
    .card {
      width: 300px;
      height: 200px;
      margin: 10px;
      text-align: center;
      background-color: #0093E9;
      background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);
      border-radius: 10px;
      box-shadow: 2px 2px 5px rgba(0,0,0,0.3);
    }

    .card h2 {
      margin-top: 50px;
      color: white;
    }
  </style>
</head>
<body>
    <h1 align="center" style="color: white;">WEB PENILAIAN</h1>
  <div class="container">
    <div class="card">
      <h2>Halaman : <a href="{{ route('guru.index') }}">Guru</a></h2>
    </div>
    <div class="card">
      <h2>Halaman : <a href="{{ route('jurusan.index') }}">Jurusan</a></h2>
    </div>
    <div class="card">
      <h2>Halaman : <a href="{{ route('mapel.index') }}">Mapel</a></h2>
    </div>
    <div class="card">
      <h2>Halaman : <a href="{{ route('kelas.index') }}">Kelas</a></h2>
    </div>
    <div class="card">
      <h2>Halaman : <a href="{{ route('siswa.index') }}">Siswa</a></h2>
    </div>
    <div class="card">
      <h2>Halaman : <a href="{{ route('mengajar.index') }}">Mengajar</a></h2>
    </div>
    <div class="card">
      <h2>Halaman : <a href="{{ route('nilai.index') }}">Nilai</a></h2>
    </div>
    <div class="card">
      <h2>Halaman : </h2>
    </div>
  </div>
</body>
</html>
