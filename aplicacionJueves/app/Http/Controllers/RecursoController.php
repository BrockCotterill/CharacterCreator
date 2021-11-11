<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $resources =  $request->session()->get('resources');
        $resources = [];
        if($request->session()->exists('resources')) {
            $resources = $request->session()->get('resources');
        }
        $data = [];
        $data['resources'] = $resources;
        return view('resource.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         
        return view('resource.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $name =  $request->input('name');
        $age =  $request->input('age');
        $class =  $request->input('class');
        $hp =  $request->input('hp');
        $atk =  $request->input('atk');
        $def =  $request->input('def');
        $mp =  $request->input('mp');
        $stm =  $request->input('stm');
        
        
        $resources = [];
        if($request->session()->exists('resources')) {
            $resources = $request->session()->get('resources');
            $arrayFin = end($resources);
            if(isset($arrayFin['id'])){
            $id = $arrayFin['id']+1;
            }else{
                $id = 1;
            }
            
        }else{
            $id = 1;
        }
        $resources[$id] = ['id' => $id, 'name' => $name,'age'=>$age, 'class' => $class, 'hp' => $hp, 'atk' => $atk, 'def' => $def, 'mp' => $mp, 'stm' => $stm];
        $request->session()->put('resources', $resources);
        return redirect('resource');
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        if($request->session()->exists('resources') && isset($request->session()->get('resources')[$id])) {
            $resource = $request->session()->get('resources')[$id];
            $data = [];
            $data['resource'] = $resource;
            return view('resource.show', $data);
        }
        return redirect('resource');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        if($request->session()->exists('resources') && isset($request->session()->get('resources')[$id])) {
            $resource = $request->session()->get('resources')[$id];
            $data = [];
            $data['resource'] = $resource;
            return view('resource.edit', $data);
            //return view('resource.edit', ['resource' => $resource]);
        } else {
            return abort(404);
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idOriginal)
    {
        if($request->session()->exists('resources')) {
            $resources = $request->session()->get('resources');
            $id = $request->input('id');
            $id2 =$idOriginal;
            $name = $request->input('name');
            $age = $request->input('age');
            $class = $request->input('class');
            $hp= $request->input('hp');
            $atk = $request->input('atk');
            $def = $request->input('def');
            $mp = $request->input('mp');
            $stm = $request->input('stm');
            if(isset($resources[$idOriginal])) {
                if(isset($resources[$id]) ) {
                    return back()->withInput();
                }
                $resource['id'] = $idOriginal;
                $resource['name'] = $name;
                $resource['age'] = $age;
                $resource['class'] = $class ;
                $resource['hp'] = $hp;
               $resource['atk'] = $atk ;
                $resource['def'] = $def ;
                $resource['mp'] = $mp ;
               $resource['stm'] = $stm;
                $resources[$idOriginal] = $resource;
                $request->session()->put('resources', $resources);
                return redirect('resource')->with('message', 'Se ha editado el elemento correctamente.');
            }
        }
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id){
        $message = 'No se ha borrado el elemento correctamente.';
        $type = 'danger';
        if($request->session()->exists('resources')) {
            $resources = $request->session()->get('resources');
            if(isset($resources[$id])) {
                unset($resources[$id]);
                $request->session()->put('resources', $resources);
                $message = 'Se ha borrado el elemento correctamente.';
                $type = 'success';
            }
        }
        $data = [];
        $data['message'] = $message;
        $data['type'] = $type;
        return redirect('resource')->with($data);
       
    }
}
