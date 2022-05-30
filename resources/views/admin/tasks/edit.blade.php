<x-app-layout>
    <!-- component -->
    <script defer src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>
    
    
    <section class="antialiased bg-gray-700 text-gray-600 h-screen px-4" x-data="app">
    <div class="flex flex-col justify-center h-full">
        <!-- form -->
        <div class="w-full max-w-2xl mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
            <header class="px-5 py-4 border-b border-gray-100 flex justify-between">
                <div class="font-semibold text-gray-800">Editar Tarea</div>
                <a 
                    href="{{ route('admin.tasks.create') }}"
                    class="text-purple-500 border rounded p-2 hover:text-purple-400">
                    <i class="fas fa-user"></i>
                    Crear Tarea
                </a>
                
            </header>

                


            <div class="overflow-x-auto p-3">
                <div class="w-full max-w-xs">
                    <form
                        action="{{ route('admin.tasks.update', $task->id) }}"
                        method="post"
                        class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                        @csrf
                        @method('PATCH')
                        <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                            Nombre:
                        </label>
                        <input 
                        name="name"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight 
                        {{ $errors->has('name') ? 'border-red-500' : '' }}
                        focus:outline-none focus:shadow-outline" 
                        id="username"
                        type="text"
                        placeholder="Escriba el nombre..."
                        value="{{ old('name', $task->name) }}"
                        >
                            @error('name')
                                <p class="text-red-500 text-xs italic">
                                    {{$errors->first('name')}}
                                </p>
                            @enderror
                        </div>

                         <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2"
                        for="username">
                            Descripción:
                        </label>
                        <textarea 
                        placeholder="Escriba una descripción..."
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight 
                        {{ $errors->has('description') ? 'border-red-500' : '' }}
                        focus:outline-none focus:shadow-outline" 
                        name="description">{{ old('description', $task->description)}}</textarea>
                            @error('description')
                                <p class="text-red-500 text-xs italic">
                                    {{$errors->first('description')}}
                                </p>
                            @enderror
                        </div>
                            

                        <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                            Plazo:
                        </label>
                        
                        <input
                        name="deadline"
                         class="shadow appearance-none border 
                         {{ $errors->has('deadline') ? 'border-red-500' : '' }}
                          rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                           id="password"
                           type="date"
                           placeholder="Plazo..."
                           value="{{ old('deadline', $task->deadline) }}"
                           >
                        @if ($errors->has('deadline'))
                            <p class="text-red-500 text-xs italic">
                                {{$errors->first('deadline')}}
                            </p>
                        @endif
                        </div>

                        <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                            Estado:
                        </label>
                        
                        <input
                        name="task_status"
                        class="shadow appearance-none border 
                        {{ $errors->has('task_status') ? 'border-red-500' : '' }}
                         rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" 
                         type="text"
                         value="{{ old('task_status', $task->task_status) }}"
                         placeholder="Estado...">

                            @if ($errors->has('task_status'))
                                <p class="text-red-500 text-xs italic">
                                    {{$errors->first('task_status')}}
                                </p>
                            @endif
                        </div>
                        <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                            Seleccionar Usuario:
                        </label>
                         <select name="user_id"
                                 class="shadow appearance-none border 
                        {{ $errors->has('user_id') ? 'border-red-500' : '' }}
                         rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">
                             @foreach ($users as $user)
                                <option value="{{ $user->id }}"
                                    {{ old('user_id') == $user->id ?? 'selected'}}
                                    >
                                    {{ $user->name }}    
                                </option>
                             @endforeach
                         </select>
                            @if ($errors->has('user_id'))
                                <p class="text-red-500 text-xs italic">
                                    {{$errors->first('user_id')}}
                                </p>
                            @endif
                        </div>
                        

                        <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                            Seleccionar Cliente:
                        </label>
                        <select name="client_id" 
                                class="shadow appearance-none border 
                            {{ $errors->has('client_id') ? 'border-red-500' : '' }}
                            rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">

                            @foreach ($clients as $client)
                                <option value="{{ $client->id }}"
                                    {{ old('client_id') == $client->id ?? 'selected'}}
                                    >
                                    {{ $client->contact_name }}
                                </option>
                            @endforeach
                        </select>

                            @if ($errors->has('client_id'))
                                <p class="text-red-500 text-xs italic">
                                    {{$errors->first('client_id')}}
                                </p>
                            @endif
                        </div>

                        <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                            Seleccionar Proyecto:
                        </label>
                        <select name="project_id" 
                                class="shadow appearance-none border 
                            {{ $errors->has('project_id') ? 'border-red-500' : '' }}
                            rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">

                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}"
                                    {{ old('project_id') == $project->id ?? 'selected'}}
                                    >
                                    {{ $project->name }}
                                </option>
                            @endforeach
                        </select>

                            @if ($errors->has('project_id'))
                                <p class="text-red-500 text-xs italic">
                                    {{$errors->first('project_id')}}
                                </p>
                            @endif
                        </div>

                        {{-- buttons --}}
                        <div class="flex items-center                               justify-between">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                            Actualizar
                        </button>
                        <a 
                            href="{{ route('admin.tasks.index') }}"
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
   