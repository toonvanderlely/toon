
///
/// DEVELOPERS NOTE:
/// 
/// De werkende ('gecompileerde') JavaScript-code vind je in de public-map.
/// Het aanpassen van bestanden in resources/js heeft geen zin, tenzij je deze
/// gaat compileren met npm. Gebruik deze files alleen ter referentie.
///




//Stimulus
import { Application } from "stimulus"
import { definitionsFromContext } from "stimulus/webpack-helpers"
const application = Application.start();
const context = require.context("./controllers", true, /\.js$/);
application.load(definitionsFromContext(context));

//Axios
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.defaults.withCredentials = true;

let token = document.head.querySelector('meta[name="csrf-token"]');
if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}
