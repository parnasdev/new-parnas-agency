import Swal from 'sweetalert2'
import Alpine from 'alpinejs'
import mask from '@alpinejs/mask'
import persist from '@alpinejs/persist'

window.moment = require('jalali-moment')

Alpine.plugin(mask)

Alpine.plugin(persist)
window.Alpine = Alpine
Alpine.start()

window.Swal = Swal;
