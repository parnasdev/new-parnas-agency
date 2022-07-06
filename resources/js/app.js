require('./bootstrap');
import Bootstrap from './files/bootstrap.min'

import Alpine from 'alpinejs'
import Swal from "sweetalert2";
// import Lightbox from "lightbox2";

window.Alpine = Alpine;
window.Bootstrap = Bootstrap;
// window.Lightbox = Lightbox;
Alpine.start();
window.Swal = Swal;
