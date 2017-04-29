<template lang="html">
<div class="App">
  <Top></Top>
  <div class="container-fluid list">
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
      },
      update (data) {
      this.fetch();
     var i = this.apartments.indexOf(data.apartment);
     for (var d in data) {
       this.apartments[i][d] = data[d];
     }
   },
   remove (i) {
     console.log(`App -> remove ID: ${i}`);
     this.apartments.splice(i, 1);
   }
    }
  }
    </script>

<style lang="css">
.list {
}
</style>
