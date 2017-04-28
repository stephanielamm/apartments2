<template lang="html">
      <div class="ApartmentList" @click="chosen">

      <!--  v-for, on click it shows a component where you pass the id of the apartment and that component pulls all the info about the apartment or just shows that. -->
        </div>
</template>

<script>
import axios from 'axios';
// import ApartmentInfo from './ApartmentInfo';

export default {
  components: {
    // ApartmentInfo
  },

  mounted () {

  },

  props: [
    'apartment'
  ],

  data () {
    return {
      // name: this.name,
      // location: this.location,
      // bedrooms: this.bedrooms,
      // bathrooms: this.bathrooms,
      // price: this.price
    }
  },
  methods: {
    chosen () {
      this.$emit('selected', this.apartment)
    },
    cancel () {
      this.currentApartment =false;
    }
  }
}
</script>

<style lang="css">
</style>
