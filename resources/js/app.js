import './bootstrap';

import { createApp } from 'vue';
import App from './components/App.vue';
import Home from './components/Home.vue';
import Pessoa from './components/Pessoa.vue';
import Registro from './components/Registro.vue';
import Revisao from './components/Revisao.vue';
import Veiculo from './components/Veiculo.vue';

const app = createApp();
const home = createApp();
const pessoa = createApp();
const registro = createApp();
const revisao = createApp();
const veiculo = createApp();

app.component('App', App);
home.component('Home', Home);
pessoa.component('Pessoa', Pessoa);
registro.component('Registro', Registro);
revisao.component('Revisao', Revisao);
veiculo.component('Veiculo', Veiculo);

app.mount('#app');
home.mount('#home');
pessoa.mount('#pessoa');
registro.mount('#registro');
revisao.mount('#revisao');
veiculo.mount('#veiculo');
