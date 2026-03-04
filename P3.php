<?php
// Mendefinisikan variabel
$nama = "John Doe";
$nim = "123456789";
$prodi = "Teknik Informatika";
$alamat = "Jl. Raya No. 123, Jakarta";

// Menampilkan biodata mahasiswa dalam tabel HTML dengan fungsi echo
echo "<table>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td>" . $nama . "</td>
        </tr>
        <tr>
            <td>NIM</td>
            <td>:</td>
            <td>" . $nim . "</td>
        </tr>
        <tr>
            <td>Program Studi</td>
            <td>:</td>
            <td>" . $prodi . "</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>" . $alamat . "</td>
        </tr>
    </table>";
?>
