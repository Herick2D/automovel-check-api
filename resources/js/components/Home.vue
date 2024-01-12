<template>
  <div>
    <h2>Bem-vindo à Página Inicial!</h2>
    <nav>
      <router-link to="/nova-revisao">Nova Revisão</router-link>
      <router-link to="/clientes">Clientes</router-link>
      <router-link to="/usuarios">Usuários</router-link>
      <router-link to="/veiculos">Veículos</router-link>
      <router-link to="/revisoes">Revisões</router-link>
    </nav>
    <router-view></router-view>
  </div>
</template>

<script>
export default {
  name: 'Home',
};
</script>

<style scoped>
nav {
  margin-top: 20px;
}

router-link {
  margin-right: 10px;
  text-decoration: none;
  color: #333;
}
</style>
