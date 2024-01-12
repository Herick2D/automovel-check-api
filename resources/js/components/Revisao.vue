<template>
  <div>
    <h2>Revisões Cadastradas</h2>

    <ul>
      <li v-for="revisao in revisoes" :key="revisao.id">
        {{ revisao.veiculo }} - {{ revisao.data }} - {{ revisao.descricao }}
      </li>
    </ul>

    <form @submit.prevent="adicionarRevisao">
      <h3>Adicionar Nova Revisão</h3>
      <div>
        <label for="veiculo">Veículo:</label>
        <input type="text" v-model="novaRevisao.veiculo" required>
      </div>
      <div>
        <label for="data">Data:</label>
        <input type="date" v-model="novaRevisao.data" required>
      </div>
      <div>
        <label for="descricao">Descrição:</label>
        <textarea v-model="novaRevisao.descricao" required></textarea>
      </div>
      <button type="submit">Adicionar Revisão</button>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      revisoes: [
        { id: 1, veiculo: 'Veículo 1', data: '2022-01-01', descricao: 'Revisão de rotina' },
        { id: 2, veiculo: 'Veículo 2', data: '2022-02-01', descricao: 'Troca de óleo' },
      ],
      novaRevisao: {
        veiculo: '',
        data: '',
        descricao: '',
      },
    };
  },
  methods: {
    adicionarRevisao() {
      this.revisoes.push({
        id: this.revisoes.length + 1,
        veiculo: this.novaRevisao.veiculo,
        data: this.novaRevisao.data,
        descricao: this.novaRevisao.descricao,
      });


      this.novaRevisao.veiculo = '';
      this.novaRevisao.data = '';
      this.novaRevisao.descricao = '';
    },
  },
};
</script>

<style scoped>

</style>
