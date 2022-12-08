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

            <a href="#" class="d-flex justify-content-center btn btn-primary mb-2  p-1 btn-dark">{{ team.title }}</a>
            <a href="#" class="d-flex justify-content-center btn btn-primary mb-2  p-1 btn-dark ">Фото</a>
            <a href="#" class="d-flex justify-content-center btn btn-primary mb-2  p-1 btn-dark ">Информация</a>
        </div>
    </div>

</template>