<div class="flex justify-center items-center h-screen">
    <div class="w-full max-w-lg">
        <form wire:submit.prevent="createUser" class="bg-gray shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h3>Rellenar los campos</h3></br>
            <!-- Resto del formulario... -->
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="grid-first-name">
                        Nombre
                    </label>
                    <input wire:model="name"
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        id="grid-first-name" type="text" placeholder="Escriba su nombre">
                    <p class="text-green-500 text-xs italic">Nombre de usuario.</p>
                </div>

                <div class="w-full md:w-1/2 px-3 mb-7 md:mb-0">

                    <label for="rol" class="form-label">Selecciona Rol:</label>
                    <select wire:model="rol_id" id="rol" name="rol" class="form-select p-2  border rounded"
                        required>
                        <option value="">Seleccion</option>
                        @foreach ($roles as $rol)
                            <option value="{{ $rol->id }}">{{ $rol->rol }}</option>
                        @endforeach

                    </select>
                    <p class="text-green-500 text-xs italic">Rol del usuario.</p>

                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="grid-last-name">
                        Email
                    </label>
                    <input wire:model="email"
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-last-name" type="email" placeholder="Escriba su Email">
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="document">
                        Documento
                    </label>
                    <input wire:model="document"
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="document" type="number" placeholder="Escriba su documento">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="grid-password">
                        Password
                    </label>
                    <input wire:model="password"
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="password" type="password" placeholder="***********">
                    <p class="text-gray-600 text-xs italic">Minimo de 8 carapteres</p>
                    <p class="text-green-500 text-xs italic">Dejar a todos los usuarios contraseña 199203.</p>
                </div>
            </div>

            <button class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                Crear
              </button>
        </br>
    </br>
</br>
<div class="max-w-md mx-auto bg-gray-200 shadow-md rounded-lg overflow-hidden">
    <div class="p-6">
        <button wire:click="listado"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 block"
                data-dismiss="modal">Listado usuarios
        </button>
    </div>
    <div class="p-6">
        <a href="#"
           class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 block">
            Modulo de tareas
        </a>
    </div>
    <div class="p-6">
        <a href="#"
           class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 block">
            Modulo de asignaciones
        </a>
    </div>
</div>

        
        </form>

    </div>
    <table>
   


        <!-- Modal de confirmación de eliminación -->
        @if ($modalAbierto)
            <div class="fixed z-10 inset-0 overflow-y-auto">
                <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                    </div>
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                    <div
                        class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <div
                                    class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                    <!-- Icono de advertencia -->

                                </div>
                                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900">Listado de usuarios</h3>
                                    <div class="mt-2">
                                        <ul class="">
                                            @foreach ($listadoUser as $user)
                                                <li>
                                                    <span class="font-semibold">Nombre:</span> {{ $user->name }}
                                                </li>

                                                <li>
                                                    <span class="font-semibold">Correo:</span> {{ $user->email }}
                                                </li>
                                                <li>
                                                    <span class="font-semibold">Documento:</span> {{ $user->document }}
                                                </li>

                                                <li>
                                                    <span class="font-semibold">Rol:</span>
                                                    @if ($user->rol_id == 1)
                                                        Administrador
                                                    @elseif ($user->rol_id == 2)
                                                        Usuario
                                                    @else
                                                        No tiene rol asignado
                                                    @endif
                                                </li>
                                                <button wire:click="modalUpdate({{ $user->id }})"
                                                    class="mt-3 w-full inline-flex justify-center rounded-md border 
                                    border-transparent shadow-sm px-4 py-2 bg-green-500 text-base font-medium text-white hover:bg-gray-600
                                     focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                                                    data-dismiss="modalUpdate">Modificar</button>
                                                <button wire:click="delete({{ $user->id }})"
                                                    class="mt-3 w-full inline-flex justify-center rounded-md border 
                                        border-transparent shadow-sm px-4 py-2 bg-red-500 text-base font-medium text-white hover:bg-gray-600
                                         focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                                                    data-dismiss="modal">Eliminar</button>
                                                </br></br>
                                            @endforeach
                                        </ul>

                                    </div>
                                </div>

                            </div>
                            <div class="mt-4">
                                {{ $listadoUser->links() }}
                            </div>
                        </div>
                        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                            @if (session()->has('message'))
                                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md"
                                    role="alert">
                                    {{ session('message') }}
                                </div>
                            @endif
                        </div>
                        
                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <button type="button"
                                class="mt-3 w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-500 text-base font-medium text-white hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                                data-dismiss="modal" wire:click="cerrarModal">
                                Salir
                            </button>

                        </div>
                    </div>
                </div>
            </div>
        @endif




        <!-- Modal de mensajes -->


        @if ($modalMensaje)
            <div class="fixed z-10 inset-0 overflow-y-auto">
                <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                    </div>
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                    <div
                        class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <div
                                    class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-green-100 sm:mx-0 sm:h-10 sm:w-10">
                                    <!-- Icono de éxito -->
                                    <svg class="h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900">Mensaje de éxito</h3>
                                    <div class="mt-2">
                                        <div>
                                            @if (session()->has('message'))
                                                <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3"
                                                    role="alert">
                                                    {{ session('message') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <button type="button"
                                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base 
                    font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm"
                                data-dismiss="modal" wire:click="closeModal">
                                Cerrar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if ($modalActualizar)
            <div class="fixed z-10 inset-0 overflow-y-auto">
                <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                    </div>
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                    <div
                        class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">

                        <form class="max-w-md mx-auto"
                        
                            wire:submit.prevent="modalUpdate({{ $usuarioSeleccionado->id }})"
                            enctype="multipart/form-data">
                            <p>formulario para actualizar informacion</p></br>
                            <div class="relative z-0 w-full mb-5 group">
                                <input wire:model="name" value="{{ $usuarioSeleccionado->name }}" type="text"
                                    name="floating_first_name" id="floating_first_name"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " required />
                                <label for="floating_first_name"
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">First
                                    name</label>
                            </div>
                            <div class="relative z-0 w-full mb-5 group">
                                <input wire:model="email" value="{{ $usuarioSeleccionado->email }}" type="email"
                                    name="floating_email" id="floating_email"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " required />
                                <label for="floating_email"
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email
                                    address</label>
                            </div>
                            <div class="relative z-0 w-full mb-5 group">
                                <input wire:model="document" value="{{ $usuarioSeleccionado->document }}" type="document"
                                    name="floating_email" id="floating_email"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " required />
                                <label for="floating_email"
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Documento
                                   </label>
                            </div>

                            <div class="relative z-0 w-full mb-5 group">
                                <input wire:model="password" value="{{ $usuarioSeleccionado->password }}"
                                    type="password" name="floating_password" id="floating_password"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " required />
                                <label for="floating_password"
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
                            </div>
                            <div class="relative z-0 w-full mb-5 group">
                                <input wire:model="password" value="{{ $usuarioSeleccionado->password }}" type="password" name="repeat_password" id="floating_repeat_password"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " required />
                                <label for="floating_repeat_password"
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Confirm
                                    password</label>
                            </div>
                            <label for="underline_select" class="sr-only">Underline select</label>
                            <select wire:model="rol_id" id="underline_select"
                                class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer" >
                                <option selected >Selecione rol</option>
                                @foreach ($roles as $rol)
                            <option value="{{ $rol->id }}">{{ $rol->rol }}</option>
                        @endforeach
                            </select>
                        </br>
                    </br>




                            <button  wire:click="update({{$usuarioSeleccionado->id}})" type="submit" 
                                class="text-white bg-green-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium 
                                rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Actualizar</button>
                            <button type="button"
                                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base 
                font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm"
                                data-dismiss="modal" wire:click="closeModalUpdate">
                                Salir
                            </button>
                        </form>
                        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                            @if (session()->has('message'))
                                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md"
                                    role="alert">
                                    {{ session('message') }}
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        @endif



        @if ($modalCrear)
        <div class="fixed z-10 inset-0 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen px-4">
                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>
                <div class="relative bg-white rounded-lg p-8 max-w-md w-full">
                    <div class="flex justify-between items-center pb-3">
                        <h5 class="text-lg font-semibold">Mensaje exitoso</h5>
                        <button type="button" class="text-gray-700 hover:text-gray-900" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="text-gray-700">
                        <p>Usuario creado exitosamente.</p>
                    </div>
                    <div class="mt-4 flex justify-end">
                        <button wire:click="cerrarModalCrear" type="button" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded" data-dismiss="modal">
                            Cerrar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif    



</div>
