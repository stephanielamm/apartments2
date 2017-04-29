<template>
<!--Create form-->
<div class="ApartmentForm">
      <div class="col-md-12">
        <h2 class="formTitle">Add New Apartment</h2>
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
     <!--Create button-->
     <div class="col-md-12">
          <button class="btn btn-small pull-right create" @click="create()">Create</button>
    </div>
   </div>
  </div>
</template>

<script>
import axios from 'axios';
import ApartmentList from './ApartmentList';

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
    // POST method
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
   <style lang="css">

   </style>
