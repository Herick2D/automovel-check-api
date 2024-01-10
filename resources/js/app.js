import './bootstrap';


import { createApp } from 'vue';
import App from './components/App.vue';
// import Exemplo from './components/Exemplo.vue';

const app = createApp();

app.component('App', App);

app.mount('#app');


// Vue.component('Exemplo', Exemplo);



// const app = new Vue({
//     el: '#app',
// });
