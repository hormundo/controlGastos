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
      $resultGastoEnero =  $model->showGastosTotalmonth("enero");
      $resultGastoFebrero =  $model->showGastosTotalmonth("febrero");
      $resultGastoMarzo =  $model->showGastosTotalmonth("marzo");
      $resultGastoAbril =  $model->showGastosTotalmonth("abril");
      $resultGastoMayo =  $model->showGastosTotalmonth("mayo");
      $resultGastoJunio =  $model->showGastosTotalmonth("junio");
      $resultGastoJulio =  $model->showGastosTotalmonth("julio");
      $resultGastoAgosto =  $model->showGastosTotalmonth("agosto");
      $resultGastoSeptiembre =  $model->showGastosTotalmonth("septiembre");
      $resultGastoOctubre =  $model->showGastosTotalmonth("Octubre");
      $resultGastoNoviembre =  $model->showGastosTotalmonth("noviembre");
      $resultGastoDiciembre =  $model->showGastosTotalmonth("diciembre");
     ?>
    <span class="gastoMes" id="resultGastoEnero"><?php echo  $resultGastoEnero->gasto; ?></span>
    <span class="gastoMes"  id="resultGastoFebrero"><?php echo  $resultGastoFebrero->gasto; ?></span>
    <span class="gastoMes"  id="resultGastoMarzo"><?php echo  $resultGastoMarzo->gasto; ?></span>
    <span class="gastoMes"  id="resultGastoAbril"><?php echo  $resultGastoAbril->gasto; ?></span>
    <span class="gastoMes"  id="resultGastoMayo"><?php echo  $resultGastoMayo->gasto; ?></span>
    <span class="gastoMes"  id="resultGastoJunio"><?php echo  $resultGastoJunio->gasto; ?></span>
    <span class="gastoMes"  id="resultGastoJulio"><?php echo  $resultGastoJulio->gasto; ?></span>
    <span class="gastoMes"  id="resultGastoAgosto"><?php echo  $resultGastoAgosto->gasto; ?></span>
    <span class="gastoMes"  id="resultGastoSeptiembre"><?php echo  $resultGastoSeptiembre->gasto; ?></span>
    <span class="gastoMes"  id="resultGastoOctubre"><?php echo  $resultGastoOctubre->gasto; ?></span>
    <span class="gastoMes"  id="resultGastoNoviembre"><?php echo  $resultGastoNoviembre->gasto; ?></span>
    <span class="gastoMes"  id="resultGastoDiciembre"><?php echo  $resultGastoDiciembre->gasto; ?></span>

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
                                    Ver año 
                                </h1>
                            </div>
                            <div class="col-12 col-md-6 d-flex align-items-center justify-content-end">
                                <a href="ver-mes.php" class="btn btn-primary mr-3">Ver mes</a>
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
                                <?php if(isset($_REQUEST['year'])): ?>
                                    <h3 id="totalGastosAnnio"><?php $gastosTotalesAnnio = $model->showGastosAnnioTotal($_REQUEST['year']); echo $gastosTotalesAnnio->gastosTotales ? "$gastosTotalesAnnio->gastosTotales Euros" : "0 Euros"; ?> </h3>
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
                                <?php if(isset($_REQUEST['year'])): ?>
                                    <h3 id="totalIngresosAnnio"><?php $totalIngresosAnnio = $model->showIngresosAnnioTotal($_REQUEST['year']); echo $totalIngresosAnnio->ingresosTotales ? "$totalIngresosAnnio->ingresosTotales Euros" : "0 Euros"; ?> </h3>
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
                                    <h3 id="totalAhorroAnnio"></h3>
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
                            <label for="year">Año</label>
                            <input type="number" class="form-control" id="year" name="year" minlength="4" maxlength="4" min="2021" placeholder="Elige año" required="">
                        </div>
                        <div class="col-md-4">
                            
                        </div>
                        <div class="col-md-4 d-flex align-items-center justify-content-end">
                            <input type="submit" value="Ver año" id="showYear" class="btn btn-primary" name="showYear" />
                        </div>
                    </div>
                </form>

                <div class="row mt-5 mb-5 d-flex justify-content-center">
                    <div id="barchart_values" class="row d-flex justify-content-center" style="width: 900px; height: 400px;"></div>
                </div>
                
                <?php if(isset($_REQUEST['year'])): ?>
                    <div class="card mt-5">
                        <div class="card-body">
                            <h4 class="title mb-4">Gastos <?php echo $_REQUEST['year'] ?></h4>
                            <table class="display responsive nowrap" width="100%" id="tablaGastosAnnio">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Concepto</th>
                                        <th scope="col">Categoria</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Importe</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($model->showGastosAnnio($_REQUEST['year']) as $gasto):?>    
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
            $('#tablaGastosAnnio').DataTable({
                "responsive": true
            });
        });

        document.addEventListener("DOMContentLoaded", e => {
            
           let totalGastosAnnio = parseFloat(document.getElementById("totalGastosAnnio").innerHTML);
           let totalIngresosAnnio = parseFloat(document.getElementById("totalIngresosAnnio").innerHTML);
           let totalAhorroAnnio = document.getElementById("totalAhorroAnnio");

           isNaN(totalGastosAnnio) ? totalGastosAnnio = 0 : totalGastosAnnio;
           isNaN(totalIngresosAnnio) ? totalIngresosAnnio = 0 : totalIngresosAnnio;
           let totalAhorroValue = totalIngresosAnnio-totalGastosAnnio;

           totalAhorroAnnio.innerHTML = `${totalAhorroValue} Euros`;
        })

        const gastosMesesValues = [];

        document.addEventListener('DOMContentLoaded', e=> {
            const gastosMeses = document.querySelectorAll(".gastoMes");
            
            gastosMeses.forEach(e => {
            gastosMesesValues.push(e.innerHTML)
            })
        })
        
    </script>
    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Mes', 'Gasto', { role: 'style' }],
                ['Enero', parseFloat(gastosMesesValues[0]), 'gold'],
                ['Febrero', parseFloat(gastosMesesValues[1]), 'gold'],
                ['Marzo', parseFloat(gastosMesesValues[2]), 'gold'],
                ['Abril', parseFloat(gastosMesesValues[3]), 'gold'],
                ['Mayo', parseFloat(gastosMesesValues[4]), 'gold'],
                ['Junio', parseFloat(gastosMesesValues[5]), 'gold'],
                ['Julio', parseFloat(gastosMesesValues[6]), 'gold'],
                ['Agosto', parseFloat(gastosMesesValues[7]), 'gold'],
                ['Septiembre', parseFloat(gastosMesesValues[8]), 'gold'],
                ['Octubre', parseFloat(gastosMesesValues[9]), 'gold'],
                ['Noviembre', parseFloat(gastosMesesValues[10]), 'gold'],
                ['Diciembre', parseFloat(gastosMesesValues[11]), 'gold']]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
                        { calc: "stringify",
                            sourceColumn: 1,
                            type: "string",
                            role: "annotation" },
                        2]);

        var options = {
            title: 'Gasto por mes',
            width: 600,
            height: 400,
            bar: {groupWidth: "95%"},
            legend: { position: "none" },
        };
        var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
        chart.draw(view, options);
    }
  </script>
  </body>
</html>