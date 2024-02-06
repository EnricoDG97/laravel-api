import './bootstrap';

import "~resources/scss/app.scss";
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
]);


// GESTIONE MODAL - ARCHIEVE
const archieveButtons = document.querySelectorAll('.btn-archieve');
// console.log(archieveButtons);

archieveButtons.forEach(button => {
    button.addEventListener('click', (event) => {
        event.preventDefault();
        // console.log('clicked');
        
        const deleteModal = new bootstrap.Modal('#soft-delete-modal');
        
        const title = button.getAttribute('data-title');
        document.getElementById('title-to-archieve').innerHTML = title;
        
        document.getElementById('button-delete').addEventListener('click', () => {
            // console.log(button.parentElement);
            button.parentElement.submit();
        })

        deleteModal.show();
    });
})
 // fine MODAL - ARCHIEVE


 
// GESTIONE MODAL - DELETE
const deleteButtons = document.querySelectorAll('.btn-delete');
// console.log(deleteButtons);

deleteButtons.forEach(button => {
    button.addEventListener('click', (event) => {
        event.preventDefault();
        // console.log('clicked');
        
        const deleteModal = new bootstrap.Modal('#delete-modal');
        
        const title = button.getAttribute('data-title');
        document.getElementById('title-to-delete').innerHTML = title;
        
        document.getElementById('button-delete').addEventListener('click', () => {
            // console.log(button.parentElement);
            button.parentElement.submit();
        })

        deleteModal.show();
    });
})
// fine MODAL - DELETE
