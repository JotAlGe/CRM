<x-app-layout>
    <!-- component -->
    <script defer src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>
    
    
    <section class="antialiased bg-gray-700 text-gray-600 h-screen px-4" x-data="app">
    <div class="flex flex-col justify-center h-full">
        <!-- form -->
        <div class="w-full max-w-2xl mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
            <header class="px-5 py-4 border-b border-gray-100 flex justify-between">
                <div class="font-semibold text-gray-800">Editar Cliente</div>
                <a 
                    href="{{ route('admin.clients.create') }}"
                    class="text-purple-500 border rounded p-2 hover:text-purple-400">
                    <i class="fas fa-user"></i>
                    Editar Cliente
                </a>
                
            </header>

                


            <div class="overflow-x-auto p-3">
                <div class="w-full max-w-xs">
                    <form
                        action="{{ route('admin.clients.update', $client->id) }}"
                        method="post"
                        class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                        @csrf
                        @method('PATCH')
                        <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                            Nombre:
                        </label>
                        <input 
                        name="contact_name"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight 
                        {{ $errors->has('contact_name') ? 'border-red-500' : '' }}
                        focus:outline-none focus:shadow-outline" 
                        id="username"
                        type="text"
                        placeholder="Nombre"
                        value="{{ old('contact_name', $client->contact_name) }}"
                        >
                            @error('contact_name')
                                <p class="text-red-500 text-xs italic">
                                    {{$errors->first('contact_name')}}
                                </p>
                            @enderror
                        </div>

                         <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                            Email:
                        </label>
                        <input 
                        name="contact_email"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight 
                        {{ $errors->has('contact_email') ? 'border-red-500' : '' }}
                        focus:outline-none focus:shadow-outline" 
                        id="email"
                        type="email"
                        placeholder="email"
                        value="{{ old('contact_email', $client->contact_email) }}"
                        >
                            @error('contact_email')
                                <p class="text-red-500 text-xs italic">
                                    {{$errors->first('contact_email')}}
                                </p>
                            @enderror
                        </div>
                            

                        <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                            Tel??fono:
                        </label>
                        
                        <input
                        name="contact_phone_number"
                        class="shadow appearance-none border 
                         {{ $errors->has('contact_phone_number') ? 'border-red-500' : '' }}
                          rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" 
                         id="password"
                         type="tel"
                         value="{{ old('contact_phone_number', $client->contact_phone_number) }}"
                         placeholder="Tel??fono...">
                        @if ($errors->has('contact_phone_number'))
                            <p class="text-red-500 text-xs italic">
                                {{$errors->first('contact_phone_number')}}
                            </p>
                        @endif
                        </div>

                        <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                            Nombre de la compa????a:
                        </label>
                        
                        <input
                        name="company_name"
                        class="shadow appearance-none border 
                        {{ $errors->has('company_name') ? 'border-red-500' : '' }}
                         rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password"
                         type="text"
                         value="{{ old('company_name', $client->company_name) }}"
                         placeholder="Nombre de la compa????a...">

                            @if ($errors->has('company_name'))
                                <p class="text-red-500 text-xs italic">
                                    {{$errors->first('company_name')}}
                                </p>
                            @endif
                        </div>
                        <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                            Direcci??n de la compa????a:
                        </label>
                        
                        <input
                        name="company_address"
                        class="shadow appearance-none border 
                        {{ $errors->has('company_address') ? 'border-red-500' : '' }}
                         rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="text"
                         value="{{ old('company_address', $client->company_address) }}"
                         placeholder="Direcci??n de la compa????a...">

                            @if ($errors->has('company_address'))
                                <p class="text-red-500 text-xs italic">
                                    {{$errors->first('company_address')}}
                                </p>
                            @endif
                        </div>
                        

                        <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                            Tel??fono de la compa????a:
                        </label>
                        
                        <input
                        name="company_phone_number"
                        class="shadow appearance-none border 
                        {{ $errors->has('company_phone_number') ? 'border-red-500' : '' }}
                         rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="tel"
                         value="{{ old('company_phone_number', $client->company_phone_number) }}"
                         placeholder="Tel??fono de la compa????a...">

                            @if ($errors->has('company_phone_number'))
                                <p class="text-red-500 text-xs italic">
                                    {{$errors->first('company_phone_number')}}
                                </p>
                            @endif
                        </div>

                        {{-- buttons --}}
                        <div class="flex items-center                               justify-between">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                            Actualizar
                        </button>
                        <a 
                            href="{{ route('admin.clients.index') }}"
                            class="text-red-500 border rounded p-2 hover:text-red-400">
                            Cancelar
                        </a>
                        </div>
                    </form>
                    </div>
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
   