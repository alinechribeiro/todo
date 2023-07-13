<template>
    <div class="mt-4">
        <ul class="list-group m-auto">
            <div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-5">
                <todo-list
                    :assignment="assignment"
                    v-for="assignment in assignments"
                    v-on:reloadrange="reloadrange()"
                    :key="assignment.id"
                    class="m-auto my-1 text-justify text-wrap"
                />
            </div>
        </ul>
    </div>
</template>

<script>
    import TodoList from './TodoList.vue';

    export default {
        props: ["assignments"],
        components: { TodoList },
        methods: {
            reloadrange() {
                this.$emit("reloadlist");
            }
        }
    };
</script>