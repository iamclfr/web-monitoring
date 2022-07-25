<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Édition d\'une sauvegarde de ') }} {{ $domaine->domaine }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center flex-wrap mb-4">
                <button onclick="location.href='/wordpress/{{ $domaine->slug }}'" type="button" class="text-gray-700 bg-white hover:bg-gray-50 focus:outline-none font-bold rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">
                    <svg class="w-5 h-5 ml-0 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Retour aux Sauvegardes
                </button>
                <form method="POST" action="/wordpress/{{ $domaine->slug }}/{{ $sauvegarde->slug }}">
                    @csrf
                    @method('DELETE')

                    <button id="delete-button" type="submit" class="text-white bg-red-600 hover:bg-red-500 focus:outline-none font-bold rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">
                        <svg class="w-5 h-5 ml-0 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        {{ __('Supprimer la Sauvegarde') }}
                    </button>
                </form>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white border-b border-gray-200">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <form class="p-6" method="POST" action="/wordpress/{{ $domaine->slug }}/{{ $sauvegarde->slug }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div>
                                <x-label for="version" :value="__('Version')" />
                                <x-input id="version" class="block mt-1 w-full lowercase" type="text" name="version" :value="old('version', $sauvegarde->version)" required autofocus />
                            </div>
                            <div>
                                <x-label for="poids" :value="__('Poids')" />
                                <x-input id="poids" class="block mt-1 w-full" type="text" name="poids" :value="old('poids', $sauvegarde->poids)" required autofocus />
                            </div>
                            <div>
                                <x-label for="etat_sante" :value="__('Ètat de Santé')" />
                                <x-select id="etat_sante" name="etat_sante" class="block mt-1 w-full" required>
                                    <option selected value="{{ old('etat_sante', $sauvegarde->etat_sante) }}">{{ old('etat_sante', $sauvegarde->etat_sante) }}</option>
                                    <option value="Bien">Bien</option>
                                    <option value="Moyen">Moyen</option>
                                    <option value="Mauvais">Mauvais</option>
                                </x-select>
                            </div>
                            <div>
                                <x-label for="backup" :value="__('Lien vers la Sauvegarde (Google Drive, DropBox ...)')" />
                                <x-input id="backup" class="block mt-1 w-full" type="text" name="backup" :value="old('backup', $sauvegarde->backup)" required />
                            </div>
                            <div>
                                <x-label for="commentaire" :value="__('Commentaire')" />
                                <textarea name="commentaire" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="commentaire" cols="100%" rows="5">{{ old('commentaire', $sauvegarde->commentaire) }}</textarea>
                            </div>
                            <div class="flex justify-end mt-4">
                                <x-button>
                                    {{ __('Mettre à Jour') }}
                                </x-button>
                            </div>
                            <!-- Session Status -->
                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
