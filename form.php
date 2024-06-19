<?php
include "display.php";
include "edit.php";
$data_edit = mysqli_fetch_assoc($proses_ambil);
?>
<html>

<head>
  <title>Form Mahasiswa</title>
  <link href="library/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
  <link href="library/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
  <link href="library/assets/styles.css" rel="stylesheet" media="screen">
  <script src="library/vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>

<body>
  <div class="span9" id="content">
    <div class="row-fluid">
      <div class="block">
        <div class="navbar navbar-inner block-header">
          <div class="muted pull-left">Form Mahasiswa</div>
        </div>
        <div class="block-content collapse in">
          <div class="span12">
            <?php if (isset($_GET['id']) && $_GET['id'] != '') { ?>
              <form action="edit.php?id=<?php echo $data_edit['id'] ?>&proses=1" method="POST">
              <?php } else { ?>
                <form action="process.php" method="POST">
                <?php } ?>
                <fieldset>
                  <legend>Input Data Mahasiswa</legend>
                  <div class="control-group">
                    <label class="control-label" for="nama">Nama:</label>
                    <div class="controls">
                      <input type="hidden" class="input-xlarge focused" id="id" name="id" value="<?php if ($data_edit['id'] != "") echo $data_edit['id']; ?>">
                      <input type="text" class="input-xlarge focused" id="nama" name="nama" value="<?php if (isset($data_edit['nama']) && $data_edit['nama'] != "") echo $data_edit['nama']; ?>">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="program_studi">Program Studi:</label>
                    <div class="controls">
                      <input type="text" class="input-xlarge focused" id="program_studi" name="program_studi" value="<?php if (isset($data_edit['program_studi']) && $data_edit['program_studi'] != "") echo $data_edit['program_studi']; ?>">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="npm">NPM:</label>
                    <div class="controls">
                      <input type="text" class="input-xlarge focused" id="npm" name="npm" value="<?php if (isset($data_edit['npm']) && $data_edit['npm'] != "") echo $data_edit['npm']; ?>">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Jenis Kelamin:</label>
                    <div class="controls">
                      <label class="radio">
                        <input type="radio" name="jenis_kelamin" value="laki-laki" <?php if (isset($data_edit['jenis_kelamin']) && $data_edit['jenis_kelamin'] == 'Laki-laki') echo 'checked'; ?>> Laki-laki
                      </label>
                      <label class="radio">
                        <input type="radio" name="jenis_kelamin" value="perempuan" <?php if (isset($data_edit['jenis_kelamin']) && $data_edit['jenis_kelamin'] == 'Perempuan') echo 'checked'; ?>> Perempuan
                      </label>
                      <label class="radio">
                        <input type="radio" name="jenis_kelamin" value="tidak diketahui" <?php if (isset($data_edit['jenis_kelamin']) && $data_edit['jenis_kelamin'] == 'Tidak diketahui') echo 'checked'; ?>> Tidak diketahui
                      </label>
                    </div>
                  </div>
                  <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Input</button>
                    <button type="reset" class="btn">Cancel</button>
                  </div>
                </fieldset>
                </form>
          </div>
        </div>
      </div>
      <div class="block">
        <div class="navbar navbar-inner block-header">
          <div class="muted pull-left">Data Mahasiswa</div>
        </div>
        <div class="block-content collapse in">
          <div class="span12">
            <table class="table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nama</th>
                  <th>Program Studi</th>
                  <th>NPM</th>
                  <th>Jenis Kelamin</th>
                </tr>
              </thead>
              <tbody>
                <?php while ($data = mysqli_fetch_assoc($proses)) { ?>
                  <tr>
                    <td><?php echo $data['id'] ?></td>
                    <td><?php echo $data['nama'] ?></td>
                    <td><?php echo $data['program_studi'] ?></td>
                    <td><?php echo $data['npm'] ?></td>
                    <td><?php echo $data['jenis_kelamin'] ?></td>
                    <td><a href="form.php?id=<?php echo $data['id']; ?>"> Edit </a>|
                      <a href="delete.php?id=<?php echo $data['id']; ?>"> Hapus </a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>