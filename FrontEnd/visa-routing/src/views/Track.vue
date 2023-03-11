<template>
  <section class="registration d-flex flex-column align-items-center justify-content-center">
    <div class="home">
      <div class="form-floating mb-3">
        <input class="form-control" type="text" placeholder="Access Token" v-model="token"/>
        <label for="phone">Access Token</label>
      </div>
      <p class="bg-danger text-white rounded">{{ token_error }}</p>
      <p class="bg-warning text-white rounded">{{ token_not_found }}</p>
      <p class="bg-success text-white rounded">{{ token_found }}</p>
      <button class="track btn" @click="getData()">Track</button>
    </div>
  </section>
  <section class="mb-5 data rounded d-flex flex-column justify-content-center" v-if="visible">
    <h2>Happy To See You Back <span class="fw-bold text-white">{{ name }}</span></h2>
    <div class="fs-6 text-start mx-5 text-black">
      <p class="">Token: <span class="text-white fw-bold">{{ token }}</span></p> 
      <p class="">Birth Date: <span class="text-white fw-bold">{{ naissance }}</span></p> 
      <p class="">Nationality: <span class="text-white fw-bold">{{ nationalite }}</span></p>  
      <p class="">Familial Situation: <span class="text-white fw-bold">{{ situation }}</span></p>  
      <p class="">Email Address: <span class="text-white fw-bold">{{ address }}</span></p>  
      <p class="">Visa Type: <span class="text-white fw-bold">{{ type_visa }}</span></p>  
      <p class="">Check-In Date: <span class="text-white fw-bold">{{ date_depart }}</span></p>  
      <p class="">Check-Out Date: <span class="text-white fw-bold">{{ date_arriver }}</span></p>  
      <p class="">Document Type: <span class="text-white fw-bold">{{ type_document }}</span></p>  
      <p class="">Document Number: <span class="text-white fw-bold">{{ numero_document }}</span></p>  
      <p class="">Status: <span class="text-white fw-bold">In Progress</span></p> 
    </div>
    <div class="options d-flex justify-content-between mt-5">
      <button class="btn bg-success text-white rounded-5 update">Update</button>
      <button class="btn bg-danger text-white rounded-5 update">Delete</button>
    </div>
  </section>
</template>

<script>
import axios from 'axios'
export default {
  data() {
    return {
      visible: false,
      token: '',
      token_error: '',
      token_found: '',
      token_not_found: '',
      name: 'Mohamed Bourra',
      naissance: '',
      nationalite: '',
      situation: '',
      address: '',
      type_visa: '',
      date_depart: '',
      date_arriver: '',
      type_document: '',
      numero_document: ''
    }
  },
  methods: {
    async getData() {
      if(this.token == '') {
        this.token_error = 'Token Field Cannot Be Empty'
        this.token_found = ''
        this.token_not_found = ''
        this.visible = false
      } else {
        let response = await axios.get('http://localhost/MyVisa/backend/api/clients/updateData.php?token=' + this.token)
        if(response.data.address != undefined) {
          console.log(response.data)
          this.visible = true
          this.token_found = 'Token Found!'
          this.token_not_found = ''
          this.token_error = ''

          this.address = response.data.address
          this.date_depart = response.data.date_depart
          this.date_arriver = response.data.date_arriver
          this.naissance = response.data.naissance
          this.nationalite = response.data.nationalite
          this.numero_document = response.data.numero_document
          this.type_document = response.data.type_document
          this.type_visa = response.data.type_visa
          this.situation = response.data.situation
        } else {
          this.token_not_found = 'Token Not Found'
          this.token_error = ''
          this.token_found = ''
          this.visible = false
        }
      }
    }
  }
}
</script>


<style scoped>
.options {
  align-self: center;
  width: 25%;
}
.home {
  width: 35%;
}
.data {
  padding: 5rem 1rem;
  min-height: 100vh;
  margin: 0 4rem;
  background-color: rgb(215, 215, 215)!important;
}
.data h2 {
  margin-bottom: 4rem;
}
.registration {
  height: 75vh;
}
.track {
  padding: 10px 40px;
  background-color: black;
  color: white;
  border-radius: 30px;
  transition: .3s ease-in-out;
}
.track:hover {
  background-color: rgb(179, 179, 179);
}
@media (max-width: 765px) {
  .home {
    width: 80%!important;
  }
  .options {
    width: 100%;
    padding: 0 3rem;
  }
  .data {
    padding: 2rem 0;
  }
  .data p {
    font-size: 10px;
  }
  .data h2 {
    font-size: 20px;
  }
}
</style>