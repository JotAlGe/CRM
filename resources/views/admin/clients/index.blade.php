<x-app-layout>
    <!-- component -->
    <script defer src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>
    
    
    <section class="antialiased bg-gray-700 text-gray-600 h-screen px-4" x-data="app">
    <div class="flex flex-col justify-center h-full">
        <!-- Table -->
        <div class="w-11/12 mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
            <header class="px-5 py-4 border-b border-gray-100 flex justify-between">
                <div class="font-semibold text-gray-800">Clientes</div>
                <a 
                    href="{{ route('admin.clients.create') }}"
                    class="text-purple-500 border rounded p-2 hover:text-purple-400">
                    <i class="fas fa-user"></i>
                    Crear Cliente
                </a>
            </header>

            {{-- success message --}}
            @include('layouts.partials.success')

            <div class="overflow-x-auto p-3">
                <table class="table-auto w-full">
                    <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                        <tr>
                            <th class="p-2">
                                <div class="font-semibold text-left">
                                    Nombre 
                                </div>
                            </th>
                            <th class="p-2">
                                <div class="font-semibold text-left">
                                    Email
                                </div>
                            </th>
                            <th class="p-2">
                                <div class="font-semibold text-left">
                                    Teléfono
                                </div>
                            </th>
                            <th class="p-2">
                                <div class="font-semibold text-center">
                                    Compañía
                                </div>
                            </th>
                            <th class="p-2">
                                <div class="font-semibold text-center">
                                    Dirección de la Compañía
                                </div>
                            </th>
                            <th class="p-2">
                                <div class="font-semibold text-center">
                                    Teléfono de la compañía
                                </div>
                            </th>
                            <th class="p-2">
                                <div class="font-semibold text-center">
                                    Acciones
                                </div>
                            </th>
                        </tr>
                    </thead>

                    <tbody class="text-sm divide-y divide-gray-100">
                        @foreach ($clients as $client)
                           <tr>
                                <td class="p-2">
                                    <div class="font-medium text-gray-800">
                                        {{ $client->contact_name }}
                                    </div>
                                </td>
                                <td class="p-2">
                                    <div class="font-medium text-gray-800">
                                        {{ $client->contact_email }}
                                    </div>
                                </td>
                                <td class="p-2">
                                    <div class="text-left">
                                        {{ $client->contact_phone_number }}
                                    </div>
                                </td>
                                <td class="p-2">
                                    <div class="text-left">
                                        {{ $client->company_name }}
                                    </div>
                                </td>
                                <td class="p-2">
                                    <div class="text-left">
                                        {{ $client->company_address }}
                                    </div>
                                </td>
                                <td class="p-2">
                                    <div class="text-left">
                                        {{ $client->company_phone_number }}
                                    </div>
                                </td>

                                {{-- actions buttons --}}
                                <td class="p-2">
                                    <div class="flex justify-center">
                                        <a href="{{ route('admin.clients.edit', $client->id) }}">
                                            <svg
                                            class="w-8 h-8 hover:text-blue-600 rounded-full hover:bg-gray-100 p-1"
                                                 viewBox="0 0 640 512">
                                                <path d="M223.1 256c70.7 0 128-57.31 128-128s-57.3-128-128-128C153.3 0 96 57.31 96 128S153.3 256 223.1 256zM274.7 304H173.3C77.61 304 0 381.7 0 477.4C0 496.5 15.52 512 34.66 512h286.4c-1.246-5.531-1.43-11.31-.2832-17.04l14.28-71.41c1.943-9.723 6.676-18.56 13.68-25.56l45.72-45.72C363.3 322.4 321.2 304 274.7 304zM371.4 420.6c-2.514 2.512-4.227 5.715-4.924 9.203l-14.28 71.41c-1.258 6.289 4.293 11.84 10.59 10.59l71.42-14.29c3.482-.6992 6.682-2.406 9.195-4.922l125.3-125.3l-72.01-72.01L371.4 420.6zM629.5 255.7l-21.1-21.11c-14.06-14.06-36.85-14.06-50.91 0l-38.13 38.14l72.01 72.01l38.13-38.13C643.5 292.5 643.5 269.7 629.5 255.7z"/>
                                            </svg>
                                        </a>

                                        {{-- delete --}}
                                        <form action="{{ route('admin.clients.destroy', $client->id) }}"
                                            method="POST"
                                            onsubmit="
                                            return confirm('¿Eliminar a {{ $client->contact_name }}?')
                                            "
                                            >
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">
                                                <svg class="w-8 h-8 hover:text-red-600 rounded-full hover:bg-gray-100 p-1"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                    </path>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                            

                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener("alpine:init", () => {
        Alpine.data("app", () => ({
            total: 0,
            selected: [],

            toggleCheckbox(element, amount) {
                if (element.checked) {
                    this.selected.push(element.value);
                    this.total += amount;
                } else {
                    const index = this.selected.indexOf(element.value);

                    if (index > -1) this.selected.splice(index, 1);

                    this.total -= amount;
                }
            },
        }));
    });
</script>
</x-app-layout>
   