<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Exporter les Domaines') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
                <ul class="flex flex-wrap -mb-px ml-4">
                    <li class="mr-2">
                        <a href="{{ route('admin') }}" class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Statistiques</a>
                    </li>
                    <li class="mr-2">
                        <a href="/admin/import" class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" aria-current="page">Importer des Domaines</a>
                    </li>
                    <li class="mr-2">
                        <a href="/admin/export" class="inline-block p-4 text-gray-800 rounded-t-lg border-b-2 border-indigo-400 dark:text-blue-500 dark:border-blue-500" aria-current="page">Exporter les Domaines</a>
                    </li>
                    <li class="mr-2">
                        <a href="/admin/delete" class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Supprimer des Domaines</a>
                    </li>
                </ul>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if($domainesTotal > 0)
                <div class="flex justify-center flex-wrap p-6 bg-white border-b border-gray-200">
                    <p class="text-md text-center w-full">Vous allez exporter <span class="font-bold bg-gray-800 text-white p-1 rounded-lg">{{ $domainesTotal }}</span> Domaines</p>
                    <form class="mt-4" method="GET" action="/admin/export/download" enctype="multipart/form-data">
                        @csrf
                            <x-button>
                                {{ __('Exporter les Domaines') }}
                            </x-button>
                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    </form>
                </div>
                @else
                    <p class="p-6">Aucun domaine à exporter pour le moment</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
