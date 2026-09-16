<?php

require_once 'config/config.php';

if (isset($_POST['simpan'])){

    $id = $_POST['id'] ?? null;
    $nama = $_POST['namalengkap'] ?? '';
    $jabatan = $_POST['jabatan'] ?? '';
    $gaji = $_POST['gaji'] ?? 0;

if (!$id) {
    header("Location: index.php");
    exit;
}


$stmt = $pdo->prepare(
    "UPDATE pegawai
    SET nama = :nama,
        jabatan = :jabatan,
        gaji  = :gaji
    WHERE id = :id
");

$stmt->execute([
    'nama' => $nama,
    'jabatan' => $jabatan,
    'gaji' => $gaji,
    'id' => $id
]);

Header("Location: index.php");
exit;
}