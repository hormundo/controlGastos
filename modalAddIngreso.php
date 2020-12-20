<div class="modal fade" id="popIngreso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Añadir ingreso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post">
        <div class="form-row">
            <div class="form-group col">
                    <input type="number" hidden id="codigo" name="codigo" value="">
                    <label for="concept">Concepto</label>
                    <input type="text" class="form-control" id="concept" name="concept" placeholder="Introduce el nombre del concepto" required>
                </div>
            </div>
            
            <div class="form-row">
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
                <div class="form-group col-md-4">
                    <label for="value">Cantidad</label>
                    <input type="number" class="form-control" id="value" placeholder="Cantidad" name="value" required>
                </div>
            </div>
            <input type="submit" class="btn btn-primary w-100" name="addIngreso" value="Añadir ingreso">
        </form>
      </div>
    </div>
  </div>
</div>