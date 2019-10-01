<?php
require_once('functions/funciones.php');


if (isset($_POST['borrar'])) {
    $id = $_POST['borrar'];
    header('Location: listado_socios.php');
};

if(isset ($_POST['modificar'])){
    session_start();
    $id = $_POST['modificar'];
    
    $_SESSION['modificar'] = $id;

    header('Location: modificar.php');
};


encabezado();
?>

<!-- todo esto está medido en un contenedor con class contenido -->
<div id="listado_socios" class= "container">    
    <div class = "row tabla">
        <!-- TABLA -->
        
        <div class = "col-12 pt-5 tabla">
            <form action="" method="POST">
            <table >
                
                <tr class = "nombres_columnas">
                    <th class ="nombre">Socio</th>
                    <th class = "numero_documento">Nº documento</th> 
                    <th class ="tipo_documento">Tipo documento</th>
                    <th class ="fecha_nacimiento">Fecha Nacimiento</th>
                    <th class = "editar">Editar</th> 
                    <th class = "borrar">Borrar</th>
                </tr>
               
                <tr>
                    <td class ="nombre">Clotilde Briones</td>
                    <td class = "numero_documento">78788787Y</td>
                    <td class ="tipo_documento">DNI</td>
                    <td class ="fecha_nacimiento">06/05/1960</td>

                    <td class = "editar">
                    <button name="modificar" type="submit" value="1">
                    <i class="fas fa-edit"></i>
                    </button>
                    </td>

                    <td class = "borrar">
                    <button name="borrar" type="submit" value="1">
                    <i class="fas fa-trash-alt"></i>
                    </button>
                    </td>
                 
                </tr>

                <tr>
                    <td class ="nombre">Leoncio Amando</td>
                    <td class = "numero_documento">78787885H</td>
                    <td class ="tipo_documento">Carné biblioteca</td>
                    <td class ="fecha_nacimiento">01/01/1300</td>

                    <td class = "editar">
                    <button name="modificar" type="submit" value="2">
                    <i class="fas fa-edit"></i>
                    </button>
                    </td>

                    <td class = "borrar">
                    <button name="borrar" type="submit" value="2">
                    <i class="fas fa-trash-alt"></i>
                    </button>
                    </td>
                </tr>

                <tr>
                    <td class ="nombre">Marcos Méndez</td>
                    <td class = "numero_documento">78787885H</td>
                    <td class ="tipo_documento">NIE</td>
                    <td class ="fecha_nacimiento">01/01/1900</td>

                    <td class = "editar">
                    <button name="modificar" type="submit" value="3">
                    <i class="fas fa-edit"></i>
                    </button>
                    </td>

                    <td class = "borrar">
                    <button name="borrar" type="submit" value="3">
                    <i class="fas fa-trash-alt"></i>
                    </button>
                    </td>
                </tr>

                <tr>
                    <td class ="nombre">Rosario Hernández</td>
                    <td class = "numero_documento">12345678</td>
                    <td class ="tipo_documento">NIE</td>
                    <td class ="fecha_nacimiento">01/01/1900</td>
                    
                    <td class = "editar">
                    <button name="modificar" type="submit" value="4">
                    <i class="fas fa-edit"></i>
                    </button>
                    </td>

                    <td class = "borrar">
                    <button name="borrar" type="submit" value="4">
                    <i class="fas fa-trash-alt"></i>
                    </button>
                    </td>
                </tr>

                <tr>
                    <td class ="nombre">Pepón Simonet</td>
                    <td class = "numero_documento">12345678</td>
                    <td class ="tipo_documento">NIE</td>
                    <td class ="fecha_nacimiento">01/01/1900</td>

                    <td class = "editar">
                    <button name="modificar" type="submit" value="5">
                    <i class="fas fa-edit"></i>
                    </button>
                    </td>

                    <td class = "borrar">
                    <button name="borrar" type="submit" value="5">
                    <i class="fas fa-trash-alt"></i>
                    </button>
                    </td>
                </tr>

                <tr>
                    <td class ="nombre"></td>
                    <td class = "numero_documento"></td>
                    <td class ="tipo_documento"></td>
                    <td class ="fecha_nacimiento"></td>
                    <td class = "editar"></td>
                    <td class = "borrar">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <!-- <li class="page-item"> -->
                                <!-- <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                                </li> -->
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                                </li>
                            </ul>
                        </nav>
                    </td>
                </tr>
         
            </table>
            </form>
        </div>
        
    </div>

    <div class = "row botones ">
        <!-- boton de volver -->
        <div class = "col-3 offset-1 d-flex align-items-center ">
            <a href="index.php" class="btn btn-secondary btn-lg" tabindex="-1" role="button" aria-disabled="true">VOLVER</a>
        </div>
        
        <!-- boton de enviar -->
        <!-- <div class = "col-3 offset-5 d-flex align-items-center justify-content-center"> 
            <div class="form-group ">
                <button type="submit" class="btn boton-registrar btn-lg" 
                > REGISTRAR</button> </form> 
            </div>
        </div> -->
        
    </div>

</div>

                


<!-- todo esto está medido en un contenedor con class contenido -->
<?php
pie();
?>