<html lang="en">

<head>
    <link rel="stylesheet" href="styles/index.css">
    <link rel="stylesheet" href="styles/forms.css">
    <link rel="stylesheet" href="styles/scroll.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prestamo Web</title>
    <script src="js/index.js"></script>
</head>

<body>

    <?php
    
    // session_start();
    // if(isset($_REQUEST['isResp']) && !isset($_REQUEST['isReload']) ){
       
        @$result = [
            "name"=>$_REQUEST['name'],
            "ammount"=>$_REQUEST['ammount'],
            "interest"=>$_REQUEST['interest'],
            "installments"=>$_REQUEST['installments'],
            "priceInstallment"=>$_REQUEST['priceInstallment'],
        ];

        // if(!isset(  $_SESSION['dataSnapshot'])){
        //     $_SESSION['dataSnapshot'] = $result;
        // }

        // var_dump($_SESSION['dataSnapshot']);
    // } 
    ?>

    <body>
        <center>
            <div class="row">
                <div class="form-student">
                    <form action="back.php" method="POST">
                        <table>
                            <tr>
                                <td>
                                    <h4>DATOS DEL PRESTAMO </h4>
                                </td>
                            </tr>
                            <tr>
                                <td> <input class="digit-calc" type="text" name="name"
                                        placeholder="Primer nombre del cliente" required></td>
                            </tr>

                            <tr>
                                <td> <input class="digit-calc" type="number" name="ammount" placeholder="Cantidad $"
                                        step="any" required></td>
                            </tr>

                            <tr>
                                <td><input class="digit-calc" type="number" name="interest" placeholder="Interes %"
                                        required></td>
                            </tr>

                            <tr>
                                <td> <input class="digit-calc" type="number" name="installments"
                                        placeholder="Numero de cuotas" required></td>
                            </tr>

                            <tr>
                                <th id="text-descript">
                                    <p>Formulario hecho por <a href="https://github.com/juanBOzuna" target="_blank">Juan
                                            Barraza</a></p>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <input class="send-data" type="submit" name="" id="">
                                </th>
                            </tr>
                        </table>
                    </form>
                </div>
                <div class="form-result">
                    <?php
                   if(!isset($_REQUEST['isResp'])){
                       echo ' <table>
                       <tr><td><h4>PRESTAMO </h4></td></tr>
                       <tr>
                       <img id="img-shop" src="assets\prestamo-vector.png" alt="">
                       </tr>
                       </table>';
                   }else{
                       $data = "";
                       $dataDate = "";

                    foreach ( $result as $key =>$dataSnapshot ) {
                       if($key!="priceInstallment"){
                        $data .= '
                        <th scope="row" id="result" >'.$dataSnapshot.'</th>
                        '; 
                       }
                    }

                    date_default_timezone_set('America/Bogota');
                    $d = new DateTime("now");

                    for ($i=0; $i <$result['installments'] ; $i++) { 
                        $d = $d->add(new DateInterval('P1M'));
                        # code...
                        $dataDate .= '
                        <tr>
                        <th id="date" >'.$d->format('Y-m-d').'  -  $'.$result['priceInstallment'].' </th>
                        </tr>
                        '; 
                    }
                    
                    echo '
                   <table>
                        <tr>
                            <td>
                                <h4 id ="title">RESULTADOS</h4>
                            </td>
                        </tr>
                    </table>

                    <div class="flex-result" >
                      
                        <table class="table1">
                            <th class="thead-light">
                                <tr>
                                    <th scope="col"  >Nombre</th>
                                    <th scope="col"  >Monto</th>
                                    <th scope="col"  >Interes</th>
                                    <th scope="col"  >Cuotas</th>
                                </tr>
                            </th>
                            <tbody>
                                <tr>
                                '.$data.'
                                </tr>
                            </tbody>
                            </table>

                            <div class="line-divider"></div>
                            
                            <table class="table">
                                <th class="thead-light">
                                    <tr> 
                                        <th scope="row">Fecha de cuotas</th>
                                    </tr>
                                </th>
                                <tbody>
                                    <tr>
                                        '.$dataDate .'
                                    </tr>
                                </tbody>
                            </table>
                    </div>';
                   
                   }
                   ?>
                </div>
            </div>
        </center>
    </body>
</body>

</html>