<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Criatura;
use App\Models\Habitat;
use Storage;
use Image;
use App\Repositories\Contracts\CriaturaRepository;

class CriaturasController extends Controller{
	
	/** @var CriaturaRepository */
    protected $repo;
	
	/**
     * inyectamos el repo registrado
     */
    public function __construct(CriaturaRepository $repo)
    {
        $this->repo = $repo;
    }
	
	
	public function index(){
		return view ('cpanel.index');
	}
	
	
	//PASADO AL REPO
	//traigo todas las criaturas
	public function listar(){
		//$criaturas = Criatura::with('habitat')->get();
		//Traigo las criaturas a través del repo
		$criaturas = $this->repo->withAllRelationships();
		
		//1er param: vista 
		//$criatura: variable que llamo en la vista
		return view ('cpanel.listado', [
			'criaturas' => $criaturas
		]);
	}
	
	
	//PASADO AL REPO
	//traigo todas las criaturas pero para la vista pública
	public function listarPublic(){
		//$criaturas = Criatura::with('habitat')->get();
		//Traigo las criaturas a través del repo
		$criaturas = $this->repo->withAllRelationships();
		return view ('public.criaturas', [
			'criaturas' => $criaturas
		]);
	}
		
	
	//PASADO AL REPO
	public function detalles($id)
	{
		//traigo la criatura con el metodo find por su id
		//$criatura = Criatura::find($id);
		$criatura = $this->repo->find($id);
		
		//llamo a la nueva vista
		return view ('cpanel.detalles', [
			'criatura' => $criatura
		]);		
	}
	
	
	//PASADO AL REPO
	public function detallesPublic($id)
	{
		//traigo la criatura con el metodo find por su id
		//$criatura = Criatura::find($id);
		$criatura = $this->repo->find($id);
		
		//llamo a la nueva vista
		return view ('public.detalles', [
			'criatura' => $criatura
		]);		
	}
	
	
	public function mostrarFormAlta()
	{
		$habitats = Habitat::all();	
		return view ('cpanel.formAlta', [
			'habitats' => $habitats
		]);	
	}
	
	
	//PASADO AL REPO
	public function cargar(Request $request){
		$inputData = $request->all();
		
		//Validación
		$request->validate(Criatura::$rules,[
			'nombre_criatura.required' => 'Debe poner el nombre de la criatura rescatada',
			'nombre_criatura.min' => 'Debe poner al menos 5 caracteres',
			'nombre_criatura.max' => 'Se excedió en la cantidad de caracteres. Máximo 100',
			'apariencia.required' => 'Debe especificar la apariencia',
			'apariencia.min' => 'Debe poner al menos 5 caracteres',
			'imagen.image' => 'Debe ser una imagen'
		]);
		
		
		//con hasfile verifico si está la imagen
		if($request->hasfile('imagen')){
			//SIN INTERVENTION
			/*$rutaimagen = $request->file('imagen')->store('imagenes');*/
			//imagenes es la carpeta que se crea en storage
			//$inputData['imagen'] = $rutaimagen;
			
			//CON INTERVENTION
			//creo la imagen
			$img = Image::make($request->file('imagen'));
			//redimensiono la imagen con intervention
			$img->fit(600, 600);
			
			//genero nombre para la imagen
			$filepath = $request->file('imagen')->hashName('imagenes');
			Storage::put( $filepath, (string) $img->encode());	
			
			$inputData['imagen'] = $filepath;
		}

		//Criatura::create($inputData);
		$this->repo->create($inputData);		
			
		//Redirecciono
		return redirect(url('cpanel/listado'))->with('status', 'La criatura se cargó correctamente');
	}
	

	public function mostrarFormEditar($id){
		//traigo la criatura con el metodo find por su id
		//$criaturas = Criatura::find($id);
		$criaturas = $this->repo->find($id);
		
		
		//traigo los habitats
		$habitats = Habitat::all();
		//dd($habitats);
		
		return view ('cpanel.formEditar',
            compact('habitats', 'criaturas')
		);
	}
	
	
	//PASADO AL REPO
	public function editar(Request $request, $id){
		//Validación
		$request->validate(Criatura::$rules,[
			'nombre_criatura.required' => 'Debe poner el nombre de la criatura rescatada',
			'nombre_criatura.min' => 'Debe poner al menos 5 caracteres',
			'nombre_criatura.max' => 'Se excedió en la cantidad de caracteres. Máximo 100',
			'apariencia.required' => 'Debe especificar la apariencia',
			'apariencia.min' => 'Debe poner al menos 5 caracteres',
			'imagen.image' => 'Debe ser una imagen'		
		]);
				
		$inputData = $request->input();
		//$criatura = Criatura::find($id);
		$criatura = $this->repo->find($id);
		
		
		if($request->hasfile('imagen')){
			//guardo la imagen actual
			$imagenActual = $criatura->imagen;
			
			$rutaimagen = $request->file('imagen')->store('imagenes');
			//imagenes es la carpeta que se crea en storage
			$inputData['imagen'] = $rutaimagen;		
		}
		
		//$criatura->update($inputData);
		$this->repo->update($id, $inputData);
		
		//borro la imagen anterior
		if(isset($imagenActual) && !empty($imagenActual)) {
            Storage::delete($imagenActual);
        }
		
		//Redirecciono
		return redirect(url('cpanel/listado'))->with('status', 'La criatura se actualizó correctamente');
	}
	
	//PASADO AL REPO
	public function confirmarEliminar($id)
    {
        //$criatura = Criatura::find($id);
		$criatura = $this->repo->find($id);
        return view('cpanel.confirmarEliminar', compact('criatura'));
    }
		
		
	//PASADO AL REPO
	public function eliminar($id)
    {
        //$criatura = Criatura::find($id);
		$criatura = $this->repo->find($id);
		
        //borro la imagen
		if($criatura->imagen) {
            Storage::delete($criatura->imagen);
        }
		
		//$criatura->delete();
		$this->repo->delete($id);
		
        //return view ('cpanel.index');
		return redirect(url('cpanel/listado'))->with('status', 'La criatura se eliminó correctamente');
    }	
}