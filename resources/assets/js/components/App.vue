<template lang="html">
<div class="app">
<div class="App">
  <Top></Top>
  <ApartmentList></ApartmentList>
</div>
</div>
</template>

<script>
  import axios from 'axios';
  import Top from './Top';
  import ApartmentList from './ApartmentList';
  import ApartmentInfo from './ApartmentInfo';

  export default {
    components: {
    Top,
    ApartmentList,
    ApartmentInfo
    },
    data() {
      return {
        apartments: []
      }
    },
    mounted () {
      this.fetch();
    },
    methods: {
      // GET method
      fetch() {
        console.log('App -> fetch success');
        axios.get('/apartments')
        .then((response) => {
          console.log(response.data);
          this.apartments = response.data;
        })
        .catch((response) => {
          console.log('App -> fetch error');
        })
      }
    }
  }
    </script>

<style lang="css">
</style>
