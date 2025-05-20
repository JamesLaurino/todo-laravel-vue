<script setup>

import NavigationBar from "@/Components/NavigationBar.vue";
import {Link, useForm} from "@inertiajs/vue3";

const props = defineProps({
    todos: {
        type: Array
    }
});

const form = useForm({})

function deleteTodo(todoId) {
    form.delete(`/todo/${todoId}`);
}

</script>

<template>
    <NavigationBar/>
    <div class="container d-flex justify-content-center mt-4">
        <h1 class="h3">Deletion des todo</h1>
    </div>
    <div class="container d-flex justify-content-center mt-5">
        <table class="table" style="width: 500px">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">title</th>
                <th scope="col">isDone</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="(todo,index) in todos" :key="index">
                    <th scope="row">{{todo["id"]}}</th>
                    <td>{{todo["title"]}}</td>
                    <td>{{todo["isDone"]}}</td>
                    <td>
                        <button @click="deleteTodo(todo['id'])" class="btn btn-dark mr-3">Delete</button>
                        <button class="btn btn-warning">Edit</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="container d-flex justify-content-center mt-1">
        <Link class="btn btn-dark" :href="route('todo.index')"> Accueil </Link>
    </div>
</template>

<style scoped>

</style>
