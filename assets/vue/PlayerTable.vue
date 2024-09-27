<script setup lang="ts">
  import { ref, onMounted, computed, watch } from 'vue';
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

  const toggleSortOrder = async () => sortAscending.value = !sortAscending.value;
  const sortIcon = computed(() => sortAscending.value ? faArrowUp : faArrowDown);

  watch(sortAscending, sortPlayersByBirthDate);

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
    <div id="playerTableContainer">
        <table id="playerTable">
            <thead>
                <tr>
                    <th @click="toggleSortOrder"><span :style="{marginRight: '0.5rem'}">Birth Date</span><FontAwesomeIcon :icon="sortIcon" size="lg"/></th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>City</th>
                </tr>
            </thead>
            <tbody>
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
