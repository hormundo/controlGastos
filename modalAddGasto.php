<div class="modal fade" id="popGasto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Añadir gasto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <input type="number" hidden id="codigo" name="codigo" value="">
                    <label for="day">Día</label>
                    <select id="day" name="day" class="form-control" required>
                        <option selected>Elige día...</option>
                        <option>01</option>
                        <option>02</option>
                        <option>03</option>
                        <option>04</option>
                        <option>05</option>
                        <option>06</option>
                        <option>07</option>
                        <option>08</option>
                        <option>09</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                        <option>12</option>
                        <option>14</option>
                        <option>15</option>
                        <option>16</option>
                        <option>17</option>
                        <option>18</option>
                        <option>19</option>
                        <option>20</option>
                        <option>21</option>
                        <option>22</option>
                        <option>23</option>
                        <option>24</option>
                        <option>25</option>
                        <option>26</option>
                        <option>27</option>
                        <option>28</option>
                        <option>29</option>
                        <option>30</option>
                        <option>31</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="month">Mes</label>
                    <select id="month" name="month" class="form-control" required>
                        <option selected>Elige mes...</option>
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
                <div class="form-group col-md-4">
                    <label for="year">Año</label>
                    <input type="number" class="form-control" id="year" name="year" minlength="4" maxlength="4" min="2021" placeholder="Elige año" required>
                </div>
            </div>
            <div class="form-group">
                <label for="concept">Concepto</label>
                <input type="text" class="form-control" id="concept" name="concept" placeholder="Introduce el nombre del concepto" required>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="category">Categoria</label>
                    <select id="category" name="category" class="form-control" required>
                        <option selected>Elige categoria...</option>
                        <option>Casa</option>
                        <option>Coche</option>
                        <option>Regalos</option>
                        <option>Ocio</option>
                        <option>Ropa</option>
                        <option>Otros</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="value">Cantidad</label>
                    <input type="number" class="form-control" id="value" placeholder="Cantidad" name="value" required>
                </div>
            </div>
            <input type="submit" class="btn btn-primary w-100" name="addGasto" value="Añadir gasto">
        </form>
      </div>
    </div>
  </div>
</div>