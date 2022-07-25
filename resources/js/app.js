import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

if (document.querySelector('#btn-open-domain-modal')) {
    document.querySelector('#btn-open-domain-modal').addEventListener('click', function (e) {
        document.querySelector('#modal-creation-domaine').classList.remove('hidden')
        document.querySelector('body').classList.add('overflow-hidden')
    })
}

if (document.querySelector('#btn-open-backup-modal')) {
    document.querySelector('#btn-open-backup-modal').addEventListener('click', function (e) {
        document.querySelector('#modal-creation-domaine').classList.remove('hidden')
        document.querySelector('body').classList.add('overflow-hidden')
    })
}

if (document.querySelector('#btn-modal-close')) {
    document.querySelector('#btn-modal-close').addEventListener('click', function (e) {
        document.querySelector('#modal-creation-domaine').classList.add('hidden')
        document.querySelector('body').classList.remove('overflow-hidden')
    })
}

if (document.querySelector('#delete-button')) {
    document.querySelector('#delete-button').addEventListener('click', function (e) {
        if(confirm('Êtes-vous sur de vouloir supprimer ce domaine ?')) {
        } else {
            e.preventDefault()
        }
    })
}

// TABLE SEARCH

if (document.querySelector('#domain-search')) {
    document.querySelector('#domain-search').addEventListener('keyup', function () {
        // Declare variables
        var input, filter, table, tr, th, i, txtValue;
        input = document.getElementById("domain-search");
        filter = input.value.toUpperCase();
        table = document.getElementById("domain-table");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            th = tr[i].getElementsByTagName("th")[0];
            if (th) {
                txtValue = th.textContent || th.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    })
}
