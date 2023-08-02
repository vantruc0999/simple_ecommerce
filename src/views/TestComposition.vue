<template>
  <div class="container">
    <h1>{{ firstName }}</h1>
    <input type="text" v-model="searchText" />
    <ul>
      <li v-for="(player, index) in playersFiltered" :key="index">
        {{ player }}
      </li>
    </ul>
    <button @click="onChangeSomething" class="btn btn-primary">
      Click here
    </button>
  </div>
</template>

<script>
import { ref, reactive, computed, watch } from "vue";
export default {
  props: {
    theme:{
        type: String,
        default : "dark",
    }
  },
  setup(props, context) {
    console.log(props)
    console.log(context)
    
    const searchText = ref("");
    const firstName = ref("Truc");

    let players = reactive([
      "S1mple",
      "S1mp",
      "Niko",
      "Stew",
      "Twistzz",
      "Elige",
      "Zywoo",
    ]);

    const playersFiltered = computed(() =>
      players
        .map((player) => {
          player = player.toLowerCase();
          return player;
        })
        .filter((player) =>
          player.includes(searchText.value.toLocaleLowerCase())
        )
    );

    watch(searchText, (newValue, oldValue) => {
      console.log(newValue, oldValue);
    });

    let car = reactive({
      price: 50000,
      name: "Mercedes",
    });
    let phone = ref({
      price: 1000,
      name: "Samsung",
    });

    function onChangeSomething() {
      phone.value = {
        price: 2000,
        name: "Xiaomi",
      };

      car = {
        price: 200000,
        name: "Rollroyce",
      };
    }
    return {
      phone,
      car,
      firstName,
      onChangeSomething,
      searchText,
      playersFiltered,
    };
  },
};
</script>

<style>
</style>