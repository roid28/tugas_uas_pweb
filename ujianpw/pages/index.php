<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #1a1a1a;
            color: #ffffff;
        }
        .card {
            background-color: #2c2c2c;
            border: none;
        }
        .table {
            color: #ffffff;
        }
        .table-dark {
            background-color: #2c2c2c;
        }
        .btn-outline-light:hover {
            color: #1a1a1a;
        }
        .accent-color {
            color: #00ffaa;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand accent-color" href="#">Tugas UAS Pemograman WEB</a>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="card-title accent-color">Data Mahasiswa</h1>
                    <a href="tambah.php" class="btn btn-outline-light">
                        Tambah Mahasiswa
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-dark table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>Program Studi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                             require 'config.php';
                             $query = $config->query("SELECT * FROM mahasiswa");
                             $no = 1;
                             while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                                 echo '<tr>';
                                 echo '<td>' . $no++ . '</td>';
                                 echo '<td>' . htmlspecialchars($row['nim']) . '</td>';
                                 echo '<td>' . htmlspecialchars($row['nama']) . '</td>';
                                 echo '<td>' . ($row['jenis_kelamin'] == 1 ? 'Laki-laki' : 'Perempuan') . '</td>';
                                 echo '<td>' . htmlspecialchars($row['alamat']) . '</td>';
                                 echo '<td>' . htmlspecialchars($row['program_studi']) . '</td>';
                                 echo '<td>';
                                 echo '<a class="btn btn-sm btn-primary" href="detail.php?id=' . $row['id'] . '">';
                                 echo '<i class="mdi mdi-eye"></i> Detail</a> ';
                                 echo '<a class="btn btn-sm btn-info" href="edit.php?id=' . $row['id'] . '">';
                                 echo '<i class="mdi mdi-pencil"></i> Edit</a> ';
                                 echo '<a class="btn btn-sm btn-danger" href="hapus.php?id=' . $row['id'] . '">';
                                 echo '<i class="mdi mdi-trash-can"></i> Hapus</a>';
                                 echo '</td>';
                                 echo '</tr>';
                             }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>