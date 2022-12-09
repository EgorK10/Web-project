<script setup>
import { RouterLink, RouterView } from 'vue-router'
import { onBeforeMount, ref } from 'vue';
import axios from "axios";

const countries = ref([]);

onBeforeMount(async () => {
  let request = (await axios.get("/api/countries")).data
  countries.value = request.items
})
</script>

<template>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
            <div v-for="country in countries">
              <li class="nav-item">
                <router-link class="nav-link" :to="`/?countryId=${country.id}`">{{ country.name }}</router-link>
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
