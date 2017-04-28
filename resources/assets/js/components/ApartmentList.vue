<template lang="html">
      <div class="ApartmentList">
      <div class="container">
        <div class="row">
        <p v-for="apartment in apartments" :class="{ active: isActive(apartment) }">
          <a href="#" v-on:click="showDetails(apartment.id)">
            {{ apartment.name }}
            {{ apartment.location }}
            {{ apartment.bedrooms }}
            {{ apartment.bathrooms }}
            {{ apartment.price }}
            <ApartmentInfo class="conditional" :apartment="apartment">
            </ApartmentInfo>
          </a>
        </p>
      </div>
    </div>
      <button>Create Button Goes Here</button>
        </div>
</template>

<script>
import axios from 'axios';
import ApartmentInfo from './ApartmentInfo';

export default {
  components: {
    ApartmentInfo
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
      apartments: []
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
