<template>
  <div class="contact">
    <h1>This is Contact Page</h1>
    <h3>Contact page content</h3>
    <p>
      Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloremque ad
      nemo cupiditate amet, sit eius id temporibus nostrum eum fugit.
      Perferendis ut nulla consequuntur. Exercitationem tenetur vero, voluptas
      praesentium nam amet, porro veniam quas modi explicabo laudantium magnam
      non, reprehenderit in nihil doloremque! Nesciunt corporis suscipit
      eligendi tempora ab culpa iste facilis, soluta ex aliquam iure sit!
      Officia, velit sunt? Nesciunt soluta obcaecati rerum alias amet
      perspiciatis, necessitatibus voluptates magni quia cupiditate beatae ad
      dignissimos! Quasi reprehenderit accusamus et nihil dolorum saepe
      architecto, est molestiae quos repudiandae perferendis totam voluptatibus
      atque in natus quia placeat hic non eos consequuntur ea!
    </p>
    <button class="btn btn-primary" @click="increaseNumber">Increase</button> 
    <h3>{{ number }}</h3>
    <button class="btn btn-danger" @click="decreaseNumber">Decrease</button>
  </div>
</template>
 
 <script>
export default {
  data(){
    return {
      number : 0
    }
  },
  methods : {
    
  },
  computed : {
    increaseNumber(){
      this.number++
    },
    decreaseNumber(){
      this.number--
    }
  }
};
</script>
 
 <style scoped>
.contact {
  padding: 50px;
}
</style>