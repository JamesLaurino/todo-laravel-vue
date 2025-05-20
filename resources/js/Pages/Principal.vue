<script setup>
import NavigationBar from '@/Components/NavigationBar.vue';
import { ref, watchEffect } from "vue";
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    todos: {
        type: Array
    }
});

const sortedAndFilteredTodos = ref([]);

watchEffect(() => {
    sortedAndFilteredTodos.value = [...props.todos];
});

const form = useForm({
    isDone: false,
    id:''
})

const checkedItems = ref({});

function submit(todoKey) {
    form.isDone = checkedItems.value[todoKey];
    form.id = todoKey;
    form.put("/todo")
}

function trier() {
    sortedAndFilteredTodos.value.sort((a, b) => {
        return a.title.localeCompare(b.title);
    });
}
</script>

<template>
    <NavigationBar/>
    <div class="container d-flex justify-content-center mt-2">
        <h1 class="h1">Todo tasks</h1>
    </div>
    <div class="container d-flex justify-content-center mt-2">
        <button class="btn btn-warning mr-3" @click="trier">Trier</button>
        <button class="btn btn-warning">Autre Bouton</button>
    </div>
    <div v-for="(todo) in sortedAndFilteredTodos" :key="todo['id']">
        <div class="container justify-center p-3" style="width: 300px">
            <div class="shadow p-3 d-flex justify-content-between rounded">
                <p :class="{lineThrough: todo['isDone'] === 1}">{{todo['id']}}. {{todo['title']}}</p>
                <form @submit.prevent>
                    <input
                        type="checkbox"
                        class="form-control"
                        v-model="checkedItems[todo['id']]"
                        @change="submit(todo['id'])"
                        :checked="todo['isDone'] === 1" />
                </form>
            </div>
        </div>
    </div>
</template>

<style scoped>
.lineThrough {
    text-decoration: line-through;
}
</style>
