<template>
    <div class="container w-100 m-auto text-center mt-3">
        <todo-create 
            class="text-center"
            v-on:reloadlist="getAssignments()" 
        />
        <todo-view
            :assignments="assignments"
            v-on:reloadlist="getAssignments()"
            class="text-center"
        />
    </div>
</template>
<script>
    import TodoView from "./TodoView.vue";
    import TodoCreate from "./TodoCreate.vue";
    import axios from 'axios';

    export default {
        components: {
            TodoCreate,
            TodoView
        },

        data: function() {
            return {
                assignments: []
            };
        },

        methods: {
            getAssignments() {
                axios
                    .get("api/tasks")
                    .then(res => {
                        this.assignments = res.data;
                        this.assignments.forEach(assignment => {
                            if (assignment.completed == 0) {
                                assignment.completed = false
                            } else {
                                assignment.completed = true
                            }
                        });
                    })
                    .catch(error => {
                        console.log(error);
                    });
            }
        },

        created() {
            this.getAssignments();
        }
    };
</script>