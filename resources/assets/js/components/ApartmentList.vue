<template lang="html">
 <div class="ApartmentList">
  <div class="container">
   <div class="row">
    <button @click="formIsVisible = true">Add Apartment</button>
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
        <tbody>

<!-- showDetails(apartment.id) -->

            <tr v-for="apartment in apartments" :class="{ active: isActive(apartment) }">
                <th scope="row"> {{ apartment.id }} </th>
                <td> <a href="#" v-on:click="showDetails(apartment)"> {{ apartment.name }} </a> </td>
                <td> {{ apartment.location }} </td>
                <td> {{ apartment.bedrooms }} </td>
                <td> {{ apartment.bathrooms }} </td>
                <td> {{ apartment.price }} </td>
                <ApartmentInfo @cancel="cancelled" class="conditional" :apartment="apartment"></ApartmentInfo>
            </tr>


        </tbody>
    </table>
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
    ApartmentInfo,
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
  ],

  data () {
    return {
      currentApartment: 0,
      apartments: [],
      formIsVisible: false
    }
  },
  methods: {
    showDetails (apartment) {
      this.currentApartment = apartment.id;
      
    },
    isActive (apartment) {
      // console.log(apartment);
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
</style>
