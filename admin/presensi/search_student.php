<?php
// sambungkan ke database Anda
$conn = new mysqli('localhost', 'root', '', 'krisma');

// cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// ambil kata kunci pencarian
$search = $_GET['q'];

// query untuk mengambil data siswa berdasarkan kata kunci pencarian
$sql = "SELECT id_siswa, nama_siswa FROM tb_siswa WHERE nama_siswa LIKE '%$search%'";
$result = $conn->query($sql);

$siswa = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $siswa[] = [
            'id_siswa' => $row['id_siswa'],
            'nama_siswa' => $row['nama_siswa']
        ];
    }
}

// kembalikan data dalam format JSON
echo json_encode($siswa);

$conn->close();
?>
