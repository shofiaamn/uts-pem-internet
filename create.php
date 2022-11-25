<?php
date_default_timezone_set("Asia/Jakarta");

$server   = "localhost";
$user     = "root";
$password = "";
$db       = "sekolah";

//koneksi
$connect  = new mysqli($server, $user, $password, $db);

        $npsn                   = "";
        $status                 = "";
        $bentuk_pendidikan      = "";
        $nama_sekolah           = "";
        $sk_pendirian           = "";
        $tgl_pendirian          = "";
        $sk_izin_operasional    = "";
        $tgl_izin_operasional   = "";
        $alamat                 = "";
        $rt                     = "";
        $rw                     = "";
        $dusun                  = "";
        $desa                   = "";
        $kecamatan              = "";
        $kabupaten              = "";
        $provinsi               = "";
        $kode_pos               = "";

    $errorMessage = "";
    $success      = "";

    if ( $_SERVER['REQUEST_METHOD'] == 'POST'){
        $npsn                   = $_POST["npsn"];
        $status                 = $_POST["status"];
        $bentuk_pendidikan      = $_POST["bentuk_pendidikan"];
        $nama_sekolah           = $_POST["nama_sekolah"];
        $sk_pendirian           = $_POST["sk_pendirian"];
        $tgl_pendirian          = $_POST["tgl_pendirian"];
        $sk_izin_operasional    = $_POST["sk_izin_operasional"];
        $tgl_izin_operasional   = $_POST["tgl_izin_operasional"];
        $alamat                 = $_POST["alamat"];
        $rt                     = $_POST["rt"];
        $rw                     = $_POST["rw"];
        $dusun                  = $_POST["dusun"];
        $desa                   = $_POST["desa"];
        $kecamatan              = $_POST["kecamatan"];
        $kabupaten              = $_POST["kabupaten"];
        $provinsi               = $_POST["provinsi"];
        $kode_pos               = $_POST["kode_pos"];

        do{
            if (empty($npsn) || empty($status) ||empty($bentuk_pendidikan) || empty($nama_sekolah) ||empty($sk_pendirian) || empty($tgl_pendirian) || empty($sk_izin_operasional) ||empty($tgl_izin_operasional) || empty($alamat) || empty($rt) || empty($rw) || empty($dusun) ||empty($desa) || empty($kecamatan) || empty($kabupaten) || empty($provinsi)|| empty($kode_pos)){
                $errorMessage = "Periksa Data yang Masih Kosong!";
                break;
            }

            // menambahkan data sekolah ke database

            $sql = "INSERT INTO data_sekolah (npsn, status, bentuk_pendidikan, nama_sekolah, sk_pendirian, tgl_pendirian, sk_izin_operasional, tgl_izin_operasional, alamat, rt, rw, dusun, desa, kecamatan, kabupaten, provinsi, kode_pos)"
            ."VALUES ('$npsn', '$status','$bentuk_pendidikan','$nama_sekolah', '$sk_pendirian', '$tgl_pendirian', '$sk_izin_operasional','$tgl_izin_operasional', '$alamat','$rt','$rw', '$dusun','$desa','$kecamatan', '$kabupaten','$provinsi','$kode_pos')";
            $result = $connect->query($sql);

            if(!$result){
                $errorMessage = "Invalid Query: " . $connect->error;
                break;
            }


            $npsn                   = "";
            $status                 = "";
            $bentuk_pendidikan      = "";
            $nama_sekolah           = "";
            $sk_pendirian           = "";
            $tgl_pendirian          = "";
            $sk_izin_operasional    = "";
            $tgl_izin_operasional   = "";
            $alamat                 = "";
            $rt                     = "";
            $rw                     = "";
            $dusun                  = "";
            $desa                   = "";
            $kecamatan              = "";
            $kabupaten              = "";
            $provinsi               = "";
            $kode_pos               = "";

            $success = "Berhasil Menambahkan Data Sekolah";

            header("location: /utsinternet/index.php");
            exit;
            
        } while (false);
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Sekolah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container m-3">
    <div class="card">
        <div class="card-header">
            <b><center>TAMBAH DATA SEKOLAH</center></b>
            <?php
                if ( !empty($errorMessage)){
                    echo "
                        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                            <strong>$errorMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                        ";
                }
        ?>
        </div>
<div class="row m-3">
  <div class="col-sm-6">
        <form method="post">
          <div class="row mb-3">
              <label class="col-sm-3 col-form-label">NPSN</label>
              <div class="col-sm-6">
                  <input type="text" class="form-control" name="npsn" value="<?php echo $npsn; ?>">
              </div>
          </div>
          <div class="row mb-3">
              <label class="col-sm-3 col-form-label">Status Sekolah</label>
              <div class=" col-sm-6">
                  <select class="form-select" name="status" id="<?php echo $status; ?>" aria-label="Default select example">
                      <option selected>-- Pilih Status Sekolah --</option>
                      <option value="Negeri">Negeri</option>
                      <option value="Swasta">Swasta</option>
                  </select>
              </div>
          </div>
          <div class="row mb-3">
              <label class="col-sm-3 col-form-label">Bentuk Pendidikan</label>
                  <div class=" col-sm-6">
                      <select class="form-select" name="bentuk_pendidikan" id="<?php echo $bentuk_pendidikan; ?>" aria-label="Default select example">
                          <option selected>-- Pilih Jenjang Pendidikan --</option>
                              <option value="TK">TK</option>
                              <option value="SD">SD</option>
                              <option value="SMP">SMP</option>
                              <option value="SMA">SMA</option>
                              <option value="SMK">SMK</option>
                      </select>
                  </div>
          </div>
          <div class="row mb-3">
              <label class="col-sm-3 col-form-label">Nama Sekolah</label>
              <div class="col-sm-6">
                  <input type="text" class="form-control" name="nama_sekolah" value="<?php echo $nama_sekolah; ?>">
              </div>
          </div>
          <div class="row mb-3">
              <label class="col-sm-3 col-form-label">SK Pendirian</label>
              <div class="col-sm-6">
                  <input type="text" class="form-control" name="sk_pendirian" value="<?php echo $sk_pendirian; ?>">
              </div>
          </div>
          <div class="row mb-3">
              <label class="col-sm-3 col-form-label">Tanggal Pendirian</label>
              <div class="col-sm-6">
                  <input type="date" class="form-control" name="tgl_pendirian" value="<?php echo $tgl_pendirian; ?>">
              </div>
          </div>
          <div class="row mb-3">
              <label class="col-sm-3 col-form-label">SK Izin Operasional</label>
              <div class="col-sm-6">
                  <input type="text" class="form-control" name="sk_izin_operasional" value="<?php echo $sk_izin_operasional; ?>">
              </div>
          </div>
          <div class="row mb-3">
              <label class="col-sm-3 col-form-label">Tanggal Izin Operasional</label>
              <div class="col-sm-6">
                  <input type="date" class="form-control" name="tgl_izin_operasional" value="<?php echo $tgl_izin_operasional; ?>">
              </div>
          </div>
          
    </div>
  <div class="col-sm-6">
        <div class="row mb-3">
          <label class="col-sm-3 col-form-label">Alamat</label>
          <div class="col-sm-6">
              <input type="text" class="form-control" name="alamat" value="<?php echo $alamat; ?>">
          </div>
      </div>
      <div class="row mb-3">
          <label class="col-sm-3 col-form-label">RT</label>
          <div class="col-sm-6">
              <input type="text" class="form-control" name="rt" value="<?php echo $rt; ?>">
          </div>
      </div>
      <div class="row mb-3">
          <label class="col-sm-3 col-form-label">RW</label>
          <div class="col-sm-6">
              <input type="text" class="form-control" name="rw" value="<?php echo $rw; ?>">
          </div>
      </div>
      <div class="row mb-3">
          <label class="col-sm-3 col-form-label">Dusun</label>
          <div class="col-sm-6">
              <input type="text" class="form-control" name="dusun" value="<?php echo $dusun; ?>">
          </div>
      </div>
      <div class="row mb-3">
          <label class="col-sm-3 col-form-label">Desa</label>
          <div class="col-sm-6">
              <input type="text" class="form-control" name="desa" value="<?php echo $desa; ?>">
          </div>
      </div>
      <div class="row mb-3">
          <label class="col-sm-3 col-form-label">Kecamatan</label>
          <div class="col-sm-6">
              <input type="text" class="form-control" name="kecamatan" value="<?php echo $kecamatan; ?>">
          </div>
      </div>
      <div class="row mb-3">
          <label class="col-sm-3 col-form-label">Kabupaten</label>
          <div class="col-sm-6">
              <input type="text" class="form-control" name="kabupaten" value="<?php echo $kabupaten; ?>">
          </div>
      </div>
      <div class="row mb-3">
          <label class="col-sm-3 col-form-label">Provinsi</label>
          <div class="col-sm-6">
              <input type="text" class="form-control" name="provinsi" value="<?php echo $provinsi; ?>">
          </div>
      </div>
      <div class="row mb-3">
          <label class="col-sm-3 col-form-label">Kode Pos</label>
          <div class="col-sm-6">
              <input type="text" class="form-control" name="kode_pos" value="<?php echo $kode_pos; ?>">
          </div>
      </div>

       
    </div>
</div>

<?php
          if ( !empty($success)) {
              echo "
              <div class='row mb-3'>
                  <div class='offset-sm-3 col-sm-6'>
                      <div class='alert alert-success alert-dismissible fade show' role='alert'>
                          <strong>$success</strong>
                          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>
                  </div>
              </div>
              
              ";
          }
      ?>  
<div class="row mb-3">
          <div class="offset-sm-3 col-sm-3 d-grid">
              <button type="submit" class="btn btn-primary">Submit</button>
          </div>
          <div class="col-sm-3 d-grid">
              <a class="btn btn-outline-primary" href="/utsinternet/index.php" role="button">Cancel</a>
          </div>
      </div>
      </form>
      </div>
      
    </div>
    
  </div>
  
</div>
</body>
</html>