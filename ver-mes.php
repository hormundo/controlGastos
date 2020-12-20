<!doctype html>
<html lang="es">
<?php
      require_once "head.html";
?>
  <body>
     <?php
      require_once "clases/Logica.php";

      if(!isset($_SESSION['user_id'])) {
        ini_set("display_errors", 0);
        echo "necesitas iniciar sesion echo '<div>
        <h3><a class='btn btn-primary' href='login.php'>identifícate</a></h3>
        </div>
       <div>";
        header("Location: login.php"); // Or wherever you want to redirect
        exit();
      }

      if(isset($_REQUEST['month'])) {
        $resultGastoCasa =  $model->showGastosTotalMonthcategory($_REQUEST['month'], "Casa");
        $resultGastoCoche =  $model->showGastosTotalMonthcategory($_REQUEST['month'], "Coche");
        $resultGastoRegalos =  $model->showGastosTotalMonthcategory($_REQUEST['month'], "Regalos");
        $resultGastoOcio =  $model->showGastosTotalMonthcategory($_REQUEST['month'], "Ocio");
        $resultGastoRopa =  $model->showGastosTotalMonthcategory($_REQUEST['month'], "Ropa");
        $resultGastoOtros =  $model->showGastosTotalMonthcategory($_REQUEST['month'], "Otros");
      } 
 
     ?>
     
        <span class="gastoCategoria" id="resultGastoCasa"><?php if(isset($_REQUEST['month'])){  echo  $resultGastoCasa->gasto;} ?></span>
        <span class="gastoCategoria"  id="resultGastoCoche"><?php if(isset($_REQUEST['month'])){  echo  $resultGastoCoche->gasto;} ?></span>
        <span class="gastoCategoria"  id="resultGastoRegalos"><?php if(isset($_REQUEST['month'])){  echo  $resultGastoRegalos->gasto;} ?></span>
        <span class="gastoCategoria"  id="resultGastoOcio"><?php if(isset($_REQUEST['month'])){  echo  $resultGastoOcio->gasto;} ?></span>
        <span class="gastoCategoria"  id="resultGastoRopa"><?php if(isset($_REQUEST['month'])){  echo  $resultGastoRopa->gasto;} ?></span>
        <span class="gastoCategoria"  id="resultGastoOtros"><?php if(isset($_REQUEST['month'])){  echo  $resultGastoOtros->gasto;} ?></span>
         <div id="wrapper">
         <?php
            include_once "header.php"
         ?>
           
        <!--/. NAV TOP  -->

        <div id="" class="container">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <h1 class="page-header">
                                    Ver mes 
                                </h1>
                            </div>
                            <div class="col-12 col-md-6 d-flex align-items-center justify-content-end">
                                <a href="ver-annio.php" class="btn btn-primary mr-3">Ver año</a>
                                <a href="index.php" class="btn btn-primary">Ir a inicio</a>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-green">
                            <div class="panel-body">
                                <i class="far fa-credit-card"></i>
                                <?php if(isset($_REQUEST['month']) && isset($_REQUEST['year'])): ?>
                                    <h3 id="totalGastos"><?php $gastosTotales = $model->showGastosMonthTotal($_REQUEST['month'], $_REQUEST['year']); echo $gastosTotales->gastosTotales ? "$gastosTotales->gastosTotales Euros" : "0 Euros"; ?> </h3>
                                <?php endif ?>
                            </div>
                            <div class="panel-footer back-footer-green">
                                GASTOS
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-blue">
                            <div class="panel-body">
                                <i class="fas fa-hand-holding-usd"></i>
                                <?php if(isset($_REQUEST['month']) && isset($_REQUEST['year'])): ?>
                                    <h3 id="totalIngresos"><?php $ingresosTotales = $model->showIngresosMonthTotal($_REQUEST['month'], $_REQUEST['year']); echo $ingresosTotales->ingresosTotales ? "$ingresosTotales->ingresosTotales Euros" : "0 Euros"; ?> </h3>
                                <?php endif ?>
                            </div>
                            <div class="panel-footer back-footer-blue">
                                INGRESOS
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-red">
                            <div class="panel-body">
                                <i class="fas fa-piggy-bank"></i>
                                    <h3 id="totalAhorro"></h3>
                            </div>
                            <div class="panel-footer back-footer-red">
                                AHORRO
                            </div>
                        </div>
                    </div>
                </div>

                <form>
                    <div class="row align-items-end">
                        <div class="col-md-4">
                            <label for="month">Mes</label>
                            <select id="month" name="month" class="form-control" required="">
                                <option selected="">Elige mes...</option>
                                <option>Enero</option>
                                <option>Febrero</option>
                                <option>Marzo</option>
                                <option>Abril</option>
                                <option>Mayo</option>
                                <option>Junio</option>
                                <option>Julio</option>
                                <option>Agosto</option>
                                <option>Septiembre</option>
                                <option>Octubre</option>
                                <option>Noviembre</option>
                                <option>Diciembre</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="year">Año</label>
                            <input type="number" class="form-control" id="year" name="year" minlength="4" maxlength="4" min="2021" placeholder="Elige año" required="">
                        </div>
                        <div class="col-md-4 d-flex align-items-center justify-content-end">
                            <input type="submit" value="Ver mes" id="showMonth" class="btn btn-primary" name="showMonth" />
                        </div>
                    </div>
                </form>
                
                <?php if(isset($_REQUEST['month'])):  ?>
                <div class="row mt-5 d-flex justify-content-center">
                    <div id="donutchart" style="width: 900px; height: 500px;"></div>
                </div>
                <?php endif ?>
                
                    
                <?php if(isset($_REQUEST['month']) && isset($_REQUEST['year'])): ?>
                    <div class="card mt-5">
                        <div class="card-body">
                            <h4 class="title mb-4">Gastos <?php echo $_REQUEST['month'] . " " . $_REQUEST['year'] ?></h4>
                            <table class="display responsive nowrap" width="100%" id="tablaGastosMes">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Concepto</th>
                                        <th scope="col">Categoria</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Importe</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($model->showGastosMonth($_REQUEST['month'], $_REQUEST['year']) as $gasto):?>    
                                        <tr>
                                            <td><?php echo $gasto->getConcept() ?></td>
                                            <td><?php echo $gasto->getCategory() ?></td>
                                            <td><?php echo $gasto->getDay()."/".$gasto->getMonth()."/".$gasto->getYear() ?></td>
                                            <td><?php echo $gasto->getValue() ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php endif?>
                
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>

    <script>
         $(document).ready(function() {
            $('#tablaGastosMes').DataTable({
                "responsive": true
            });
        });

        document.addEventListener("DOMContentLoaded", e => {
           let totalGastos = parseFloat(document.getElementById("totalGastos").innerHTML);
           let totalIngresos = parseFloat(document.getElementById("totalIngresos").innerHTML);
           let totalAhorro = document.getElementById("totalAhorro");

           isNaN(totalGastos) ? totalGastos = 0 : totalGastos;
           isNaN(totalIngresos) ? totalIngresos = 0 : totalIngresos;
           let totalAhorroValue = totalIngresos-totalGastos;

           totalAhorro.innerHTML = `${totalAhorroValue} Euros`;
        })

        const gastosCategoriaValue= [];

        document.addEventListener('DOMContentLoaded', e=> {
            const gastos = document.querySelectorAll(".gastoCategoria");
            
            gastos.forEach(e => {
                if(e.innerHTML === "") {
                    e = 0;
                    gastosCategoriaValue.push(e)
                } else {
                    gastosCategoriaValue.push(e.innerHTML);
                }
            })
        })
    </script>
    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Mes', 'Gasto'],
            ['Casa', parseFloat(gastosCategoriaValue[0])],
            ['Coche', parseFloat(gastosCategoriaValue[1])],
            ['Regalos', parseFloat(gastosCategoriaValue[2])],
            ['Ocio', parseFloat(gastosCategoriaValue[3])],
            ['Ropa', parseFloat(gastosCategoriaValue[4])],
            ['Otros', parseFloat(gastosCategoriaValue[5])]]);
            
        var options = {
          title: 'Gasto por categoría',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>
  </body>
</html>