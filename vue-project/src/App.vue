<script setup>
import { RouterLink, RouterView } from 'vue-router'
import { onBeforeMount, ref } from 'vue';
import axios from "axios";

const teams = ref([]);

onBeforeMount(async () => {
  let request = (await axios.get("/api/teams")).data
  teams.value = request.items
})
</script>

<template>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <router-link class="navbar-brand" to="/">
          <img class="logo" src="../public/images/logo.jpg" alt="">
        </router-link>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <div v-for="team in teams">
              <li class="nav-item">
                <router-link class="nav-link" :to="`/team/${team.id}`">{{ team.title }}</router-link>
              </li>
            </div>
          </ul>
        </div>
      </div>
    </nav>
  </header>


  <RouterView />
</template>

<style scoped>
.logo {
  width: 80px;
  height: 80px;
}
</style>
