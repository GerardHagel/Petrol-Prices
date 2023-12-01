
<template>
  <div class="horizontal-menu">
    <router-link to="/">Home</router-link>
    <router-link to="/about">About</router-link>
    <router-link to="/contact">Contact</router-link>
    <router-link to="/login">Login</router-link>
    
    
  </div>
</template>

<script>
export default {
 
};
</script>


<style>



body{
  background-color:gainsboro;
  margin: 0;
  padding: 0;
 
}
.horizontal-menu {
  justify-content: center;
  display: flex;
  list-style: none;
  padding: 0;
  

}

.horizontal-menu router-link {
  background-color: aquamarine;
  text-align: center;
  width: 15%;
  height: 10%;
  margin: 5px;
  text-decoration: none;
  color: #333;
  font-size: 24px;
  padding: 10px;
}

.horizontal-menu router-link:hover {
  color: #007bff;
}
</style>
