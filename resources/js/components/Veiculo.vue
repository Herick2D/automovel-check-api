<template>
  <div>
    <h2>Lista de Veículos</h2>
    <ul>
      <li v-for="veiculo in veiculos" :key="veiculo.idVeiculo">
        {{ veiculo.marca }} {{ veiculo.modelo }} ({{ veiculo.ano }})
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  data() {
    return {
      veiculos: [],
    };
  },
  mounted() {
    this.carregarVeiculos();
  },
  methods: {
    carregarVeiculos() {

      axios.get('/api/veiculo')
        .then(response => {
          this.veiculos = response.data;
        })
        .catch(error => {
          console.error('Erro ao carregar veículos:', error);
        });
    },
  },
};
</script>

<style scoped>

</style>
