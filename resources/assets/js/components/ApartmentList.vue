<template lang="html">
      <div class="ApartmentList">

      <div>
        <p v-for="apartment in apartments">
          {{ apartment.name }}
          {{ apartment.location }}
          {{ apartment.bedrooms }}
          {{ apartment.bathrooms }}
          {{ apartment.price }}
        </p>
      </div>

      <!--  v-for, on click it shows a component where you pass the id of the apartment and that component pulls all the info about the apartment or just shows that. -->
      <button>Create Button Goes Here</button>
        </div>
</template>

<script>
import axios from 'axios';

export default {
  components: {
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
      apartments: []
    }
  },
  methods: {

  }
}
</script>

<style lang="css">
</style>
