<?php
function encabezado(){
    echo('<!DOCTYPE html>');
echo('<html lang="en">');
echo('<head>');
    echo('<meta charset="utf-8">');
    echo('<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">');
    echo('<meta http-equiv="X-UA-Compatible" content="ie=edge">');
    echo('<title>Document</title>');
    echo('<link rel="stylesheet" href="css/reset.css">');
    echo('<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">');

    echo('<script src="https://kit.fontawesome.com/7c319f7be2.js"></script>');
    echo('<link rel="stylesheet" href="css/style.min.css">');

echo('</head>');
echo('<body>');
    echo('<div class= "pagina">');

        echo('<div class="encabezado">');
            echo('<div class="d1">');
                echo('<img src="_assets/img/group.svg" alt="logo Torgue" class = "logo">');
            echo('</div>');
            echo('<div class="d2">');
                
                for($i=1; $i<408; $i++){
                    echo('<div class = "cuadro cuadro'.$i.'"></div>');
                }
                  
            echo('</div>');
            echo('<div class="d3"></div>');
            echo('<div class="d4"></div>');
        echo('</div>');

        echo('<div class = "no_encabezado">');
            echo('<div class="lateral-izd">'); 
                 
                for($i=0; $i<120; $i++){
                    echo('<div style="border:solid 1px" class = "cuadro lateral'.$i.'"></div>');
                }
                 
            echo('</div>');
            echo('<div class="contenido">');
}


function pie(){
    echo('</div>');
    echo('<div class="lateral-dcho">');
         
        for($i=0; $i<120; $i++){
            echo('<div style="border:solid 1px" class = "cuadro lateral'.$i.'"></div>');
        }
        
    echo('</div>');
echo('</div>');

echo('<div class="base">');
     
        for($i=0; $i<261; $i++){
            echo('<div style="border:solid 1px" class = "cuadro lateral'.$i.'"></div>');
        }
    
echo('</div>');

echo('</div>');
// Optional JavaScript 
//  jQuery first, then Popper.js, then Bootstrap JS 
echo('<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>');
echo('<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>');
echo('<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>');
echo('</body>');
echo('</html>');

}