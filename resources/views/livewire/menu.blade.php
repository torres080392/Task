<!-- Tailwind CSS CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">

<nav class="bg-indigo-700 shadow-lg">
  <div class="container mx-auto">
    <div class="sm:flex justify-between items-center">
      <!-- Logo -->
      <a href="{{Route('dashboard')}}" class="text-white text-3xl font-bold p-3">Milti Task</a>
      
      <!-- Botón de hamburguesa para dispositivos móviles -->
      <button class="text-white block sm:hidden p-3">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/>
        </svg>
      </button>

      <!-- Menú de navegación -->
      <ul class="hidden sm:flex sm:justify-around text-gray-400 sm:self-center text-xl border-t sm:border-none">
        <li class="sm:inline-block">
          <a href="{{Route('dashboard')}}" class="p-3 hover:text-white">INICIO</a>
        </li>
        <li class="sm:inline-block">
          <a href="#" class="p-3 hover:text-white">TAREAS</a>
        </li>
        <li class="sm:inline-block">
          <a href="#" class="p-3 hover:text-white">PROXIMAS</a>
        </li>
        <li class="sm:inline-block">
          <a href="#" class="p-3 hover:text-white">ASIGNACIONES</a>
        </li>
        <li class="sm:inline-block">
          <a href="#" class="p-3 hover:text-white">CONTACTO</a>
        </li>
        <li class="sm:inline-block">
          <a href="#" class="p-3 hover:text-white">USER::{{ Auth::user()->name }}</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Script para mostrar/ocultar el menú en dispositivos móviles -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const btn = document.querySelector('button');
    const menu = document.querySelector('ul');

    btn.addEventListener('click', function () {
      menu.classList.toggle('hidden');
    });
  });
</script>
