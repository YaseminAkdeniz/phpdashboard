<?php
require_once 'inc-functions.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> BLOG EKLE | PANEL </title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<?php //BLOG EKLE İÇİN VERİTABANINA KAYDETME İŞLEMİ
if(@$_POST["submit"]) {
    $baslik = htmlspecialchars($_POST["baslik"], ENT_QUOTES,'UTF-8'); //htmldeki özel işaretlemeleri algılaması için bu methodu kullandım.
    $alt_baslik = htmlspecialchars($_POST["alt_baslik"], ENT_QUOTES,'UTF-8');
    $aciklama = htmlspecialchars($_POST["aciklama"], ENT_QUOTES,'UTF-8');
    $aktif = htmlspecialchars($_POST["aktif"], ENT_QUOTES,'UTF-8');

    $ekle = $db->prepare("INSERT INTO blog (baslik,alt_baslik,aciklama,aktif) 
    VALUES (:baslik, :alt_baslik, :aciklama, :aktif) ");
    $ekle->bindValue(":baslik",$baslik,PDO::PARAM_STR);
    $ekle->bindValue(":alt_baslik",$alt_baslik,PDO::PARAM_STR);
    $ekle->bindValue(":aciklama",$aciklama,PDO::PARAM_STR);
    $ekle->bindValue(":aktif",$aktif,PDO::PARAM_INT);

    if($ekle-> execute()) {
        header("Location: blog.php?i=ekle ");
    } else {
        //print_r($ekle->errorInfo()); // hata olursa ekrana bastırmak için kullanılır.
        header("Location: blog.php?i=hata ");
    }   
}
?>
    <div id="wrapper">

        <?php require_once 'inc-menu.php'; ?> 

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">YENİ EKLE</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="blog.php"class="btn btn-primary"> GERİ DÖN </a>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="" method="POST" enctype="multipart/form-data">
                                    
                                        <div class="form-group">
                                            <label>BAŞLIKLARIM</label>
                                            <input class="form-control" name="baslik" placeholder="Başlık Giriniz...">
                                        </div>

                                        <div class="form-group">
                                            <label>ALT BAŞLIKLARIM</label>
                                            <input class="form-control" name="alt_baslik" placeholder="Alt Başlık Giriniz...">
                                        </div>
                                                                       
                                        <div class="form-group">
                                            <label>AÇIKLAMA</label>
                                            <textarea class="form-control" name="aciklama" id="mytextarea" rows="3"></textarea>
                                        </div>
                                       
                                        <div class="form-group">
                                            <label>DURUM</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="aktif"  value="1" checked>AKTİF
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="aktif"  value="0">PASİF
                                                </label>
                                            </div>
                                            
                                        </div>    

                                        <input type="submit" name="submit" value="KAYDET" class="btn btn-default"> 
                                        <button type="reset" class="btn btn-default">TEMİZLE</button>
                                    </form>
                                </div>
                                
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <script src='../js/tinymce.min.js'></script>

    <script>
      tinymce.init({
        selector: '#mytextarea'
      });
    </script>

</body>

</html>
