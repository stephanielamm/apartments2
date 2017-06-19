<template>
  <div class="ApartmentInfo">

    <!--Cancel button-->
    <div class="col-md-12">
         <button class="btn btn-primary pull-right cancel" @click="cancel()">Cancel</button>
   </div>
   <!--Editing form-->
        <div class="col-md-12">
          <h1 class="formTitle">Edit</h1>
        </div>
       <div class="col-md-6">
         <div class="form-group">
           <input class="form-control" type="text" v-model="name"/>
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
       <div class="col-md-6">
            <button class="btn btn-primary pull-right create" @click="save()">Save</button>

      <!--Delete button-->
           <button class="btn btn-primary pull-left remove" @click="remove(apartment.id)">Delete</button>
     </div>
    </div>


</template>

<script>
import axios from 'axios';
export default {
  data () {
    return {
     name: this.apartment.name,
     location: this.apartment.location,
     bedrooms: this.apartment.bedrooms,
     bathrooms: this.apartment.bathrooms,
     price: this.apartment.price
   }
  },
  mounted () {
    console.log('ApartmentInfo -> mounted', this.apartment);
  },
  props: [
    'apartments',
    'apartment',
    'currentApartment'
  ],
  methods: {
    remove (i) {
      console.log(i);
      // console.log('App -> remove ID ${i}');
     this.apartments.splice(i, 1);
      // axios.delete('/apartments/${this.apartment.id}')
      // .then((response) => {
      //   console.log('Apartment -> update success');
      //   this.$emit('remove);
      // });
     this.$emit('remove');
    },
        cancel () {
          console.log('Apartment -> cancel');
          this.name = this.apartment.name;
          this.location = this.apartment.location;
          this.bedrooms = this.apartment.bedrooms;
          this.bathrooms = this.apartment.bathrooms;
          this.price = this.apartment.price;
          this.editing = false;
          this.$emit('cancel');
        }
      }
    }
</script>
<style lang="css">
</style>
