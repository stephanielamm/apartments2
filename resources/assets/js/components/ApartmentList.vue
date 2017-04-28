<template lang="html">
 <div class="ApartmentList">
  <div class="container">
   <div class="row">
    <button @click="formIsVisible = true">Add Apartment</button>
      <ApartmentForm v-if="formIsVisible"></ApartmentForm>
      <p v-for="apartment in apartments" :class="{ active: isActive(apartment) }">
        <a href="#" v-on:click="showDetails(apartment.id)">
          {{ apartment.name }}
          {{ apartment.location }}
          {{ apartment.bedrooms }}
          {{ apartment.bathrooms }}
          {{ apartment.price }}
        </a>
        <ApartmentInfo @cancel="cancelled" class="conditional" :apartment="apartment"></ApartmentInfo>
      </p>
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
    showDetails (id) {
      this.currentApartment = id;
    },
    isActive (apartment) {
      console.log(apartment);
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
