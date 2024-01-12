<template>
  <div>
    <h2>Clientes Cadastrados</h2>

    <ul>
      <li v-for="cliente in clientes" :key="cliente.idPessoa">
        {{cliente.nome }} - idade: {{ cliente.idade }} - sexo: {{ cliente.sexo }} - <span @click="() => armazenarCliente(cliente.idPessoa)">Veículos</span> - <span @click="() => selecionarCliente(cliente)">editar</span> - <span @click="() => deletarClientes(cliente.idPessoa)">deletar</span>
      </li>
    </ul>

    <form @submit.prevent="adicionarCliente">
      <h2>Adicionar Novo Cliente</h2>
      <div>
        <label for="nome">nome:</label>
        <input type="text" v-model="novoCliente.nome" required>
      </div>
      <div>
        <label for="idade">idade:</label>
        <input type="number" v-model="novoCliente.idade" required>
      </div>
      <div>
        <label for="sexo">sexo:</label>
        <select v-model="novoCliente.sexo">
          <option value="true">Masculino</option>
          <option value="false">Feminino</option>
        </select>
      </div>
      <button type="submit">Adicionar Cliente</button>
    </form>

    <form @submit.prevent="editarClientes">
      <h2>Editar Cliente</h2>
      <div>
        <label for="nome">nome:</label>
        <input type="text" v-model="editarCliente.nome" required>
      </div>
      <div>
        <label for="idade">idade:</label>
        <input type="number" v-model="editarCliente.idade" required>
      </div>
      <div>
        <label for="sexo">sexo:</label>
        <select v-model="editarCliente.sexo">
          <option value="true">Masculino</option>
          <option value="false">Feminino</option>
        </select>
      </div>
      <button type="submit">Editar Cliente</button>
    </form>


  </div>
  
</template>

<script>

export default {
  data() {

    return {
      clientes: [],
      novoCliente: {
        nome: '',
        idade: 0,
        sexo: 'true',
      },

      editarCliente: {
        nome: '',
        idade: 0,
        sexo: 'true',
      },
    };
  },

  mounted() {
    this.recuperarClientes();
  },
  methods: {
    adicionarCliente() {
      const sexoBool = this.novoCliente.sexo === 'true';

      this.clientes.push({
        id: this.clientes.length + 1,
        nome: this.novoCliente.nome,
        idade: this.novoCliente.idade,
        sexo: sexoBool ? 'Masculino' : 'Feminino',
      });

      axios.post('api/pessoa', this.novoCliente)
        .then(response => {
          this.clientes.push(response.data);
        })
        .catch(error => {
          console.error('Erro ao adicionar cliente:', error);
        });

      this.novoCliente.nome = '';
      this.novoCliente.idade = 0;
      this.novoCliente.sexo = 'true';
    },
    recuperarClientes() {
      axios.get('/api/pessoa')
        .then(response => {
          this.clientes = response.data;
        })
        .catch(error => {
          console.error('Erro ao carregar clientes:', error);
        });
    },
    editarClientes() {
      axios.put('/api/pessoa/' + this.editarCliente.idPessoa, this.editarCliente)
      .then(response => {
        console.log(response.data);
      })
      .catch(error => {
        console.error('Erro ao adicionar cliente:', error);
      });

      this.editarCliente.nome = '';
      this.editarCliente.idade = 0;
      this.editarCliente.sexo = 'true';
    },
    deletarClientes(idPessoa) {
      axios.delete('/api/pessoa/' + idPessoa)
        .then(response => {
          this.clientes = response.data;
        })
        .catch(error => {
          console.error('Erro ao deletar clientes:', error);
        });
    },

    selecionarCliente(cliente) {
      this.editarCliente = cliente;
    },

    armazenarCliente(idPessoa) {
      console.log(idPessoa);
      const idArmazenado = localStorage.setItem('idPessoa', idPessoa);
      console.log(idArmazenado);
      localStorage.setItem('idPessoa', idPessoa);
      window.location.href = '/veiculo';

    },
  },
};
</script>

<style scoped>

</style>
