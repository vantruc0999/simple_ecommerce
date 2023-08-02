<template>
  <Navbar></Navbar>
  <RouterView />
</template>
<script>
import Navbar from "./views/Navbar.vue";
export default {
  components: { Navbar },
};
</script>

<style>
</style>