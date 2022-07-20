<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Édition de ') }} {{ $domaine->domaine }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white border-b border-gray-200">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <form class="p-6" method="POST" action="/wordpress/{{ $domaine->slug }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div>
                                <x-label for="domaine" :value="__('Nom de Domaine')" />
                                <x-input id="domaine" class="block mt-1 w-full lowercase" type="text" name="domaine" :value="old('Domaine', $domaine->domaine)" required autofocus />
                            </div>
                            <div>
                                <x-label for="type_site" :value="__('Technologie')" />
                                <x-select id="type_site" name="type_site" class="block mt-1 w-full" required>
                                    <option selected value="{{ old('type_site', $domaine->type_site) }}">{{ old('type_site', $domaine->type_site) }}</option>
                                    <option value="WordPress">WordPress</option>
                                </x-select>
                            </div>
                            <div>
                                <x-label for="serveur" :value="__('Serveur')" />
                                <x-select id="serveur" name="serveur" class="block mt-1 w-full" required>
                                    <option selected value="{{ old('serveur', $domaine->serveur) }}"> {{ old('serveur', $domaine->serveur) }}</option>
                                    <option value="SyS-20">SyS-20</option>
                                    <option value="SyS-31">SyS-31</option>
                                    <option value="SyS-32">SyS-32</option>
                                    <option value="SyS-36">SyS-36</option>
                                    <option value="SyS-39">SyS-39</option>
                                    <option value="SyS-52">SyS-52</option>
                                    <option value="SyS-54">SyS-54</option>
                                    <option value="Client">Client</option>
                                    <option value="Dédié">Dédié</option>
                                </x-select>
                            </div>
                            <div>
                                <x-label for="php_version" :value="__('Version de PHP')" />
                                <x-input id="php_version" class="block mt-1 w-full" type="text" name="php_version" :value="old('php_version', $domaine->php_version)" required />
                            </div>
                            <div>
                                <x-label for="backoffice" :value="__('BackOffice')" />
                                <x-input id="backoffice" class="block mt-1 w-full" type="url" name="backoffice" :value="old('backoffice', $domaine->backoffice)" required />
                            </div>
                            <div class="flex justify-end mt-4">
                                <x-button>
                                    {{ __('Mettre à Jour') }}
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
