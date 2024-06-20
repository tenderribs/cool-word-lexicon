<script setup lang="ts">
import type { Post } from '@/models/post';
import { request }  from "@/webservice"

import { computed } from 'vue';

const props = defineProps<{
  post: Post
}>()

const emit = defineEmits(['liked'])

const like = () => {
  console.log("liking post")

  request("post", "post/like", {id: props.post.id}).then(() => {
    emit('liked')
  })
}


const degrees = computed((): string => {
  const x = Math.floor((Math.random() * 20  ) - 10);
  console.log("randomg angle")
  return `rotate: ${x}deg;`
})


</script>



<template>
  <div class="card" :style="degrees">
    <div>
      <h2 style="display: flex; justify-content: center;">{{ post.term }} </h2> 
    </div>
    <div style="position: absolute; top: 5px; right: 10px; line-height: 25%;">
        <p class="date">created at: </p>
        <p class="date">{{ post.created_at.slice(0,10)}}</p>
      </div>
    <p class="main-text">{{ post.description }} </p>
    <p class="main-text" style="font-style: italic;">{{ post.usage }}</p>
    <div style="display: flex; justify-content: center; font-family: metal;">
      <b-button @click="like" style="user-select: none; border-radius: 5px; padding: 4px; cursor: pointer; padding-right: 10px; margin-bottom: 5px; padding-left: 5px; border: 2px solid black; background-color: greenyellow; font-size: 20px;">Likes {{ post.likes }}</b-button>
    </div> 
  </div>
</template>

<style scoped>
h2 {
  font-family: OldGate;
  font-size: 50px;
  font-weight: 1;
  display: flex;
  line-height: 25%;
}
.main-text {
  line-height: 150%
}

.date {
  font-size: 15px;
}
p {
  font-family: Type2;
  font-size: 20px;
  text-align: center;
  
}

.card {
  border: 5px solid black; width: 30vw; background-color: antiquewhite;
}
</style>
