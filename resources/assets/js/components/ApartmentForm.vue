<template>
<!--  <div class="ApartmentForm">
    <input type="text" v-model="name" />
    <input type="text" v-model="location" />
    <input type="text" v-model="bedrooms" />
    <input type="text" v-model="bathrooms" />
    <input type="text" v-model="price" />
    <button class="btn btn-primary" @click="create">Create Contact</button> -->
<!--FORM-->
<div class="ApartmentForm">
      <div class="col-md-12">
        <h1 class="formTitle">Add New Apartment</h1>
      </div>
      <div class="col-md-12">
     <div class="col-md-6">
       <div class="form-group">
         <input class="form-control" type="text" placeholder="Community Name" v-model="name" />
       </div>
     </div>
     <div class="col-md-6">
       <div class="form-group">
         <input class="form-control" type="text" placeholder="Location" v-model="location" />
       </div>
     </div>
     <div class="col-md-6">
       <div class="form-group">
         <input class="form-control" type="text" placeholder="Bedrooms" v-model="bedrooms" />
       </div>
     </div>
     <div class="col-md-6">
       <div class="form-group">
         <input class="form-control" type="text" placeholder="Bathrooms" v-model="bathrooms" />
       </div>
     </div>
     <div class="col-md-6">
       <div class="form-group">
         <input class="form-control" type="text" placeholder="Price" v-model="price" />
       </div>
     </div>
     <div class="col-md-12">
          <button class="btn btn-primary pull-right create" @click="create()">create</button>
    </div>
   </div>
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
      bathrooms: '',
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
