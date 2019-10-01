<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class= "pagina">

        <div class="encabezado">
            <div class="d1">
                <img src="logo.svg" alt="logo Torgue" class = "logo">
            </div>
            <div class="d2">
                <?php 
                for($i=1; $i<408; $i++){
                    echo('<div class = "cuadro cuadro'.$i.'"></div>');
                }
                ?>  
            </div>
            <div class="d3"></div>
            <div class="d4"></div>
        </div>

        <div class = "no_encabezado">
            <div class="lateral-izd"> 
                <?php 
                for($i=0; $i<120; $i++){
                    echo('<div style="border:solid 1px" class = "cuadro lateral'.$i.'"></div>');
                }
                ?> 
            </div>
            <div class="contenido">
<!-- AQUI VA EL contenido -->





<!-- FIN DEL CONTENIDO -->
            </div>
            <div class="lateral-dcho">
                <?php 
                for($i=0; $i<120; $i++){
                    echo('<div style="border:solid 1px" class = "cuadro lateral'.$i.'"></div>');
                }
                ?>
            </div>
        </div>

        <div class="base">
            <?php 
                for($i=0; $i<261; $i++){
                    echo('<div style="border:solid 1px" class = "cuadro lateral'.$i.'"></div>');
                }
            ?>
        </div> 

    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
</body>
</html>