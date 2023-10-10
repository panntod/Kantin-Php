<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Page</title>
    <?php include 'link.style.php' ?>
</head>

<body>
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Update Page</h2>
            </div>

            <div class="row gx-lg-0 gy-4">
                <?php
                include "server.php";
                $qry_get_warung = mysqli_query($conn, "select * from warung where id_warung = '{$_GET['id_warung']}'");
                $dt_warung = mysqli_fetch_array($qry_get_warung);
                ?>

                <div class="row gx-lg-0 gy-4">
                    <form action="proses_ubah_warung.php" method="post" class="php-email-form">
                        <div class="row">
                            <input type="hidden" name="id" value="<?= $dt_warung['id_warung'] ?>">
                            <div class="form-group mt-3">
                                <input type="text" name="nama" value="<?= $dt_warung['nama_warung'] ?>"
                                    class="form-control" style="height: 50px; border-radius: 10px;"
                                    placeholder="Masukan Nama Warung" required>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" value="<?= $dt_warung['deskripsi'] ?>"
                                    name="deskripsi" style="height: 50px; border-radius: 10px;"
                                    placeholder="Masukan Deskripsi Warung" required>
                            </div>
                        </div>
                        <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message" style="background-color: green; border-radius:11px"></div>
                            <div class="sent-message">Your regristate is succesfully. Thank you!</div>
                        </div>
                        <div class="text-center">
                            <button type="submit" onclick="validateAndPindah()">Update</button>
                        </div>
                    </form>
                </div> <!--End Contact Form -->

            </div>

        </div>
    </section><!-- End Contact Section -->
    </div>

    <script>
        function validateAndPindah() {
            var nama_warung = document.getElementsByName("nama")[0].value;
            var deskripsi = document.getElementsByName("deskripsi")[0].value;

            if (nama_warung === "" || deskripsi === "") {
                var errorMessage = document.querySelector(".error-message");
                errorMessage.textContent = "Please fill in all fields.";
                errorMessage.style.backgroundColor = "red";
                errorMessage.style.borderRadius = "11px";
                errorMessage.style.display = "block";
            } else {
                window.location.href = "tampil_warung.php";
            }
        }
    </script>
    <?php include "link.scripts.php"; ?>
</body>

</html>