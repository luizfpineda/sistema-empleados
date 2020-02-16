



<label for="NombreEmpleado">{{'Nombre Empleado'}}</label>
<input type="text" name="NombreEmpleado" id="NombreEmpleado" 
 value="{{ isset($empleado->NombreEmpleado)?$empleado->NombreEmpleado:old('NombreEmpleado') }}">

 <br/>


<label for="Identificacion">{{'Identificacion'}}</label>
<input type="text" name="Identificacion" id="Identificacion" 
value="{{ isset($empleado->Identificacion)?$empleado->Identificacion:old('Identificacion') }}">
<br/>

<label for="FechaIngreso">{{'Fecha  Ingreso'}}</label>
<input type="text" name="FechaIngreso" id="FechaIngreso"

value="{{ isset($empleado->FechaIngreso)?$empleado->FechaIngreso:old('FechaIngreso') }}">
<br/>

<label for="TipoContrato">{{'Tipo Contrato'}}</label>
<input type="text" name="TipoContrato" id="TipoContrato" 
value="{{ isset($empleado->TipoContrato)?$empleado->TipoContrato:old('TipoContrato')}}">
<br/>

<label for="Contrato">{{'Contrato'}}</label>
@if(isset ($empleado->Contrato))
<br/>
<img src="{{ asset('storage').'/'. $empleado->Contrato}}" alt="" width="50">
<br/>
@endif
<input type="file" name="Contrato" id="Contrato" value="">
<br/>

<label for="HojaDeVida">{{'Hoja De Vida'}}</label>

@if(isset ($empleado->HojaDeVida))
<br/>
<img src="{{ asset('storage').'/'. $empleado->HojaDeVida}}" alt="" width="50">
<br/>
@endif
<input type="file" name="HojaDeVida" id="HojaDeVida" value="">
<br/>

<label for="ExamenIngreso">{{'Examen Ingreso'}}</label>

@if(isset ($empleado->ExamenIngreso))
<br/>
<img src="{{ asset('storage').'/'. $empleado->ExamenIngreso}}" alt="" width="50">
<br/>
@endif

<input type="file" name="ExamenIngreso" id="ExamenIngreso" value="">
<br/>

<label for="Afiliacioneps">{{'Afiliacion eps'}}</label>

@if(isset ($empleado->Afiliacioneps))
<br/>
<img src="{{ asset('storage').'/'. $empleado->Afiliacioneps}}" alt="" width="50">
<br/>
@endif
<input type="file" name="Afiliacioneps" id="Afiliacioneps" value="">
<br/>

<label for="Afiliacionarl">{{'Afiliacion arl'}}</label>

@if(isset ($empleado->Afiliacionarl))
<br/>
<img src="{{ asset('storage').'/'. $empleado->Afiliacionarl}}" alt="" width="50">
<br/>
@endif
<input type="file" name="Afiliacionarl" id="Afiliacionarl" value="">
<br/>

<label for="Afiliacioncaja">{{'Afiliacion caja'}}</label>

@if(isset ($empleado->Afiliacioncaja))
<br/>
<img src="{{ asset('storage').'/'. $empleado->Afiliacioncaja}}" alt="" width="50">
<br/>
@endif
<input type="file" name="Afiliacioncaja" id="Afiliacioncaja" value="">
<br/>

<label for="Certificadoalturas">{{'Certificado alturas'}}</label>

@if(isset ($empleado->Certificadoalturas))
<br/>
<img src="{{ asset('storage').'/'. $empleado->Certificadoalturas}}" alt="" width="50">
<br/>
@endif
<input type="file" name="Certificadoalturas" id="Certificadoalturas" value="">
<br/>

<label for="Foto">{{'Foto'}}</label>

@if(isset ($empleado->Foto))
<br/>
<img src="{{ asset('storage').'/'. $empleado->Foto}}" alt="" width="50">
<br/>
@endif
<input type="file" name="Foto" id="Foto" value="">
<br/>

<input type="submit" class="btn btn-success" value="{{ $Modo=='crear' ? 'Agregar': 'Modificar'}}">
<a class="btn btn-primary" href="{{url ('empleados')}}">Regresar</a>