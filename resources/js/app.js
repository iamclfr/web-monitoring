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
