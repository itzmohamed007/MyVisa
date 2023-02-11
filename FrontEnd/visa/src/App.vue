<template>
    <h3 class="text-center my-5">Enter these informations:</h3>
    <Form/>
    <Home/>
</template>

<script>
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap/dist/js/bootstrap.js'
import Form from './components/ReservationForm.vue'
import Home from './components/HomePage.vue'
export default {
    name: 'App',
    components: {
        Form,
        Home
    }
}
</script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&display=swap');
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

body {
  font-family: 'Poppins', sans-serif;
}   
</style>
 