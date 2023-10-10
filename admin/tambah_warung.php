<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Warung</title>
    <?php include "link.style.php"; ?>
</head>

<body>
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Regristate Warung</h2>
            </div>

            <div class="row gx-lg-0 gy-4">
                <form action="proses_tambah_warung.php" method="post" class="php-email-form">
                    <div class="row">
                        <div class="form-group mt-3">
                            <input type="text" name="nama" class="form-control"
                                style="height: 50px; border-radius: 10px;" placeholder="Masukan Nama Warung" required>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="deskripsi"
                                style="height: 50px; border-radius: 10px;" placeholder="Masukan Deskripsi Warung"
                                required>
                        </div>
                    </div>
                    <div class="my-3">
                        <div class="loading">Loading</div>
                        <div class="error-message" style="background-color: green; border-radius:11px"></div>
                        <div class="sent-message">Your regristate is succesfully. Thank you!</div>
                    </div>
                    <div class="text-center">
                        <button type="submit" onclick="validateAndPindah()">Tambah</button>
                    </div>
                </form>
            </div> <!--End Contact Form -->

        </div>
    </section>
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