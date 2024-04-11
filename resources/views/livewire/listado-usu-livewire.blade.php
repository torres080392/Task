<div class="container mx-auto p-8">

    <form class="flex items-center max-w-lg mx-auto">
        <label for="voice-search" class="sr-only">Search</label>
        <div class="relative w-full">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">

            </div>
            <input wire:model="search" wire:keyup="searchProduct" type="text" type="text" id="voice-search"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Escriba el nombre del usuario.." required />
            <p class="text-green-500 text-xs italic">Escriba en el cuadro el numbre de usuario que esta buscando.</p>
        </div>


    </form>


    @if ($showlist)
    <div class="overflow-x-auto shadow-md sm:rounded-lg mx-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Usuario
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Rol
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($results))
                    @forelse ($results as $result)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $result->id }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $result->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $result->email }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $result->rol_id ? $result->roles->rol : 'N/A' }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button wire:click="abrirModal({{ $result->id }})"
                                    class="px-4 py-2 bg-gray-500 text-gray-100 rounded-md shadow-md hover:bg-red-700">Eliminar</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center">
                                No hay registros que coincidan con esa búsqueda
                            </td>
                        </tr>
                    @endforelse
                @else
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center">
                            No hay registros
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endif



    <!-- Modal de confirmación de eliminación -->
    @if ($modalAbierto)
        <div class="fixed inset-0 z-10 overflow-y-auto bg-gray-900 bg-opacity-50">
            <div class="flex items-center justify-center min-h-screen px-4 py-6">
                <div class="relative bg-white w-full max-w-lg rounded-lg shadow-lg">
                    <div class="modal-header">
                        <h5 class="text-lg font-bold text-gray-800 py-4 px-6">Confirmar Eliminación</h5>
                    </div>
                    <div class="modal-body px-6 py-4">
                        <p class="text-sm text-gray-700">¿Estás seguro de que deseas eliminar el usuario?</p>
                    </div>
                    <div class="modal-footer flex justify-end items-center py-4 px-6 bg-gray-100">
                        <button type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                            wire:click="cerrarModal">Cancelar
                        </button>
                        <button type="button"
                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center"
                            wire:click="eliminarUsuario({{ $usuarioId->id }})">Eliminar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Modal de mensajes -->

    @if ($modalMensajeUsuario)
        <div class="fixed inset-0 z-10 overflow-y-auto bg-gray-900 bg-opacity-50">
            <div class="flex items-center justify-center min-h-screen px-4 py-6">
                <div class="relative bg-white w-full max-w-lg rounded-lg shadow-lg">
                    <div class="modal-header">
                        <h5 class="text-lg font-bold text-gray-800 py-4 px-6">Mensaje de éxito</h5>
                    </div>
                    <div class="modal-body px-6 py-4">
                        <div>
                            @if (session()->has('message'))
                                <div class="alert alert-warning" role="alert">
                                    {{ session('message') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer flex justify-end items-center py-4 px-6 bg-gray-100">
                        <button type="button" class="btn btn-primary" data-dismiss="modal"
                            wire:click="cerrarModalMensaje">Cerrar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif




</div>
