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
  
<script lang="ts">
  import { defineComponent } from 'vue';

  interface Player {
    firstName: string;
    lastName: string;
    city: string;
    birthDate: Date;
  }

  export default defineComponent({
    data() {
      return {
        players: [] as Player[]
      };
    },
    mounted() {
      fetch('http://localhost:8000/api/players')
        .then(response => response.json())
        .then((data: Player[]) => {
          this.players = data;
        })
        .catch(console.error);
    }
  })
</script>