<?php
    require_once "Model.php";
    require_once "Gasto.php";
    require_once "Ingreso.php";
    session_start();

    $model = new Model();

    if(isset($_REQUEST['login'])) {
        $model->loggin();
    }

    if(isset($_REQUEST['addGasto'])) {
        $gasto = new Gasto($_REQUEST['codigo'] = null ,$_REQUEST['concept'], $_REQUEST['category'], $_REQUEST['day'], $_REQUEST['month'], $_REQUEST['year'], $_REQUEST['value']);
        $model->addGasto($gasto);
    }

    if(isset($_REQUEST['addIngreso'])) {
        $ingreso = new Ingreso($_REQUEST['codigo'] = null, $_REQUEST['concept'], $_REQUEST['month'], $_REQUEST['year'], $_REQUEST['value']);
        $model->addIngreso($ingreso);
    }

    if(isset($_REQUEST['editGasto'])) {
        $gasto = new Gasto($_REQUEST['codigo'],$_REQUEST['concept'], $_REQUEST['category'], $_REQUEST['day'], $_REQUEST['month'], $_REQUEST['year'], $_REQUEST['value']);
        $model->editGasto($gasto);
    }

    if(isset($_REQUEST['editIngreso'])) {
        $ingreso = new Ingreso($_REQUEST['codigo'], $_REQUEST['concept'], $_REQUEST['month'], $_REQUEST['year'], $_REQUEST['value']);
        $model->editIngreso($ingreso);
    }

    if(isset($_REQUEST['deleteGasto'])) {
        $model->deleteGasto($_REQUEST['deleteGasto']);
        header('Location: index.php');
    }

    if(isset($_REQUEST['deleteIngreso'])) {
        $model->deleteIngreso($_REQUEST['deleteIngreso']);
        header('Location: index.php');
    }
?>