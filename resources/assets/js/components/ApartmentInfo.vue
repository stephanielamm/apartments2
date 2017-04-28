<template>
  <div class="ApartmentInfo">
    <div class="row">

      <div v-if="UpdateForm">
        <ApartmentUpdate :apartment="apartment" @updated="updated"></ApartmentUpdate>
      </div>
    </div>

      <div v-else>

          <a href="#" class="edit-link" @click="showEditing()">edit</a>

          <!--BOTTOM OF FORUM-->
            <div class="row">
              <div class="col-md-12">
                  <p class="info"> {{ apartment.name }} </p>
                  <p class="info"> {{ apartment.location }} </p>
                  <p class="info"> {{ apartment.bedrooms }} </p>
                  <p class="info"> {{ apartment.bathrooms }} </p>
                  <p class="info"> {{ apartment.price }} </p>
                  <button type="button" class="btn btn-danger" @click="remove()" >Delete</button>
              </div>
            </div>
          </div>
        </div>

</template>

<script>
import axios from 'axios';
import ApartmentUpdate from './ApartmentUpdate'

export default {
  components: {
    ApartmentUpdate
  },
  name: 'ApartmentInfo',
  mounted () {
    console.log('ApartmentInfo -> mounted', this.apartment)
  },
  props: [
    'apartment'
  ],
  data () {
    return {
      UpdateForm: false
    }
  },
  methods: {
    showEditing () {
      this.UpdateForm = true
    },
    updated (e) {
      this.$emit('updated', e);
    },
    remove (i) {
      console.log(`App -> remove ID ${i}`);
      axios.delete(`/apartments/${this.apartment.id}`)
      .then((response) => {
        console.log('Apartment -> update success');
        this.$emit('deleted', this.apartment);
      })
      .catch((error) => {
        console.log('Apartment -> save error');
      })
    }
    }
  }
</script>
<style lang="css">
</style>
