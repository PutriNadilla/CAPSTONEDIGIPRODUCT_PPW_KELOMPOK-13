<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Universitas Berdasarkan Program Studi Terbaik</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Montserrat', sans-serif;
        }
        body {
            font-family: "Montserrat", sans-serif;
            -webkit-font-smoothing: antialiased;
        }
        .title {
            width: 50%;
            margin-top: 50px auto;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        select {
            width: 100%;
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .universitas-list {
            margin-top: 20px;
        }
        .universitas-list p {
            margin-bottom: 10px;
            font-size: 18px;
        }
        .container {
            width: 50%;
            margin: 50px auto;
            margin-top: 50px; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Daftar Universitas Berdasarkan Program Studi</h1>
        <form method="post">
            <div class="form-group">
                <label for="program_studi">Pilih Program Studi:</label>
                <select name="program_studi" id="program_studi">
                    <option value="Law">Law</option>
                    <option value="Economics">Economics</option>
                    <option value="Computer Science">Computer Science</option>
                    <option value="Natural Sciences">Natural Sciences</option>
                    <option value="Physics">Physics</option>
                </select>
            </div>
            <button type="submit">Tampilkan</button>
        </form>

        <div class="universitas-list">
            <?php
            // Proses penampilan data universitas berdasarkan program studi yang dipilih
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Koneksi ke database (sesuaikan dengan konfigurasi Anda)
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "globalcampusguide";
                $koneksi = new mysqli($servername, $username, $password, $dbname);

                // Periksa koneksi
                if ($koneksi->connect_error) {
                    die("Koneksi ke database gagal: " . $koneksi->connect_error);
                }

                $program_studi = $_POST["program_studi"];
                // Query untuk mengambil data universitas berdasarkan program studi yang dipilih
                $query = "";
                switch ($program_studi) {
                    case 'Law':
                        $query = "SELECT * FROM universitas WHERE namauniversitas IN ('Harvard University', 'University of Oxford')";
                        break;
                    case 'Economics':
                        $query = "SELECT * FROM universitas WHERE namauniversitas IN ('Columbia University', 'Yale University')";
                        break;
                    case 'Computer Science':
                        $query = "SELECT * FROM universitas WHERE namauniversitas IN ('California Institute of Technology', 'Massachusetts Institute of Technology')";
                        break;
                    case 'Natural Sciences':
                        $query = "SELECT * FROM universitas WHERE namauniversitas IN ('Stanford University', 'Princeton University')";
                        break;
                    case 'Physics':
                        $query = "SELECT * FROM universitas WHERE namauniversitas IN ('University of Cambridge', 'University of California, Berkeley')";
                        break;
                    default:
                        echo "Tidak ada data universitas untuk program studi ini.";
                        break;
                }

                $result = $koneksi->query($query);

                if ($result->num_rows > 0) {
                    // Tampilkan data universitas
                    while ($row = $result->fetch_assoc()) {
                        echo "<p>Nama Universitas: " . $row["namauniversitas"] . "</p>";
                        // Tambahkan kolom lainnya sesuai kebutuhan
                    }
                } else {
                    echo "Tidak ada data universitas untuk program studi ini.";
                }

                // Tutup koneksi
                $koneksi->close();
            }
            ?>
        </div>
    </div>
</body>
</html>
