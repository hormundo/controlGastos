<?php
    require_once "Conexion.php";

    class Model {

        public function __construct() {}

        public function loggin() {
            $query = "SELECT * FROM `users` WHERE `username` like :username";

            $conn = Conexion::conexion();

            $stmt = $conn->prepare($query);
            $stmt->bindParam(":username", $_REQUEST['username']);
            $stmt->execute();  

            $result = $stmt->fetch();

            if (!$result) {
                echo '<p class="error">Username is wrong!</p>';
                
            } else {
                $query = "SELECT * FROM `users` WHERE `password` like :password";

                $stmt = $conn->prepare($query);
                $stmt->bindParam(":password", $_REQUEST['password']);
                $stmt->execute();  

                $result = $stmt->fetch();

                if($result) {
                    $_SESSION['user_id'] = $result->id;
                    $_SESSION['user'] = $result->username;

                    echo '<p class="success">Congratulations, you are logged in!</p>';
                    echo '<script>window.location = "index.php"</script>';
                } 
                else {
                    echo '<div class="alert alert-danger" role="alert">
                            Contraseña erronea!
                        </div>';
                }

                if(!isset($_SESSION['user_id'])){
                    header('Location: login.php');
                    exit;
                }
            }

            $conn = null;
        }

        public function addGasto($gasto) {
            try {
                $query = "INSERT INTO gastos (concept, category, day, month, year, value) VALUES (?, ?, ?, ?, ?, ?)";

                $conn = Conexion::conexion();
                //Conexion::createTable();
                $stmt = $conn->prepare($query)->execute
                (array( $gasto->getConcept(),
                        $gasto->getCategory(),
                        $gasto->getDay(),
                        $gasto->getMonth(),
                        $gasto->getYear(),
                        $gasto->getValue()
                    ));
                
            } catch(PDOException $e) {
                die($e->getMessage());
            }

            $conn = null;

            $_REQUEST['addGasto'] = true;
        }

        public function addIngreso($ingreso) {
            try {
                $query = "INSERT INTO ingresos (concept, month, year, value) VALUES (?, ?, ?, ?)";

                $conn = Conexion::conexion();
                //Conexion::createTable();
                $stmt = $conn->prepare($query)->execute
                (array( $ingreso->getConcept(),
                        $ingreso->getMonth(),
                        $ingreso->getYear(),
                        $ingreso->getValue()
                    ));
                
            } catch(PDOException $e) {
                die($e->getMessage());
            }

            $conn = null;

            $_REQUEST['addIngreso'] = true;
        }

        public function editGasto($gasto) {
            try {
                $query = "update gastos set concept = ?, category = ?, day = ?, month = ?, year = ?, value = ? where codigo_g = ?";

                $conn = Conexion::conexion();
                //Conexion::createTable();
                $stmt = $conn->prepare($query)->execute
                (array( $gasto->getConcept(),
                        $gasto->getCategory(),
                        $gasto->getDay(),
                        $gasto->getMonth(),
                        $gasto->getYear(),
                        $gasto->getValue(),
                        $gasto->getCodigo()
                    ));
                
            } catch(PDOException $e) {
                die($e->getMessage());
            }

            $conn = null;

            $_REQUEST['editGasto'] = true;
        }

        public function editIngreso($ingreso) {
            try {
                $query = "update ingresos set concept = ?, month = ?, year = ?, value = ? where codigo_i = ?";

                $conn = Conexion::conexion();
                //Conexion::createTable();
                $stmt = $conn->prepare($query)->execute
                (array( $ingreso->getConcept(),
                        $ingreso->getMonth(),
                        $ingreso->getYear(),
                        $ingreso->getValue(),
                        $ingreso->getCodigo()
                    ));
                
            } catch(PDOException $e) {
                die($e->getMessage());
            }

            $conn = null;

            $_REQUEST['editGasto'] = true;
        }

        public function showGastos() {
            try {
                $result = array();
                $query = "select * from gastos";

                $conn = Conexion::conexion();

                $stmt = $conn->prepare($query);

                $stmt->execute();

                foreach($stmt->fetchAll() as $r) {
                    $gasto = new Gasto();
                    $gasto->setCodigo($r->codigo_g);
                    $gasto->setConcept($r->concept);
                    $gasto->setCategory($r->category);
                    $gasto->setDay($r->day);
                    $gasto->setMonth($r->month);
                    $gasto->setYear($r->year);
                    $gasto->setValue($r->value);

                    $result[] = $gasto;
                }

                return $result;

            }  catch(PDOException $e) {
                die($e->getMessage());
            }

            $conn = null;
        }

        public function showIngresos() {
            try {
                $result = array();
                $query = "select * from ingresos";

                $conn = Conexion::conexion();

                $stmt = $conn->prepare($query);

                $stmt->execute();

                foreach($stmt->fetchAll() as $r) {
                    $ingreso = new Ingreso();
                    $ingreso->setCodigo($r->codigo_i);
                    $ingreso->setConcept($r->concept);
                    $ingreso->setMonth($r->month);
                    $ingreso->setYear($r->year);
                    $ingreso->setValue($r->value);

                    $result[] = $ingreso;
                }

                return $result;

            }  catch(PDOException $e) {
                die($e->getMessage());
            }

            $conn = null;
        }

        public function deleteGasto($codigo) {
            try {
                $query = "delete from gastos where codigo_g = ?";

                $conn = Conexion::conexion();

                $stmt = $conn->prepare($query);

                $stmt->execute(array($codigo));

                $_REQUEST['deleteGasto'] = true;

            } catch(PDOException $e) {
                die($e->getMessage());
            }

            $conn = null;
        }

        public function deleteIngreso($codigo) {
            try {
                $query = "delete from ingresos where codigo_i = ?";

                $conn = Conexion::conexion();

                $stmt = $conn->prepare($query);

                $stmt->execute(array($codigo));

                $_REQUEST['deleteIngreso'] = true;

            } catch(PDOException $e) {
                die($e->getMessage());
            }

            $conn = null;
        }

        //ver mes
        public function showGastosMonth($month, $year) {

            try  {
                $result = array();
                $query = "select * from gastos where month = ? and year = ?";

                $conn = Conexion::conexion();
    
                $stmt = $conn->prepare($query);

                $stmt->execute(array($month, $year));

                foreach($stmt->fetchAll() as $r) {
                    $gasto = new Gasto();
                    $gasto->setConcept($r->concept);
                    $gasto->setCategory($r->category);
                    $gasto->setDay($r->day);
                    $gasto->setMonth($r->month);
                    $gasto->setYear($r->year);
                    $gasto->setValue($r->value);
    
                    $result[] = $gasto;
                }
                
            } catch (PDOException $e) {
                die($e->getMessage());
            }
          
            return $result;
        }

        public function showGastosMonthTotal($month, $year) {

            try  {
                $query = "select sum(value) as gastosTotales from gastos where month = ? and year = ?";

                $conn = Conexion::conexion();
    
                $stmt = $conn->prepare($query);

                $stmt->execute(array($month, $year));

                $result = $stmt->fetch();
                
            } catch (PDOException $e) {
                die($e->getMessage());
            }
          
            return $result;
        }

        public function showIngresosMonthTotal($month, $year) {

            try  {
                $query = "select sum(value) as ingresosTotales from ingresos where month = ? and year = ?";

                $conn = Conexion::conexion();
    
                $stmt = $conn->prepare($query);

                $stmt->execute(array($month, $year));

                $result = $stmt->fetch();
                
            } catch (PDOException $e) {
                die($e->getMessage());
            }
          
            return $result;
        }

        //ver año
        public function showGastosAnnio($year) {

            try  {
                $result = array();
                $query = "select * from gastos where year = ?";

                $conn = Conexion::conexion();
    
                $stmt = $conn->prepare($query);

                $stmt->execute(array($year));

                foreach($stmt->fetchAll() as $r) {
                    $gasto = new Gasto();
                    $gasto->setConcept($r->concept);
                    $gasto->setCategory($r->category);
                    $gasto->setDay($r->day);
                    $gasto->setMonth($r->month);
                    $gasto->setYear($r->year);
                    $gasto->setValue($r->value);
    
                    $result[] = $gasto;
                }
                
            } catch (PDOException $e) {
                die($e->getMessage());
            }
          
            return $result;
        }

        public function showGastosAnnioTotal($year) {

            try  {
                $query = "select sum(value) as gastosTotales from gastos where year = ?";

                $conn = Conexion::conexion();
    
                $stmt = $conn->prepare($query);

                $stmt->execute(array($year));

                $result = $stmt->fetch();
                
            } catch (PDOException $e) {
                die($e->getMessage());
            }
          
            return $result;
        }

        public function showIngresosAnnioTotal($year) {

            try  {
                $query = "select sum(value) as ingresosTotales from ingresos where year = ?";

                $conn = Conexion::conexion();
    
                $stmt = $conn->prepare($query);

                $stmt->execute(array($year));

                $result = $stmt->fetch();
                
            } catch (PDOException $e) {
                die($e->getMessage());
            }
          
            return $result;
        }

        //gráfica meses
        public function showGastosTotalmonth($month)
        {
            return $this->showGastosTotalMes($month);
        }

        private function showGastosTotalMes($month) {
            try  {
                $query = "select sum(value) as gasto from gastos where month = ?";

                $conn = Conexion::conexion();
    
                $stmt = $conn->prepare($query);

                $stmt->execute(array($month));

                $result = $stmt->fetch();
                
            } catch (PDOException $e) {
                die($e->getMessage());
            }
          
            return $result;
        }

        //gráfica categorías
        public function showGastosTotalMonthcategory($month, $category)
        {
            return $this->showGastosTotalMonthCategoria($month, $category);
        }

        private function showGastosTotalMonthCategoria($month, $category) {
            try  {
                $query = "select sum(value) as gasto from gastos where month = ? and category like ?";

                $conn = Conexion::conexion();
    
                $stmt = $conn->prepare($query);

                $stmt->execute(array($month, $category));

                $result = $stmt->fetch();
                
            } catch (PDOException $e) {
                die($e->getMessage());
            }
          
            return $result;
        }
    }
?>