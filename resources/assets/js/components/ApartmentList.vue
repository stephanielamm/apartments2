<template lang="html">
      <div class="ApartmentList">

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

  },

  props: [
    'apartment'
  ],

  data () {
    return {
    }
  },
  methods: {

  }
}
</script>

<style lang="css">
</style>
