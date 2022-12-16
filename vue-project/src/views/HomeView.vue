<template>
  <div class="container d-flex p-3">
    <div class="card-group p-3" v-for="team in filterTeams">
      <TeamCard :team="team" />
    </div>
  </div>
</template>

<style>

</style>

<script setup>
import {onBeforeMount, computed, ref, watch} from "vue"
import {useRoute} from "vue-router"
import axios from "axios";
import TeamCard from '@/components/TeamCard.vue';
const teams = ref([]);
const route = useRoute();
const country = ref(route.query.countryId);

onBeforeMount(async () => {
  let request = (await axios.get("/api/teams")).data
  teams.value = request.items
})

watch(route, async () => {
  country.value = route.query.countryId
})

const filterTeams = computed(() => {
  return teams.value.filter(team =>
    country.value === undefined || team.country_id.toString() === country.value
  )
})

</script>