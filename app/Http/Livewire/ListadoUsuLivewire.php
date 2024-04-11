<?php

namespace App\Http\Livewire;

use App\Models\Roles;
use App\Models\User;
use Livewire\Component;

class ListadoUsuLivewire extends Component

{
    public $search = '';
    public $results = [];
    public $showlist = false;
    public $usuario ='';
    public $modalAbierto = false;
    public $usuarioId;
    public $modalMensajeUsuario = false;
  

    //funcion  para buscar usuarios
    public function searchProduct()
    {
        if ($this->search == true) {
            $this->results = User::where('name', 'like', '%' . $this->search . '%')->take(5)->get();
            $this->showlist = true;
        } else {
            $this->showlist = false;
        }
    }

    public function getProduct($id)
    {
    
        $this->usuario = User::find($id);
        $this->showlist = false;
    }


    public function resetBusqueda()
    {
        $this->reset([
            'search',
            'results',
            'showlist' => false, // Establecer showlist en false cuando se borra la búsqueda
        ]);
    }

     //funciones para el modal de eliminacion


     public function eliminarUsuario($id)
     {
         // Buscar el usuario por su ID
         $usuario = User::findOrFail($id);
 
         // Eliminar el usuario de la base de datos
         $usuario->delete();
 
         $this->cerrarModal();
 
         // Mensaje de éxito
 
         session()->flash('message', 'Usuario eliminado exitosamente.');
         $this->reset();
         //modal de  mensaje
         $this->modalMensajeUsuario = true;
     }
 
     public function abrirModal($id)
     {
         $this->usuarioId = User::findOrFail($id);
         $this->modalAbierto = true;
     }
 
     public function cerrarModal()
     {
         $this->modalAbierto = false;
     }

     public function cerrarModalMensaje()
     {
         $this->modalMensajeUsuario = false;
     }
 
 






    public function render()
    {
        $roles = Roles::all();
        return view('livewire.listado-usu-livewire',compact('roles'));
    }
}
