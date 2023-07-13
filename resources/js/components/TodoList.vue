<template>
    <li class="list-group-item d-flex justify-content-between w-50">
      <div class="rounded overflow-hidden shadow-lg">
        <div class="px-6 py-4 bg-gray-500">
          <div class="font-bold text-xl mb-2">        
            <h2
              :class="[assignment.completed ? 'completed' : '', 'assignment']"
            >
              {{  assignment.name }}
            </h2>
          </div>
          <div class="flex justify-between">
            <label class="text-xs px-2"><input
              type="checkbox"
              @change="updateList()"
              v-model="assignment.completed"
              class="mr-2"
            />All done</label>
            <button
                class="bg-gray-800 text-white rounded-full justify-center px-2 text-xs" 
                @click="removeAssignment()"
            >delete</button>
          </div>
        </div>
        <div class="bg-gray-400 p-3">
          <item-list
          v-for="item in filteredItems"
          :item="item"
          :key="item.id"
          v-on:reloadItems="getItems()"

          class="m-auto my-1 text-justify text-wrap p-2 bg-gray-400"
        />
        <item-create 
            class="text-center text-black"
            :assignment="assignment"
            v-on:reloadItems="getItems()" 
        />
        </div>
       
        
      </div>
    </li>
  </template>
  
  <script>
  import axios from 'axios';
  import ItemList from './ItemList.vue';
  import ItemCreate from './ItemCreate.vue';
  
  export default {
    props: ["assignment", "item"],
    components: { ItemList, ItemCreate },
    data() {
      return {
        items: [],
      };
    },
    computed: {
      filteredItems() {
        return this.items.filter((item) => item.lists_id === this.assignment.id);
      },
    },
    methods: {
      updateList() {
        // this.assignment.completed = !this.assignment.completed;
        axios
          .put(`api/task/${this.assignment.id}`, {
            task: this.assignment,
          })
          .then((res) => {
            if (res.status == 200) {
                this.$emit("reloadlist");
            }
          })
          .catch((error) => {
            console.log('error from axios put', error);
          });
      },

      removeAssignment() {
        axios
          .delete(`api/task/${this.assignment.id}`)
          .then((res) => {
            if (res.status == 200) {
              this.$emit("reloadrange");
            }
          })
          .catch((error) => {
            console.log('error from axios delete method', error);
          });
      },
      getItems() {
        axios
          .get(`api/items/${this.assignment.id}`)
          .then((res) => {
            this.items = res.data;
            this.items.forEach(item => {
              if (item.completed == 0) {
                item.completed = false
              } else {
                item.completed = true
              }
            });
          })
          .catch((error) => {
            console.log(error);
          });
      },
    },
    created() {
      this.getItems();
    },
  };
  </script>
  
  <style>
  .completed {
    text-decoration: line-through;
    color: gray;
  }
  .assignment {
    word-break: break-all;
  }
  </style>
  