<template>
    <div class="mt-3">
        <div class="container m-2 w-100">
            <input
                type="text"
                placeholder="Add new item"
                class="border text-black font-bold py-2 px-4 mr-2 rounded"
                v-model="item.name"
            />
            <button 
                :class="[item.name ? 'active' : 'notactive']"
                class="notactive bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded"
                @click="addItem()">Add</button>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    data: function() {
        return {
            item: {
                name: ''            
            }
        };
    },
    methods: {
        addItem() {
            if (this.item.name == '') {
                return;
            }

            this.item.lists_id = this.$parent.assignment.id;
            axios
                .post("api/item/store", {
                    item: this.item
                })
                .then(res => {
                    if (res.status == 201) {
                        this.item.name = "";
                        this.$emit("reloadItems");
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