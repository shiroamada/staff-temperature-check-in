require('./bootstrap');

import Swal from 'sweetalert2';
import { Form, HasError, AlertError } from 'vform'

window.Form = Form;

window.Swal = Swal;

const toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});

window.toast = toast;

import bsCustomFileInput from 'bs-custom-file-input';
global.bsCustomFileInput = bsCustomFileInput;
