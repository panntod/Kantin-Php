<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Menu</title>
    <?php include 'link.style.php' ?>
</head>

<body>
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <?php
            include "server.php";
            $qry_get_menu = mysqli_query($conn, "select * from menu where id_menu = '{$_GET['id_menu']}'");
            $dt_menu = mysqli_fetch_array($qry_get_menu);
            ?>

            <div class="section-header">
                <h2>Update Page</h2>
            </div>

            <div class="row gx-lg-0 gy-4">

                <div class="col-lg-4">
                    <div class="info-container d-flex flex-column align-items-center justify-content-center">
                        <img id="gambar-img" src="<?= $dt_menu['gambar'] ?>" class="img-fluid shadow-lg"
                            style="width: 300px; height: auto; border-radius:2rem; background: center/cover no-repeat;"
                            alt="data-bg" data-aos="zoom-out" data-aos-delay="100">
                    </div>
                </div>

                <div class="col-lg-8">
                    <form action="proses_ubah_menu.php" method="post" class="php-email-form">
                        <input type="hidden" name="id_menu" value="<?= $dt_menu['id_menu'] ?>">

                        <div class="form-group mt-3">
                            <input type="text" name="nama_menu" class="form-control"
                                style="height: 50px; border-radius: 10px;" value="<?= $dt_menu['nama_menu'] ?>" placeholder="Masukan Nama Menu" required>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="deskripsi_menu"
                                style="height: 50px; border-radius: 10px;" value="<?= $dt_menu['deskripsi_menu'] ?>" placeholder="Masukan deskripsi" required>
                        </div>

                        <div class="form-group mt-3 d-flex">
                            <input type="text" class="form-control me-3" name="gambar" id="gambar"
                                style="height: 50px; border-radius: 10px;" value="<?= $dt_menu['gambar'] ?>" placeholder="Masukan Url Gambar" required>
                            <button type="button" class="btn btn-success px-3" id="cekButton">Cek</button>
                        </div>


                        <div class="d-flex justify-content-center">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis" id="makanan" value="makanan">
                                <label class="form-check-label" for="makanan">Makanan</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis" id="minuman" value="minuman">
                                <label class="form-check-label" for="minuman">Minuman</label>
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <input type="number" class="form-control" name="harga" id="harga"
                                style="height: 50px; border-radius: 10px;" value="<?= $dt_menu['harga'] ?>" placeholder="Masukan Harga" required>
                        </div>

                        <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message" style="background-color: green; border-radius:11px"></div>
                            <div class="sent-message">Your regristate is succesfully. Thank you!</div>
                        </div>
                        <div class="text-center">
                            <button type="submit" onclick="validateAndPindah()">Ubah</button>
                        </div>
                    </form>
                </div><!-- End Contact Form -->

            </div>

        </div>
    </section><!-- End Contact Section -->
    </div>

    <script>
        function validateAndPindah() {
            window.location.href = "tampil_warung.php";
        }
    </script>
    <script>
        const gambarInput = document.getElementById("gambar");
        const gambarImg = document.getElementById("gambar-img");
        const cekButton = document.getElementById("cekButton");

        cekButton.addEventListener("click", function () {
            const newImageUrl = gambarInput.value;
            if (newImageUrl) {
                gambarImg.src = newImageUrl;
            } else {
                alert("Masukkan URL gambar terlebih dahulu.");
            }
        });
    </script>
    <?php include "link.scripts.php"; ?>
</body>

</html>