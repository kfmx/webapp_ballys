<script setup lang="ts">
  import { ref, onMounted, nextTick, computed } from 'vue';
  import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
  import { faArrowUp, faArrowDown } from '@fortawesome/free-solid-svg-icons';

  interface Player {
    id: number;
    firstName: string;
    lastName: string;
    city: string;
    birthDate: Date;
  }

  //only used when getting json response from backend api... is there maybe a way to get actual backend type?
  type PlayerDBType = Omit<Player, "birthDate"> & {birthDate: {date: string}};

  const players = ref<Player[]>([]);
  const sortAscending = ref(true);

  const toggleSortOrder = async () => {
      sortAscending.value = !sortAscending.value;
      await nextTick();
      sortPlayersByBirthDate();
    };

  const sortIcon = computed(() => sortAscending.value ? faArrowUp : faArrowDown);

  const sortPlayersByBirthDate = () => {
    players.value.sort((a, b) => {
      const dateA = new Date(a.birthDate).getTime();
      const dateB = new Date(b.birthDate).getTime();

      return sortAscending.value ? dateB - dateA : dateA - dateB;
    });
  };

  const formatPlayerBirthDate = (birthDate: Date) => {
    const year = birthDate.getFullYear();
    const month = String(birthDate.getMonth() + 1).padStart(2, '0');
    const day = String(birthDate.getDate()).padStart(2, '0');
    const hours = String(birthDate.getHours()).padStart(2, '0');
    const minutes = String(birthDate.getMinutes()).padStart(2, '0');

    return `${year}-${month}-${day} ${hours}:${minutes}`;
  };

  onMounted(() => {
    fetch('http://localhost:8000/api/players')
      .then(response => response.json())
      .then((data: PlayerDBType[]) => {
        players.value = data.map(player => ({...player, birthDate: new Date(player.birthDate.date)}));
        sortPlayersByBirthDate();
      })
      .catch(console.error);
  });

</script>

<template>
  <div>
    <h1>Players</h1>
    <table>
      <tbody>
        <tr>
          <th @click="toggleSortOrder">Birth Date <FontAwesomeIcon :icon="sortIcon"/></th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>City</th>
        </tr>
        <tr v-for="player in players" :key="player.id">
          <td>{{ formatPlayerBirthDate(player.birthDate) }}</td>
          <td>{{ player.firstName }}</td>
          <td>{{ player.lastName }}</td>
          <td>{{ player.city }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
