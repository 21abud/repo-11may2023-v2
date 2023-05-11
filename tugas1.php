<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-5.3.0-alpha3-dist/css/bootstrap.css">
    <title>Form Pendaftaran</title>
</head>

<body>
    <div class="container mt-3">
        <div class="row justify-content-sm-center">
            <div class="col-9">
                <div class="card">
                    <div class="card-header text-center">
                        <h1>Form Pendaftaran</h1>
                    </div>
                    <!-- form di dalam card body -->
                    <div class="card-body">
                        <form id="myform" action="" method="POST">
                            <div class="form-floating mb-1">
                                <input type="text" name="nama" class="form-control" id="fiNama"
                                    placeholder="name@example.com" Required>
                                <label for="fiNama">Nama</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault1" value="laki">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Laki
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault2" value="cewe">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Cewe
                                </label>
                            </div>
                            <div class="form-floating mb-1">
                                <input type="email" name="email" class="form-control" id="fiEmail"
                                    placeholder="name@example.com" Required>
                                <label for="fiEmail">Email</label>
                            </div>
                            <div class="form-floating">
                                <textarea name="alamat" class="form-control" placeholder="Leave a comment here"
                                    id="floatingTextarea" Required></textarea>
                                <label for="floatingTextarea">Alamat</label>
                            </div>
                            <div class="form-floating mt-2">
                                <select name="jurusan" class="form-select" id="floatingSelect"
                                    aria-label="Floating label select example" Required>
                                    <option selected disabled>Pilih</option>
                                    <option value="Junior Web Developer">Junior Web Developer</option>
                                    <option value="Digital Marketing">Digital Marketing</option>
                                    <option value="Content Creator">Content Creator</option>
                                    <option value="Desainer Multimedia Muda">Desainer Multimedia Muda</option>
                                </select>
                                <label for="floatingSelect">Program Pelatihan</label>
                            </div>
                            <div class="form-floating mt-2">
                                <select name="tahun" class="form-select" id="fsTahun"
                                    aria-label="Floating label select example" Required>
                                    <option selected disabled>Pilih Tahun</option>
                                    <?php for($a=2000;$a<=2023;$a++):?>
                                    <option value="<?= $a;?>"><?= $a;?></option>
                                    <?php endfor;?>
                                </select>
                                <label for="fsTahun">Tahun Daftar</label>
                            </div>

                            <!-- button -->
                            <input type="submit" class="btn btn-success mt-3 col-12" value="Daftar" name="submit">
                    </div>
                    </form>

                    <!-- card footer -->
                    <div class="card-footer text-center">
                        <!-- loading spinner -->
                        <div class="spinner-border text-success" role="status" style="display:none;">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <table class="table table-responsive table-success table-striped">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Email</th>
                                    <th>Alamat</th>
                                    <th>Program Pelatihan</th>
                                    <th>Tahun Daftar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!--  -->
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="bootstrap-5.3.0-alpha3-dist/js/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>

    <!-- fungsi menggunakan jquery & ajax -->
    <script>
    $(document).ready(function() {
        getData();

        function getData() {
            $.ajax({
                type: "GET",
                url: "getdata.php",
                beforeSend: function(result) {
                    $(".spinner-border").show();
                },
                success: function(result) {
                    $(".spinner-border").hide();
                    $("tbody").html(result);
                    $("#myform").trigger("reset");
                    // $("#myform")[0].reset();
                    // $("#fiNama").val("");
                }
            })
        }

        $("form").submit(function(xxx) {
            xxx.preventDefault();
            //ambil data dari form berdasarkan ID, simpan dalam variable baru
            var nama = $("#fiNama").val();
            // var kelamin = $("input[name='flexRadioDefault']:checked").val();
            var kelamin = $(".form-check-input:checked").val();
            var email = $("#fiEmail").val();
            var alamat = $("#floatingTextarea").val();
            var program = $("#floatingSelect").val();
            var tahun = $("#fsTahun").val();

            //masukkan data variabel ke dalam object
            var formData = {
                nama: nama,
                kelamin: kelamin,
                email: email,
                alamat: alamat,
                program: program,
                tahun: tahun
            }

            $.ajax({
                type: "POST",
                url: "proses.php",
                data: formData,
                beforeSend: function(result) {
                    $(".spinner-border").show();
                },
                success: function(result) {
                    $(".spinner-border").hide();
                    $("tbody").append(result);
                    $("#myform").trigger("reset");
                    getData();
                }
            })
        })
    })
    </script>

    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script> -->
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
</body>

</html>