    <h1>
        {{ $modo=='crear' ? 'Agregar Empleado' : 'Modificar Empleado'}}
    </h1>

    <div class="col-md-6">
        <label class="form-label">Código</label>
        <input type="text" name="codigo" class="form-control" value="{{ isset($empleado->codigo) ? $empleado->codigo : '' }}" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Nombre</label>
        <input type="text" name="name" class="form-control" value="{{ isset($empleado->name) ? $empleado->name : '' }}" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Salario Dolares</label>
        <input type="number" name="salarioDolares" id="salarioDolares" class="form-control" value="{{ isset($empleado->salarioDolares) ? $empleado->salarioDolares : '' }}">
        <span id="msj" class="btn-warning"></span>
    </div>
    <div class="col-md-6">
        <label class="form-label">Salario Pesos</label>
        <input type="text" name="salarioPesos" id="salarioPesos" class="form-control" value="{{ isset($empleado->salarioPesos) ? $empleado->salarioPesos : '' }}" readonly required>
    </div>
    <div class="col-md-6">
        <label class="form-label">direccion</label>
        <input type="text" name="direccion" class="form-control" value="{{ isset($empleado->direccion) ? $empleado->direccion : '' }}">
    </div>
    <div class="col-md-6">
        <label class="form-label">Estado</label>
        <input type="text" name="estado" class="form-control" value="{{ isset($empleado->estado) ? $empleado->estado : '' }}">
    </div>
    <div class="col-md-6">
        <label class="form-label">Ciudad</label>
	    <input type="text" name="ciudad" class="form-control" value="{{ isset($empleado->ciudad) ? $empleado->ciudad : '' }}">
    </div>
    <div class="col-md-6">
        <label class="form-label">Teléfono</label>
	    <input type="number" name="telefono" class="form-control" value="{{ isset($empleado->telefono) ? $empleado->telefono : '' }}">
    </div>
    <div class="col-md-6">
        <label class="form-label">Correo Electrónico</label>
	    <input type="email" name="correo" class="form-control" value="{{ isset($empleado->correo) ? $empleado->correo : '' }}"  required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Activo</label>
        <select name="activo" class="form-control">
            <option value="1" selected>Habilitado</option>
            <option value="0">Inactivo</option>
        </select>
    </div>
    <div class="col-md-6">
        <input type="submit" class="form-control btn-primary" id="save" value="{{ $modo=='crear' ? 'Guardar' : 'Actualizar'}}">
    </div>


    <script>
        $(document).ready(function(){
            $("#salarioDolares").blur(function(){
                //alert("This input field has lost its focus.");
                $.ajax({
                    url : 'https://www.banxico.org.mx/SieAPIRest/service/v1/series/SF43718/datos/oportuno?token=4cc0a83201a12d4059d4d035a862238ea96520bbd69d9ec638de622d0812af16',
                    jsonp : 'callback',
                    dataType : 'jsonp', //Se utiliza JSONP para realizar la consulta cross-site
                    success : function(response) {  //Handler de la respuesta
                        var series=response.bmx.series;
                        //Se carga una tabla con los registros obtenidos
                        for (var i in series) {
                            var serie=series[i];
                            var reg=''+serie.titulo+' - '+serie.datos[0].fecha+ ' : '+serie.datos[0].dato+' MXN';
                            var dolares= $("#salarioDolares").val();
                            var cambio = serie.datos[0].dato;
                            $('#msj').text(reg);
                            var pesos = dolares * cambio;
                            alert("dolares: " + dolares + ", cambio: " +cambio + ", pesos: " + pesos);
                            var elem = document.getElementById('salarioPesos');
                                elem.value = pesos;
                            //$('#salarioPesos').text(pesos);
                        }
                    }
                });
            });
        });
    </script>