<?php
$id = $_GET['id'];

$ambil = $koneksi->query("SELECT * FROM tb_kategori WHERE kategori_id = '$id'");
$pecah = $ambil->fetch_object();
//var_dump($pecah);
?>

<div id="content-wrapper">

    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php?page=module/kategori/index">Data Kategori</a>
            </li>
            <li class="breadcrumb-item active">Edit Data Kategori</li>
            <li class="breadcrumb-item">
                <?php echo $pecah->kategori_id ?>
            </li>


        </ol>
        <h1>Edit Data Kategori</h1>

        <!-- DataTables Example -->
        <div class=" card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Edit Data Kategori</div>
            <div class="card-body col-md-6">
                <a href="index.php?page=module/kategori/index" class="btn btn-primary" style="float: left">Kembali</a> <br><br>
                <form method="POST">

                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="hidden" class="form-control" name="id" value="<?php echo $pecah->kategori_id ?>">
                            <input type="text" class="form-control" name="namakategori" value="<?php echo $pecah->kategori_nama ?>">
                            <label>Nama Kategori</label>
                        </div>
                    </div>
                    <button class="btn btn-primary" name="edit">Update</button>
                    <button class="btn btn-warning" value="reset">Reset</button>
                </form>
                <?php
                if (isset($_POST['edit'])) {
                    $id = $_POST['id'];
                    $namakategori = $_POST['namakategori'];

                    // echo $namakategori . "<br>";
                    // echo $password . "<br>";
                    // echo $nama . "<br>";

                    $edit = $koneksi->query("UPDATE tb_kategori SET kategori_nama= '$namakategori' WHERE kategori_id='$id'");

                    if ($edit) {
                        echo "<script>
                        Swal.fire(
                            'Update!',
                            'Your file has been Update.',
                            'success'
                        );;
                        window.location='index.php?page=module/kategori/index';
                        </script>";
                    } else {
                        echo "<script>alert('Data Tidak Disimpan');
                        window.location='index.php?page=module/kategori/index';
                        </script>";
                    }
                }

                ?>
            </div>

        </div>

    </div>
    <!-- /.container-fluid -->

    <!-- Sticky Footer -->
    <footer class="sticky-footer">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright © Bakaba.com</span>
            </div>
        </div>
    </footer>

</div>