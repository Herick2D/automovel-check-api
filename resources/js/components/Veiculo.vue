<template>
  <div>
    <h2>Lista de Veículos</h2>
    <h3>Veículos de {{ pessoa.nome }}</h3>
    <ul>
      <li v-for="veiculo in veiculos" :key="veiculo.idVeiculo">
        {{ veiculo.marca }} {{ veiculo.modelo }} {{ veiculo.ano }}
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  data() {
    return {
      veiculos: [],
      pessoa: {},
    };
  },
  mounted() {
    this.carregarPessoa();
    this.carregarVeiculos();
  },
  methods: {
    carregarVeiculos() {
      const idLocalStorage = localStorage.getItem('idPessoa');
      axios.get('/api/veiculo/pessoa/' + idLocalStorage)
        .then(response => {
          this.veiculos = response.data;
        })
        .catch(error => {
          console.error('Erro ao carregar veículos:', error);
        });
    },
    carregarPessoa() {
      const idLocalStorage = localStorage.getItem('idPessoa');
      axios.get('/api/pessoa/' + idLocalStorage)
        .then(response => {
          this.pessoa = response.data;
        })
        .catch(error => {
          console.error('Erro ao carregar pessoa:', error);
        });
    },
  },
};
</script>

<style scoped>

</style>
