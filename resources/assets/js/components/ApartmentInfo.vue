<template>
  <!--Input form-->
  <div class="ApartmentInfo">
        <div class="col-md-12">
          <h1 class="formTitle">Apartment</h1>
        </div>
        <div class="col-md-12">
       <div class="col-md-6">
         <div class="form-group">
           <input class="form-control" type="text" v-model="name" />
         </div>
       </div>
       <div class="col-md-6">
         <div class="form-group">
           <input class="form-control" type="text" v-model="location" />
         </div>
       </div>
       <div class="col-md-6">
         <div class="form-group">
           <input class="form-control" type="text" v-model="bedrooms" />
         </div>
       </div>
       <div class="col-md-6">
         <div class="form-group">
           <input class="form-control" type="text" v-model="bathrooms" />
         </div>
       </div>
       <div class="col-md-6">
         <div class="form-group">
           <input class="form-control" type="text" v-model="price" />
         </div>
       </div>
       <!--Save button-->
       <div class="col-md-12">
            <button class="btn btn-primary pull-right create" @click="save()">Save</button>
      </div>
      <!--Delete button-->
      <div class="col-md-12">
           <button class="btn btn-primary pull-right remove" @click="remove()">Delete</button>
     </div>
     <!--Cancel button-->
     <div class="col-md-12">
          <button class="btn btn-primary pull-right cancel" @click="cancel()">Cancel</button>
    </div>
     </div>
    </div>


</template>

<script>
import axios from 'axios';

export default {

    mounted () {
    console.log('ApartmentInfo -> mounted', this.apartment)
  },
  props: [
    'apartment'
  ],
  data () {
    return {
  //    UpdateForm: false
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
      });
    },
   save () {
      console.log('Apartment -> save');
      axios.put(`/apartments/${this.apartment.id}`, {
        name: this.name,
        location: this.location,
        bedrooms: this.bedrooms,
        bathrooms: this.bathrooms,
        price: this.price
      })
        .then((response) => {
          console.log('Apartment -> save success');
          this.$emit('updated', {
            name: this.name,
            location: this.location,
            bedrooms: this.bedrooms,
            bathrooms: this.bathrooms,
            price: this.price
          });
          this.editing = false;
        })
          .catch((error) => {
            console.log('Apartment -> save error');
              //*show the user that it couldn't be updated*
            });
        },
        cancel () {
          console.log('Apartment -> cancel');
          this.name = this.apartment.name;
          this.location = this.apartment.location;
          this.bedrooms = this.apartment.bedrooms;
          this.bathrooms = this.apartment.bathrooms;
          this.price = this.apartment.price;
          this.editing = false;
        }
      }
    }

</script>
<style lang="css">
</style>
