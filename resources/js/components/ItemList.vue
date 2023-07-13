<template>
    <li class="">
        <input
            type="checkbox"
            @change="updateItem()"
            v-model="item.completed"
            class="mr-3"
        />
        <span 
            :class="[item.completed ? 'completed' : '', 'item']"
        >{{ item.name }}</span>
        <button 
            @click="removeItem()"
            class="float-right bg-red-500 text-white rounded-full justify-center px-2 text-xs"
        >X</button>
    </li>
</template>

<script>
import axios from 'axios'
export default {
    props: ["item"],
    methods: {
        updateItem() {
            axios
                .put(`api/item/${this.item.id}`, {
                    item: this.item
                })
                .then(res => {
                    if (res.status == 200) {
                        this.$emit("reloadItems");
                    }
                })
                .catch(error => {
                    console.log("error from axios put", error);
                });
        },
        removeItem() {
            axios
                .delete(`api/item/${this.item.id}`)
                .then(res => {
                    if (res.status == 200) {
                        this.$emit("reloadItems");
                    }
                })
                .catch(error => {
                    console.log("error from axios delete method", error);
                });
        }
    }
}
</script>

<style>
.completed {
    text-decoration: line-through;
    color: gray;
}
.item {
    word-break: break-all;
}
</style>