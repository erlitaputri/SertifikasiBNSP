<?php include 'database.php'; 
$data = mysqli_query($koneksi, "SELECT * FROM arsip_surat WHERE id = '".$_GET['id']."'");
$r = mysqli_fetch_array($data);

$nomor_surat = $r['nomor_surat'];
$kategori = $r['kategori'];
$judul = $r['judul'];
$waktu_pengarsipan = $r['waktu_pengarsipan'];
$file_surat = $r['file_surat'];

?>

<!DOCTYPE html>
<html>
<head>
     <title>Arsip</title>
     <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
     <div class="left">
          <?php include 'menu.php';?>
     </div>
     <div class="right" style="font-family: cursive;">
          <h1>Arsip Surat >> Ubah File</h1>
          
          <form action="" method="post" enctype="multipart/form-data">
               <table>
                    <tr>
                         <td>Nomor Surat</td>
                         <td>  </td>
                         <td><?php echo $nomor_surat ?></td>
                    </tr>
                    <tr>
                         <td>Kategori</td>
                         <td>  </td>
                         <td><?php echo $kategori ?></td>
                    </tr>
                    <tr>
                         <td>Judul</td>
                         <td>  </td>
                         <td><?php echo $judul ?></td>
                    </tr>
                    <tr>
                         <td>File Surat (PDF)</td>
                         <td>  </td>
                         <td><input type="hidden" name="img" value="<?php echo $result ?>">
                              <input type="file" name="file_surat"></td>
                    </tr>
                    <tr>
                         <td></td>
                         <td></td>
                         <td><input type="submit" name="kirim" value="Update"
                         style="background-color: #B22222;
                         color: white;
                         font-family: cursive;
                         font-size: 16px;
                         line-height: 10px;
                         border-radius: 3px;
                         margin: 13px auto 0;
                         padding: 1px 0 4px;
                         text-align: center;
                         text-decoration: none;
                         padding: 10px 10px;"></td>
                    </tr>
               </table>
          </form>

          <?php 
               if(isset($_POST['kirim'])){
                    //$nomor_surat = $_POST['nomor_surat'];
                    //$kategori = $_POST['kategori'];
                    //$judul = $_POST['judul'];
                    $waktu_pengarsipan = date("Y-m-d H:i:s");
                    $file_surat = $_FILES['file_surat']['name'];
                    $source = $_FILES['file_surat']['tmp_name'];
                    $folder = './file/';

                    if ($file_surat != '') {
                         move_uploaded_file($source, $folder.$file_surat);
                         $update = mysqli_query($koneksi, "UPDATE arsip_surat SET
                              nomor_surat = '".$nomor_surat."',
                              kategori = '".$kategori."',
                              judul = '".$judul."',
                              waktu_pengarsipan = '".$waktu_pengarsipan."',
                              file_surat = '".$file_surat."'
                              WHERE id = '".$_GET['id']."
                         ");
                         if ($update) {
                              echo '';
                         }else{
                              echo('Berhasil Update');
                         }
                    }else{
                         $update = mysqli_query($koneksi, "UPDATE arsip_surat SET
                              nomor_surat = '".$nomor_surat."',
                              kategori = '".$kategori."',
                              judul = '".$judul."',
                              waktu_pengarsipan = '".$waktu_pengarsipan."'
                              WHERE id = '".$_GET['id']."'
                         ");
                         if ($update) {
                              echo '';
                         }else{
                              echo('Berhasil Update');
                         }
                    }
               }
          ?>

     </div>
</body>
</html>