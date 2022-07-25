<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sauvegardes de ') }}{{ $domaine->domaine }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center flex-wrap mb-4">
                <button onclick="location.href='/wordpress'" type="button" class="text-gray-700 bg-white hover:bg-gray-50 focus:outline-none font-bold rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">
                    <svg class="w-5 h-5 ml-0 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Retour aux Domaines
                </button>
                <div class="flex justify-end items-center flex-wrap mb-4">
                    <button type="button" id="btn-open-backup-modal" class="text-gray-700 bg-white hover:bg-gray-50 focus:outline-none font-bold rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">
                        Ajouter une Sauvegarde
                        <svg class="w-5 h-5 ml-2 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z"></path></svg>
                    </button>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white border-b border-gray-200">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        @if ($sauvegardes->count())
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Date
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center">
                                            Version
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center">
                                            État de santé
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center">
                                            Poids
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Commentaire
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center">
                                            Télécharger
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            <span class="sr-only">Modifier</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($sauvegardes as $sauvegarde)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row" class="px-6 py-4 font-bold text-gray-900 dark:text-white whitespace-nowrap">
                                            {{ $sauvegarde->updated_at->diffForHumans() }}
                                        </th>
                                        <td class="px-6 py-4 text-center">
                                            {{ $sauvegarde->version }}
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            @if ($sauvegarde->etat_sante == 'Bien')
                                            <span class="bg-green-100 text-green-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">Bien</span>
                                            @elseif($sauvegarde->etat_sante == 'Moyen')
                                                <span class="bg-yellow-100 text-yellow-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-200 dark:text-yellow-900">Moyen</span>
                                            @elseif($sauvegarde->etat_sante == 'Mauvais')
                                                <span class="bg-red-100 text-red-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-200 dark:text-red-900">Mauvais</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            {{ $sauvegarde->poids }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $sauvegarde->commentaire }}
                                        </td>
                                        <td class="px-6 py-4 flex justify-center items-center">
                                            <a href="{{ $sauvegarde->backup }}" target="_blank"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"></path></svg></a>
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <a href="/wordpress/{{ $domaine->slug }}/{{ $sauvegarde->slug }}/edit" class="font-medium text-gray-700 dark:text-blue-500 hover:underline">Modifier</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <p class="p-6">Aucune sauvegarde pour le moment</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="flex justify-between items-center flex-wrap mt-4">
                <span class="text-gray-700 bg-white font-bold rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">
                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    {{ $sauvegardes->count() }} Sauvegardes
                </span>
                <div class="flex justify-center items-center bg-white px-5 py-2.5 rounded-lg text-sm">
                    <span class="mr-4 text-gray-700">Serveur : <b>SyS-31</b></span>
                    <span class="mr-4 text-gray-700">Version de PHP : <b>7.4.33</b></span>
                    <a href="{{ $domaine->backoffice }}"
                       target="_blank"
                       class="inline-flex items-center border-l-2 font-bold pl-4 border-gray-200 text-gray-700">
                        Accès Admin
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <x-modal-create-backup :domaineSlug="$domaine->slug" :domaineId="$domaine->id" />
</x-app-layout>
