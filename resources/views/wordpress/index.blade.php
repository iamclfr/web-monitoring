<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('WordPress') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center flex-wrap mb-4">
                <div>
                    <label for="domain-search" class="sr-only">Search</label>
                    <div class="relative mt-1">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                        </div>
                        <input type="text" id="domain-search" @if ($domaines->count() <= 1) disabled @endif class="pl-10 py-2.5 text-sm rounded-lg shadow-sm border-0 bg-white hover:bg-gray-50 focus:outline-none focus:ring-0 " placeholder="Rechercher un Domaine">
                    </div>
                </div>
                <button type="button" id="btn-open-domain-modal" class="text-gray-700 bg-white hover:bg-gray-50 focus:outline-none font-bold rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">
                    Ajouter un Domaine
                    <svg class="w-5 h-5 ml-2 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z"></path></svg>
                </button>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white border-b border-gray-200">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        @if ($domaines->count())
                        <table id="domain-table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Nom de Domaine
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Technologie
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Serveur
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Version PHP
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    BackOffice
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">Modifier</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($domaines as $domaine)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th onclick="location.href='wordpress/{{ $domaine->slug }}'" scope="row" class="uppercase px-6 py-4 font-bold text-gray-900 dark:text-white whitespace-nowrap cursor-pointer">
                                        {{ $domaine->domaine }}
                                    </th>
                                    <td onclick="location.href='wordpress/{{ $domaine->slug }}'" class="px-6 py-4 cursor-pointer text-center">
                                        {{ $domaine->type_site }}
                                    </td>
                                    <td onclick="location.href='wordpress/{{ $domaine->slug }}'" class="px-6 py-4 cursor-pointer text-center">
                                        {{ $domaine->serveur }}
                                    </td>
                                    <td onclick="location.href='wordpress/{{ $domaine->slug }}'" class="px-6 py-4 cursor-pointer text-center">
                                        {{ $domaine->php_version }}
                                    </td>
                                    <td class="px-6 py-4 flex justify-center items-center">
                                        <a href="{{ $domaine->backoffice }}" target="_blank" class="underline">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <a href="/wordpress/{{ $domaine->slug }}/edit" class="font-medium text-gray-700 dark:text-blue-500 hover:underline">Modifier</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                            @else
                            <p class="p-6">Aucun domaine pour le moment</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="flex justify-end items-center flex-wrap mt-4">
                <span class="text-gray-700 bg-white font-bold rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">
                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    {{ $domaines->count() }} Domaines
                </span>
            </div>
        </div>
    </div>

    <x-modal-create-domaine />
    <x-scroll-top />
</x-app-layout>
