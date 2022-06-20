
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kdam+Thmor+Pro&display=swap" rel="stylesheet">
    <title>Latihan Database PHP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
        td{font-size: 18px;}
    </style>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="LandingPage.html"><img src="asset/logo-removebg-preview.png" style="height: 50px; width: 50px;"></img></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">View</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="inserting.php">Add Data</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>
    <center><div style="width: 450px; height:75px; margin-top:10%;margin-bottom:10%;"><h1 style="padding-top: 5px; color:azure; font-size: 75px;">DATABASE E-BOOK</h1></div></center>
    <div class="p-3 mb-2 bg-dark text-white row justify-content-center">
    <form class="form-inline" action= "searched.php" method="POST" style="background-color: transparent;">
        <label for="pilihan"><pre style="font-size: 30px; color:azure; font-family: 'Kdam Thmor Pro', sans-serif;padding-top: 15px;">Search By:    </pre></label>
        <select name="pilihan" id="pilihan" style="margin-right: 20px; height: 45px;">
            <option value="Id">Id</option>
            <option value="Judul" selected>Judul</option>
            <option value="Penulis">Penulis</option>
            <option value="TahunTerbit">Tahun Terbit</option>
            <option value="Genre">Genre</option>
        </select>
        <input class="form-control ml-2" type="search" placeholder="Search" aria-label="Search" name="search" id="search" style="height: 45px; border-radius: 5px 0px 0px 5px;">
    
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="height: 45px; border-radius: 0 5px 5px 0;">Search</button>
    </form>
    </div>
    <div style="display: flex;
                align-items: center;
                justify-content: center;">
    <table class="table col-md-8" style="color: azure; font-size: 15px;" id="kumpulan-buku">
        <thead>
        <tr>
            <th>Id</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Genre</th>
            <th>Penerbit</th>
            <th>Tahun Terbit</th>
            <th>Jumlah Halaman</th>
            <th>Harga Beli</th>
            <th colspan="2"><center>Opsi</center></th>
        </tr>
        </thead>
        <?php
            include 'conn.php';
            $data = mysqli_query($conn,"select distinct * from bookdetails");
            foreach($data as $value){
                echo"
                <tr>
                    <td>".$value['Id']."</td>
                    <td>".$value['Judul']."</td>
                    <td>".$value['Penulis']."</td>
                    <td>".$value['Genre']."</td>
                    <td>".$value['Penerbit']."</td>
                    <td>".$value['TahunTerbit']."</td>
                    <td>".$value['JumlahHalaman']."</td>
                    <td>".$value['HargaBeli']."</td>
                    <td><button type='button' style='margin-right:-5px' class='btn btn-warning' data-bs-toggle='modal'  data-bs-target='#modal-update' id='edit' data-id='".$value['Id']."'>edit</button></td>
                    <td><button type='button' style='margin-left:-5px' class='btn btn-danger' id='delete' data-id='".$value['Id']."'>delete</button></td>
                </tr>
                ";
            }  
        ?>
    </table>
    </div>
    <div id="modal-update" tabindex ="-1" role="dialog" class="modal fade bd-example-modal-lg" style="font-size: 18px;">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <h4 class="modal-title">Update data</h4>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form id="update" action="update.php" method="POST">

                            <div class="form-group row" hidden="1">
                                <label class="col-sm-2 col-form-label">Id Buku</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="id" name="idBuku" pattern="[0-9]+">
                                    </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Judul</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="judul_buku" name="title" required>
                                    </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Penulis</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="penulis" name="writer" required>
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Genre</label>
                                    <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="genre" id="genres">
                                            <?php
                                            $genres = mysqli_query($conn, "select distinct Genre from bookdetails");
                                            foreach($genres as $genre){
                                            echo'<option class="dropdown-item" value="'.$genre['Genre'].'">'.$genre['Genre'].'</option>';}
                                            ?>
                                            <option class="dropdown-item" value="Other" id="Lain-lain" selected>Lain-lain</option>
                                        </select>
                                        <input type="text" class="form-control" id="otherField" name="others" disabled required>
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" style="margin-top: -10px;">Jumlah Halaman</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="JumlahHal" name="halaman" pattern="[0-9]+" required>
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Harga Buku</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="HargaBuku" name="harga" pattern="[0-9]+" required>
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Penerbit</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="Penerbit" name="penerbit" required>
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Tahun Terbit</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="Tahun" name="tahun" required>
                                    </div>
                            </div>
                            <button type="submit" name="submit" id="submit" value="submit" hidden="1"></button>
                            
                            
                            
                        </form>
                        <div class="modal-footer"><button type="button" class="btn btn-outline-success btn-lg" onclick="$('#submit').click()">Update</button></div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <script type="text/javascript">
        $("#genres").change(function(){
          var val = $(this).val()
          if (val == "Other") {
            $('#otherField').attr('disabled',false);
          } else {
            $('#otherField').attr('disabled',true);
            $('#otherField').val("");
          }
        });
        $("#kumpulan-buku").on('click', '#edit', function(event){
            $('#otherField').attr('disabled',true);
            event.preventDefault();
            const id = $(this).data('id');
            $.post('gettingData.php', {id: id}, function(res) {
                if (res){
                    let response = $.parseJSON(res),
                    data = response.data;
                    if (data){
                        $("#id").val(data.Id);
                        $("#judul_buku").val(data.Judul);
                        $("#penulis").val(data.Penulis);
                        $("#JumlahHal").val(data.JumlahHalaman);
                        $("#HargaBuku").val(data.HargaBeli);
                        $("#Penerbit").val(data.Penerbit);
                        $('#genres option').removeAttr('selected').filter('[value=' + data.Genre + ']').attr('selected', true).change();
                        $("#Tahun").val(data.TahunTerbit);
                        $("modal-update").modal('show');}
                    else{alert("Data kosong!")}
            }});
        });
        $("#kumpulan-buku").on('click', '#delete', function(event){
            event.preventDefault();
            const id = $(this).data('id');
            if (confirm("Yakin menghapus data?")){
                        //post
                        $.post('delete.php', {id: id}).done(function(){
                        alert("Data berhasil dihapus!");
                        window.location.reload(0); 
            });   
            }
        });
    </script>
</body>
    <script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"
    ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
</html>