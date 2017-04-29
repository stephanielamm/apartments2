<template lang="html">
 <div class="ApartmentList">
  <div class="container">
  <!-- Add Apartment Button -->
   <div class="row addrow">
    <button class="btn pull-left add" @click="formIsVisible = true">Add Apartment</button>
   </div>

  <!--Cancel Button-->
  <div class="row addrow" v-show="formIsVisible">
       <button class="btn pull-left add" @click="formIsVisible = false">Cancel</button>
 </div>

  <!-- Table Starts -->
  <div class="row">
    <div class="col-lg-12">
      <ApartmentForm v-if="formIsVisible"></ApartmentForm>
      <table class="table table-hover table-responsive">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Location</th>
            <th>Bedrooms</th>
            <th>Bathrooms</th>
            <th>Price</th>
          </tr>
        </thead>

        <!-- Table Body, Loops in Table Row -->
        <tbody>
            <tr v-for="apartment in apartments" :class="{ active: isActive(apartment) }">

                <!-- Delete Here -->
                <th scope="row"> <a href="#" v-on:click="deleteApartment(apartment)"> Delete </a> </th>
                <td>  {{ apartment.name }} </td>
                <td> {{ apartment.location }} </td>
                <td> {{ apartment.bedrooms }} </td>
                <td> {{ apartment.bathrooms }} </td>
                <td> {{ apartment.price }} </td>
              </tr>
        </tbody>
    </table>
    </div>
  </div>
</div>
 </div>
</template>

<script>
import axios from 'axios';
import ApartmentInfo from './ApartmentInfo';
import ApartmentForm from './ApartmentForm';

export default {
  components: {
    ApartmentForm
  },

  mounted () {
    axios.get('/apartments')
    .then(response => {
      this.apartments = response.data;
    })
    .catch((error) => {

    })
  },

  props: [
    'apartment'
    //'currentApartment'
    ],

  data () {
    return {
      currentApartment: 0,
      apartments: [],
      formIsVisible: false
    }
  },
  methods: {
    deleteApartment (i) {
      console.log(i);
      this.apartments.splice(i.id, 1);
      console.log(i.id);
      axios.delete('/apartments/'+i.id, {

      })
      this.$emit('remove');
    },
    isActive (apartment) {
      if (apartment.id==this.currentApartment) {
        return true;
      }
      else {
          return false;
      }

    },
    cancelled () {
      this.currentApartment = null;
    }

  }
}
</script>

<style lang="css">
  .conditional {
    display: none;
  }
  .active .conditional {
    display: block;
  }
  .addrow {
    margin-bottom: 12px;
    margin-left: 12px;
    padding-left: 15px;
  }
</style>
