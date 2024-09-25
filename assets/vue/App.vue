<!-- assets/vue/App.vue -->
<template>
    <div>
        <h1>Players</h1>
        <ul>
            <li v-for="player in players" :key="player.id">
                {{ player.firstName }} {{ player.lastName }}, {{ player.city }}, born {{ player.birthDate.date.slice(0, 10) }}.
            </li>
        </ul>
    </div>
</template>
  
  <script>
  export default {
    data() {
      return {
        players: []
      };
    },
  mounted() {
    fetch('http://localhost:8000/api/players')
      .then(response => response.json())
      .then(data => {
        this.players = data;
      })
      .catch(error => {
        console.error(error);
      });
  }
  }
  </script>