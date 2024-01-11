import './bootstrap';


import { createApp } from 'vue';
import App from './components/App.vue';
import Home from './components/Home.vue';

const app = createApp();
const home = createApp();

app.component('App', App);
home.component('Home', Home);

app.mount('#app');
home.mount('#home');
