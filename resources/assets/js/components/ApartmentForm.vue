<template>
  <div class="ApartmentForm">
    <input type="text" v-model="name" />
    <input type="text" v-model="location" />
    <input type="text" v-model="bedrooms" />
    <input type="text" v-model="price" />
    <button class="btn btn-primary" @click="create">Create Contact</button>
  </div>
</template>

<script>
import axios from 'axios';

export default {

  data() {
    return {
      name: '',
      location: '',
      bedrooms: '',
      price: ''
    }
  },

  methods: {
    create () {
      console.log('ApartmentForm -> create');
      this.sendRequest();
    },
    sendRequest () {
         axios.post('/apartments', {
           name: this.name,
           location: this.location,
           bedrooms: this.bedrooms,
           bathrooms: this.bathrooms,
           price: this.price
         })
         .then((response) => {
           console.log('ApartmentForm -> sendRequest success');
           console.log(response.data);
           this.reset();
           this.$emit('created');
         })
         .catch((error) => {
           console.error('ApartmentForm -> sendRequest error');
           // show an error message
         });
       },
       reset () {
         this.name = '';
         this.location = '';
         this.bedrooms = '';
         this.bathrooms = '';
         this.price = '';
       }
     }
   };
   </script>
