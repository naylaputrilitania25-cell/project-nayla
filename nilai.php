<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penilaian Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .result-box {
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            padding: 15px;
            border-radius: 4px;
            margin-top: 20px;
            color: #155724;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow">
                <div class="card-body">
                    <h3 class="mb-4">Nilai Mahasiswa</h3>

                    <?php
                        $kehadiran = "";
                        $praktikum = "";
                        $uts = "";
                        $uas = "";
                        $nilaiAkhir = 0;
                        $nilaiHuruf = "";
                        $showResult = false;

                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $kehadiran = floatval($_POST['kehadiran']);
                            $praktikum = floatval($_POST['praktikum']);
                            $uts = floatval($_POST['uts']);
                            $uas = floatval($_POST['uas']);

                            $nilaiAkhir = ($kehadiran * 0.10) + ($praktikum * 0.40) + ($uts * 0.25) + ($uas * 0.25);
                            
                            if ($nilaiAkhir >= 85) {
                                $nilaiHuruf = "A";
                            } elseif ($nilaiAkhir >= 80 && $nilaiAkhir <= 84) {
                                $nilaiHuruf = "A-";
                            } elseif ($nilaiAkhir >= 75 && $nilaiAkhir <= 79) {
                                $nilaiHuruf = "B+";
                            } elseif ($nilaiAkhir >= 70 && $nilaiAkhir <= 74) {
                                $nilaiHuruf = "B";
                            } elseif ($nilaiAkhir >= 65 && $nilaiAkhir <= 69) {
                                $nilaiHuruf = "B-";
                            } elseif ($nilaiAkhir >= 60 && $nilaiAkhir <= 64) {
                                $nilaiHuruf = "C+";
                            } elseif ($nilaiAkhir >= 55 && $nilaiAkhir <= 59) {
                                $nilaiHuruf = "C";
                            } elseif ($nilaiAkhir >= 50 && $nilaiAkhir <= 54) {
                                $nilaiHuruf = "C-";
                            } elseif ($nilaiAkhir >= 45 && $nilaiAkhir <= 49) {
                                $nilaiHuruf = "D+";
                            } elseif ($nilaiAkhir >= 40 && $nilaiAkhir <= 44) {
                                $nilaiHuruf = "D";
                            } else {
                                $nilaiHuruf = "E";
                            }

                            $showResult = true;
                        }
                    ?>

                    <form method="POST" action="">
                        <div class="mb-3">
                            <label for="kehadiran" class="form-label">Nilai Kehadiran:</label>
                            <input type="number" class="form-control" id="kehadiran" name="kehadiran" 
                                   min="0" max="100" step="0.01" value="<?php echo $kehadiran; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="praktikum" class="form-label">Nilai Praktikum:</label>
                            <input type="number" class="form-control" id="praktikum" name="praktikum" 
                                   min="0" max="100" step="0.01" value="<?php echo $praktikum; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="uts" class="form-label">Nilai UTS:</label>
                            <input type="number" class="form-control" id="uts" name="uts" 
                                   min="0" max="100" step="0.01" value="<?php echo $uts; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="uas" class="form-label">Nilai UAS:</label>
                            <input type="number" class="form-control" id="uas" name="uas" 
                                   min="0" max="100" step="0.01" value="<?php echo $uas; ?>" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Hitung</button>

                        <?php if ($showResult): ?>
                            <div class="result-box">
                                <strong>Nilai Akhir: <?php echo number_format($nilaiAkhir, 2); ?> | Nilai Huruf: <?php echo $nilaiHuruf; ?></strong>
                            </div>
                        <?php endif; ?>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>