<template>
    <div class="container">
        <ul class="nav nav-pills p-4">
            <li class="nav-item me-2">
                <router-link to="#image" v-if="type === '#image'" type="button"
                    class="btn btn-secondary">Фото</router-link>
                <router-link to="#image" v-if="type !== '#image'" type="button" class="btn btn-dark">Фото</router-link>
            </li>
            <li class="nav-item">
                <router-link to="#description" v-if="type === '#description'" type="button"
                    class="btn btn-secondary">Информация</router-link>
                <router-link to="#description" v-if="type !== '#description'" type="button"
                    class="btn btn-dark">Информация</router-link>
            </li>
        </ul>

        <div class="p-4 border rounded-2">
            <div v-if="type === ''">
                Выбирите поле
            </div>

            <div v-if="type === '#description'">
                {{ team.description }}
            </div>

            <div v-if="type === '#image'">
                <img class = "w-50" :src="team.image" alt="">
            </div>
        </div>
    </div>

</template>

<script setup>
import { useRoute } from 'vue-router';
import { onBeforeMount, ref, watch } from 'vue';
import axios from "axios";

const team = ref();
const route = ref(useRoute());
const id = ref(route.value.params.id);
const type = ref('');

watch(route.value, () => { type.value = route.value.hash });

onBeforeMount(async () => {
    team.value = (await axios.get(`/api/teams/${id.value}`)).data
    type.value = route.value.hash
})
</script>