<template>
  <div class="container d-flex p-3">
    <div class="card-group p-3" v-for="team in teams">
      <TeamCard :team="team" />
    </div>
  </div>
</template>

<style>

</style>

<script setup>
import { onBeforeMount, ref } from 'vue';
import axios from "axios";
import TeamCard from '@/components/TeamCard.vue';
const teams = ref([]);

onBeforeMount(async () => {
  let request = (await axios.get("/api/teams")).data
  teams.value = request.items
})
</script>