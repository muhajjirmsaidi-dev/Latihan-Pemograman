<?php

require_once('config/config.php');

$id = $_GET['id'] ?? null;

if (!$id) {
    header("location: data-index.php");
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM pegawai WHERE id = :id ");
$stmt->execute(['id' => $id]);
$pegawai = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit Pegawai</title>

    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: Arial, sans-serif;
  background-color: #f4f6f9;
  color: #333;
  padding: 40px 20px;
}

/* Container */
.container {
  max-width: 900px;
  margin: auto;
}

/* Judul */
h2 {
  text-align: center;
  margin-bottom: 25px;
  color: #2c3e50;
}

/* Form */
form {
  background-color: #ffffff;
  padding: 30px;
  border-radius: 12px;
  box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
  margin-bottom: 40px;
}

label {
  display: block;
  margin-bottom: 8px;
  font-weight: bold;
  color: #34495e;
}

input {
  width: 100%;
  padding: 12px 15px;
  margin-bottom: 20px;
  border: 1px solid #dcdfe3;
  border-radius: 7px;
  font-size: 15px;
  outline: none;
  transition: 0.3s;
}

input:focus {
  border-color: #3498db;
  box-shadow: 0 0 5px rgba(52, 152, 219, 0.25);
}

button {
  width: 100%;
  padding: 13px;
  background-color: #3498db;
  color: white;
  border: none;
  border-radius: 7px;
  font-size: 16px;
  font-weight: bold;
  cursor: pointer;
  transition: 0.3s;
}

button:hover {
  background-color: #2980b9;
}

/* Tabel */
.table-container {
  background-color: #ffffff;
  padding: 25px;
  border-radius: 12px;
  box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
  overflow-x: auto;
}

table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 10px;
}

thead {
  background-color: #3498db;
  color: white;
}

th,
td {
  padding: 14px 15px;
  text-align: left;
  border-bottom: 1px solid #e5e5e5;
}

th {
  font-weight: bold;
}

tbody tr:hover {
  background-color: #f5f9fc;
}

/* Tombol aksi */
.btn-edit {
  display: inline-block;
  padding: 7px 12px;
  background-color: #f39c12;
  color: white;
  text-decoration: none;
  border-radius: 5px;
  font-size: 13px;
}

.btn-hapus {
  display: inline-block;
  padding: 7px 12px;
  background-color: #e74c3c;
  color: white;
  text-decoration: none;
  border-radius: 5px;
  font-size: 13px;
}

.btn-edit:hover {
  background-color: #d68910;
}

.btn-hapus:hover {
  background-color: #c0392b;
}

/* Responsive */
@media (max-width: 600px) {
  body {
    padding: 20px 10px;
  }

  form,
  .table-container {
    padding: 20px;
  }

  th,
  td {
    padding: 10px;
    font-size: 14px;
  }
}
    </style>
</head>

<body>

    <div class="container">

        <h2>Form Up Pegawai</h2>

        <form action="update-pegawai.php" method="post">

            <input type="hidden" name="id" value="<?php echo $pegawai['id']?>">

            <label for="namaLengkap">Nama Lengkap</label>
            <input type="text" id="namaLengkap" name="namalengkap"value ="<?php echo $pegawai['nama'];?>">

            <label for="jabatan">Jabatan</label>
            <input type="text" id="jabatan" name="jabatan" value ="<?php echo $pegawai['jabatan'];?>">

            <label for="gaji">Gaji</label>
            <input type="number" id="gaji" name="gaji" value ="<?php echo $pegawai['gaji']; ?>">

            <label for="tanggal_bergabung">Tanggal Bergabung</label>
            <input type="date" id="tanggal_bergabung" name="tanggal_bergabung"
             value ="<?php echo htmlspecialchars($pegawai['tanggal_bergabung']);?>">


            <button type="submit" name="simpan">
                edit
            </button>

        </form>



    </div>

</body>

</html>