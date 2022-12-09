<script setup>


const props = defineProps({
    team: Object
})

</script>

<template>

    <div class="card border-dark mb-3" style="max-width: 20rem;">
        <img class="card-img-top" :src="team.logo" alt="">
        <div class="card-body">
            <h5 class="card-title ">{{ team.title }}</h5>

            <router-link :to="`/team/${team.id}`"
                class="d-flex justify-content-center btn btn-primary mb-2  p-1 btn-dark">{{ team.title }}</router-link>
            <router-link :to="`/team/${team.id}#image`"
                class="d-flex justify-content-center btn btn-primary mb-2  p-1 btn-dark ">Фото</router-link>
            <router-link :to="`/team/${team.id}#description`"
                class="d-flex justify-content-center btn btn-primary mb-2  p-1 btn-dark ">Информация</router-link>
        </div>
    </div>

</template>

<style>
.card-img-top {
width: 300px;
height: 30vh;
object-fit: cover;
}
</style>