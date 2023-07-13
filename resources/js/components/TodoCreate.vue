<template>
    <div class="mt-3">
            <div class="container m-2 w-100">
                <input
                    type="test"
                    placeholder="Add new todo list"
                    class="text-black font-bold py-2 px-4 mr-2 mt-8 rounded"
                    v-model="assignment.name"
                />
                <button 
                    :class="[assignment.name ? 'active' : 'notactive']"
                    class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded"
                    @click="addAssignment()">Add</button>
            </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    data: function() {
        return {
            assignment: {
                name: '',
            }
        };
    },
    methods: {
        addAssignment() {
            if (this.assignment.name == '') {
                return;
            }

            axios
                .post("api/task/store", {
                    task: this.assignment
                })
                .then(res => {
                    if (res.status == 201) {
                        this.assignment.name = "";
                        this.$emit("reloadlist");
                    }
                })
                .catch(error => {
                    console.log(error);
                });
        }
    }
};
</script>

<style scoped>
.active {
    color: white;
    background-color: blue;
}
.inactive {
    color: gray;
}
</style>