<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Importer des Domaines') }}
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
                        <a href="/admin/import" class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Importer des Domaines</a>
                    </li>
                    <li class="mr-2">
                        <a href="/admin/export" class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Exporter les Domaines</a>
                    </li>
                    <li class="mr-2">
                        <a href="/admin/delete" class="inline-block p-4 text-gray-800 rounded-t-lg border-b-2 border-indigo-400 dark:text-blue-500 dark:border-blue-500">Supprimer des Domaines</a>
                    </li>
                </ul>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white border-b border-gray-200">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        @if ($domaines->count())
                            <form id="formDelete" method="POST" action="/admin/delete" enctype="multipart/form-data" class="relative">
                                @csrf
                                @method('DELETE')
                                <table id="domain-table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="py-3">
                                            <input type="checkbox" id="checkAllBtn" class="ml-3 rounded-sm text-red-600 focus:ring-red-500" />
                                        </th>
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
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($domaines as $domaine)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                            <th>
                                                <input type="checkbox" name="deleteDomains" value="{{ $domaine->id }}" class="ml-3 rounded-sm text-red-600 focus:ring-red-500" />
                                            </th>
                                            <th scope="row" class="uppercase px-6 py-4 font-bold text-gray-900 dark:text-white whitespace-nowrap">
                                                {{ $domaine->domaine }}
                                            </th>
                                            <td class="px-6 py-4 text-center">
                                                {{ $domaine->type_site }}
                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                {{ $domaine->serveur }}
                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                {{ $domaine->php_version }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <input type="text" id="domainsToDelete" name="domainsToDelete" value="" class="hidden" />
                                <button id="delete-domains" type="submit" class="fixed bottom-2 right-2 text-white bg-red-600 hover:bg-red-500 focus:outline-none font-bold rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">
                                    <svg class="w-5 h-5 ml-0 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    Supprimer les Domaines
                                </button>
                            </form>
                        @else
                            <p class="p-6">Aucun domaine à supprimer pour le moment</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        if (document.querySelector('#delete-domains')) {
            document.querySelector('#delete-domains').addEventListener('click', function (e) {
                e.preventDefault()
                const checkboxes = document.querySelectorAll('input[name="deleteDomains"]')
                let allIds = []
                checkboxes.forEach((checkbox) => {
                    if(checkbox.checked) {
                        allIds.push(checkbox.value)
                    }
                })
                console.log(allIds)

                let allIdsFormatted = allIds.join(",");
                console.log(allIdsFormatted)

                document.querySelector('#domainsToDelete').value = allIdsFormatted

                document.querySelector('#formDelete').submit()
            })
        }

        if (document.querySelector('#checkAllBtn')) {
            function check(checked = true) {
                const checkboxes = document.querySelectorAll('input[name="deleteDomains"]')
                checkboxes.forEach((checkbox) => {
                    checkbox.checked = checked
                })
            }

            function checkAll() {
                check()
                this.onclick = uncheckAll
            }

            function uncheckAll() {
                check(false)
                this.onclick = checkAll
            }

            const btn = document.querySelector('#checkAllBtn')
            btn.onclick = checkAll
        }
    </script>
</x-app-layout>
