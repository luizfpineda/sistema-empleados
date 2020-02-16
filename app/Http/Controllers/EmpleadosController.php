<?php

namespace App\Http\Controllers;

use App\Empleados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['empleados']=Empleados::paginate(10);
        return view('empleados.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $campos=[ 
            'NombreEmpleado' => 'required|string|max:100',
            'Identificacion' => 'required|integer',
            'FechaIngreso' => 'required|date',
            'TipoContrato' => 'required|string|max:100',
            'Contrato' => 'required|max:10000|mimes:jpeg,png,jpg,pdf,docx',
            'HojaDeVida' => 'required|max:10000|mimes:jpeg,png,jpg,pdf,docx',
            'ExamenIngreso' => 'required|max:10000|mimes:jpeg,png,jpg,pdf,docx',
            'Afiliacioneps' => 'required|max:10000|mimes:jpeg,png,jpg,pdf,docx',
            'Afiliacionarl' => 'required|max:10000|mimes:jpeg,png,jpg,pdf,docx',
            'Afiliacioncaja' => 'required|max:10000|mimes:jpeg,png,jpg,pdf,docx',
            'Certificadoalturas' => 'required|max:10000|mimes:jpeg,png,jpg,pdf,docx',
            'Foto' => 'required|max:10000|mimes:jpeg,png,jpg,pdf,docx',
        ];

          $Mensaje=["required"=>'El :attribute es requerido']; 
         
          $this->validate($request,$campos,$Mensaje);
       




        //
        //$datosEmpleado=request()->all();
        //Empleados::insert($datosEmpleado);
       $datosEmpleado=request()->except('_token');
        
       if($request->hasFile('Contrato')){
                
        $datosEmpleado['Contrato']=$request->file('Contrato')->store('uploads','public');

       }

       if($request->hasFile('HojaDeVida')){
                
        $datosEmpleado['HojaDeVida']=$request->file('HojaDeVida')->store('uploads','public');

       }

       if($request->hasFile('ExamenIngreso')){
                
        $datosEmpleado['ExamenIngreso']=$request->file('ExamenIngreso')->store('uploads','public');

       }

       if($request->hasFile('Afiliacioneps')){
                
        $datosEmpleado['Afiliacioneps']=$request->file('Afiliacioneps')->store('uploads','public');

       }
       
       if($request->hasFile('Afiliacionarl')){
                
        $datosEmpleado['Afiliacionarl']=$request->file('Afiliacionarl')->store('uploads','public');

       }

       if($request->hasFile('Afiliacioncaja')){
                
        $datosEmpleado['Afiliacioncaja']=$request->file('Afiliacioncaja')->store('uploads','public');

       }

       if($request->hasFile('Certificadoalturas')){
                
        $datosEmpleado['Certificadoalturas']=$request->file('Certificadoalturas')->store('uploads','public');

       }

       if($request->hasFile('Foto')){
                
        $datosEmpleado['Foto']=$request->file('Foto')->store('uploads','public');

       }
       
       Empleados::insert($datosEmpleado);
     
       //return response()->json($datosEmpleado);
       return redirect('empleados')->with('Mensaje','Empleado agregado con éxito');
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function show(Empleados $empleados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
          $empleado= Empleados::findOrFail($id);

          return view('empleados.edit',compact('empleado'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $campos=[ 
            'NombreEmpleado' => 'required|string|max:100',
            'Identificacion' => 'required|integer',
            'FechaIngreso' => 'required|date',
            'TipoContrato' => 'required|string|max:100'

        ];

          if($request->hasFile('Contrato')){

            $campos+=['Contrato' => 'required|max:10000|mimes:jpeg,png,jpg,pdf,docx'];

          }

          if($request->hasFile('HojaDeVida')){
            $campos+=['HojaDeVida' => 'required|max:10000|mimes:jpeg,png,jpg,pdf,docx'];

          }

          
          if($request->hasFile('ExamenIngreso')){
            $campos+=['ExamenIngreso' => 'required|max:10000|mimes:jpeg,png,jpg,pdf,docx'];

          }

          if($request->hasFile('Afiliacioneps')){
            $campos+=['Afiliacioneps' => 'required|max:10000|mimes:jpeg,png,jpg,pdf,docx'];

          }

          if($request->hasFile('Afiliacionarl')){
            $campos+=['Afiliacionarl' => 'required|max:10000|mimes:jpeg,png,jpg,pdf,docx'];

          }

          if($request->hasFile('Afiliacioncaja')){
            $campos+=['Afiliacioncaja' => 'required|max:10000|mimes:jpeg,png,jpg,pdf,docx'];

          }

          if($request->hasFile('Certificadoalturas')){
            $campos+=['Certificadoalturas' => 'required|max:10000|mimes:jpeg,png,jpg,pdf,docx'];

          }

          if($request->hasFile('Foto')){
            $campos+=['Foto' => 'required|max:10000|mimes:jpeg,png,jpg,pdf,docx'];

          }
          $Mensaje=["required"=>'El :attribute es requerido']; 

          $this->validate($request,$campos,$Mensaje);




        $datosEmpleado=request()->except(['_token','_method']);

        if($request->hasFile('Contrato')){

            $empleado= Empleados::findOrFail($id);    
            Storage::delete('public/'.$empleado->Contrato);
            $datosEmpleado['Contrato']=$request->file('Contrato')->store('uploads','public');
           }

           if($request->hasFile('HojaDeVida')){

            $empleado= Empleados::findOrFail($id);    
            Storage::delete('public/'.$empleado->HojaDeVida);
            $datosEmpleado['HojaDeVida']=$request->file('HojaDeVida')->store('uploads','public');
           }  

           if($request->hasFile('ExamenIngreso')){

            $empleado= Empleados::findOrFail($id);    
            Storage::delete('public/'.$empleado->ExamenIngreso);
            $datosEmpleado['ExamenIngreso']=$request->file('ExamenIngreso')->store('uploads','public');
           }  

           if($request->hasFile('Afiliacioneps')){

            $empleado= Empleados::findOrFail($id);    
            Storage::delete('public/'.$empleado->Afiliacioneps);
            $datosEmpleado['Afiliacioneps']=$request->file('Afiliacioneps')->store('uploads','public');
           }  

           if($request->hasFile('Afiliacionarl')){

            $empleado= Empleados::findOrFail($id);    
            Storage::delete('public/'.$empleado->Afiliacionarl);
            $datosEmpleado['Afiliacionarl']=$request->file('Afiliacionarl')->store('uploads','public');
           }  

           if($request->hasFile('Afiliacioncaja')){

            $empleado= Empleados::findOrFail($id);    
            Storage::delete('public/'.$empleado->Afiliacioncaja);
            $datosEmpleado['Afiliacioncaja']=$request->file('Afiliacioncaja')->store('uploads','public');
           }  

           if($request->hasFile('Certificadoalturas')){

            $empleado= Empleados::findOrFail($id);    
            Storage::delete('public/'.$empleado->Certificadoalturas);
            $datosEmpleado['Certificadoalturas']=$request->file('Certificadoalturas')->store('uploads','public');
           }  

           if($request->hasFile('Foto')){

            $empleado= Empleados::findOrFail($id);    
            Storage::delete('public/'.$empleado->Foto);
            $datosEmpleado['Foto']=$request->file('Foto')->store('uploads','public');
           }  



        Empleados::where('id','=',$id)->update($datosEmpleado);

        //$empleado= Empleados::findOrFail($id);
        //return view('empleados.edit',compact('empleado'));
        return redirect('empleados')->with('Mensaje','Empleado Modificado con éxito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $empleado= Empleados::findOrFail($id);    
       if(Storage::delete('public/'.$empleado->Contrato));{
        Empleados::destroy($id);
       }

        

       return redirect('empleados')->with('Mensaje','Empleado Eliminado');

    }
}
