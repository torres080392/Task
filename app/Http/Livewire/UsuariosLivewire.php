<?php

namespace App\Http\Livewire;

use App\Models\Roles;
use App\Models\User;
use GuzzleHttp\Psr7\Message;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\WithPagination;
use Illuminate\Support\Collection;

class UsuariosLivewire extends Component
{
    use WithPagination;
    public $rol_id = '';
    public $name = '';
    public $email = '';
    public $password;
    private $listadoUser = [];
    public $usuarios;
    public $modalMensaje = false;
    public $modalActualizar = false;
    public $usuarioSeleccionado;
    public $document='';
    public $modalCrear= false;


    public $modalAbierto = false;

    //funcion para listar los usuarios dentro de el modal
    public function listado()
    {
        $this->modalAbierto = true;
     

    }

    //cerramos modla de listado

    public function cerrarModal()
    {
        $this->modalAbierto = false;
      
    }



    //eliminamos un usuario
    public function delete($id)
    {
        User::destroy($id);
        $this->modalMensaje = true;
        session()->flash('message', 'Usuario eliminado exitosamente.');
    }

    public function closeModal()
    {
        $this->modalMensaje = false;
       
    }

    //Abrimos el modal con el formulario para actualizar los datos
    public function modalUpdate($id)
    {
        $this->modalActualizar = true;
        $this->usuarioSeleccionado = User::findOrFail($id);
        $this->name = $this->usuarioSeleccionado->name;
        $this->email = $this->usuarioSeleccionado->email;
        $this->document = $this->usuarioSeleccionado->document;
        $this->password = $this->usuarioSeleccionado->password;
       
    }
    //Cerrar el modal con el formulario de actualizar
    public function closeModalUpdate()
    {
        $this->modalActualizar = false;
        
    }

    //Realizar la actualizacion
    public function update($id)
    {
        // Obtener el equipo que se está actualizando
        $usuario = User::findOrFail($id);

        // Actualizar los campos del equipo basado en los datos del formulario
        $usuario->name = $this->name;
        $usuario->email = $this->email;
        $usuario->document = $this->document;
        $usuario->password = Hash::make($this->password);
        $usuario->rol_id = $this->rol_id;
        // Guardar los cambios en la base de datos
        $usuario->save();
        $this->reset();
        $this->modalActualizar = false;
        // Mostrar un mensaje de éxito
        session()->flash('message', 'Usuario actualizado exitosamente.');
    }

    public function cerrarModalCrear()
    {

        $this->modalCrear=false;
    }



//Funcion para crear usuarios
    public function createUser()
    {
        User::create([
            'rol_id' => $this->rol_id,
            'name' => $this->name,
            'email' => $this->email,
            'document' => $this->document,
            'password' => Hash::make($this->password),
        ]);
        // Limpiar los campos después de guardar
        $this->reset();
        //modal de mensaje
        session()->flash('message', 'Usuario creado exitoxamente.');
        $this->modalCrear=true;
    }
    




    public function render()
    {
        $listadoUser = User::paginate(5);
        $roles = Roles::all();
        return view('livewire.usuarios-livewire', compact('roles', 'listadoUser'));
    }
}
