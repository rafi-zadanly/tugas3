<?php 
    session_start();
    include "koneksi.php";

    $query2 = mysqli_query($connect, "SELECT MAX(id) AS id FROM `data`");

    $getMaxID = mysqli_fetch_array($query2);

    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $satuan = $_POST['satuan'];
        $kategori = $_POST['kategori'];
        $gambar = $_POST['urlgambar'];
        $stok = $_POST['stok'];

        if ($nama != "" && $harga != "" && $satuan != "null" && $kategori != "null" && $gambar != "" && $stok != "") {
            $sql = "INSERT INTO `data`(`id`, `nama`, `harga`, `satuan`, `kategori`, `gambar`, `stok`) VALUES ($id, '$nama',$harga,'$satuan','$kategori','$gambar',$stok)";

            mysqli_query($connect, $sql);
        }
        header('location: index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 3</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-1">

        <!-- <div class="row bg-dark" style="height: 8px;"></div> -->
        <div class="row bg-dark mt-2" style="height: 8px;"></div>

        <div class="row bg-primary">
            <div class="col-md-12">
                <h3 class="text-light text-lg-center">Form Input</h3>
            </div>
        </div>

        <div class="row" style="height: 8px;"></div>

        <div class="row bg-primary pt-3 rounded">
            <div class="col-md-3"></div>

            <div class="col-md-6">
            <form action="" method="post">
            
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text text-dark" style="width: 140px;" id="inputGroup-sizing-default">ID</span>
                    </div>
                    <input type="number" class="form-control bg-light" value="<?= ($getMaxID['id']+1) ?>" disabled aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    <input type="hidden" name="id" value="<?= ($getMaxID['id']+1) ?>">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text text-dark" style="width: 140px;" id="inputGroup-sizing-default">Nama Produk</span>
                    </div>
                    <input type="text" name="nama" class="form-control bg-light" value="" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text text-dark" style="width: 140px;" id="inputGroup-sizing-default">Harga Produk</span>
                    </div>
                    <input type="number" name="harga" class="form-control bg-light" value="" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text text-dark" style="width: 140px;" id="inputGroup-sizing-default">Satuan</span>
                    </div>
                    <select name="satuan" id="" class="form-control">
                        <option value="null">Choose..</option>
                        <option value="Pcs">Pcs</option>
                        <option value="Pack">Pack</option>
                    </select>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text text-dark" style="width: 140px;" id="inputGroup-sizing-default">Kategori</span>
                    </div>
                    <select name="kategori" id="" class="form-control">
                        <option value="null">Choose..</option>
                        <option value="Baju">Baju</option>
                        <option value="Celana">Celana</option>
                        <option value="Sepatu">Sepatu</option>
                    </select>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text text-dark" style="width: 140px;" id="inputGroup-sizing-default">URL Gambar</span>
                    </div>
                    <input type="url" name="urlgambar" class="form-control bg-light" value="" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text text-dark" style="width: 140px;" id="inputGroup-sizing-default">Stok</span>
                    </div>
                    <input type="number" name="stok" class="form-control bg-light" value="" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                </div>

                <div class="input-group mb-3">
                    <input type="submit" name="submit" class="btn btn-dark" style="width: 140px;" value="Simpan">
                </div>

            </form>
            </div>

        </div>
    </div>

    <div class="container-fluid mt-3">

        <div class="row">
            <div class="col-md-12">
                <h3 class="text-dark text-center"><b>Tabel Data</b></h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 bg-dark rounded" style="height: 10px;"></div>
        </div>

        <div class="row mt-2 ml-2 mr-2">
            <table class="table table-hover table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama Produk</th>
                    <th>Harga Produk</th>
                    <th>Satuan</th>
                    <th>Kategori</th>
                    <th>URL Gambar</th>
                    <th>Stok</th>
                    <th>Action</th>
                </tr>
                <?php 
                $query = mysqli_query($connect, "SELECT * FROM `data`");
                foreach ($query as $data) :
                ?>
                <tr>
                    <td><?= $data['id'] ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td><?= $data['harga'] ?></td>
                    <td><?= $data['satuan'] ?></td>
                    <td><?= $data['kategori'] ?></td>
                    <td><img src="<?= $data['gambar'] ?>" alt="" width="100px"></td>
                    <td <?php if ($data['stok'] <= 5) : ?> style="background-color: red; color: white;" <?php endif; ?> ><?= $data['stok'] ?></td>
                    <td><a href="delete.php?id=<?= $data['id'] ?>">Delete</a></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>

    </div>
</body>
</html>