<script setup>
import NavigationBar from "@/Components/NavigationBar.vue";
import {ref} from "vue";
import {useForm} from "@inertiajs/vue3";

const title = ref('');

const form = useForm({
    title:''
})


function submit(event) {
    event.preventDefault();
    form.title = title.value;
    form.post("/todo")
}


</script>

<template>
    <NavigationBar/>
    <div class="container d-flex justify-content-center mt-4">
        <h1 class="h3">Formulaire d'ajout d'un pokémon</h1>
    </div>

    <div class="container d-flex justify-content-center mt-5">
        <form>
            <div class="form-group">
                <label for="title">Todo name</label>
                <input v-model="title" type="text" class="form-control" id="title" aria-describedby="title">
            </div>
            <button @click="submit" type="submit" class="btn btn-dark">Submit</button>
        </form>
    </div>

</template>

<style scoped>

</style>
