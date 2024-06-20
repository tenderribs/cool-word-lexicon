<script setup lang="ts">
import type { Post } from '@/models/post';
import { onMounted, type Ref, ref } from 'vue';
import PostCard from '@/components/PostCard.vue';
import { request } from '@/webservice'

const posts: Ref<Post[]> = ref([])
const newPost: Ref<Post> = ref({} as Post)
const get = async () => {
  posts.value = await request<Post[]>("get", "posts")
}

onMounted(() => {
  console.log("in onMounted function")
  get()
})


const create = async () => {
  await request<Post>("post", "posts", newPost.value).then(() => {
    get()
    showModal.value=false
  })
}


const showModal: Ref<boolean> = ref(false)


</script>

<template>
  <div style="background-image: url(src/assets/water.gif); background-size: cover; width: 100%; height: 100%; position: absolute;" >
    <h1>Youngster termS</h1>
    <div style="display: flex; justify-content: center; margin-bottom: 40px;">
      <p @click="showModal = !showModal" style="border: 4px solid black; display: flex; background-color: aquamarine; padding: 15px; font-family: Type2;">Create new post</p>
      <div v-if="showModal" style="display: flex; flex-direction: column; width: 20%;">
        <input v-model="newPost.term" placeholder="Term">
        <input v-model="newPost.description" placeholder="Description">
        <input v-model="newPost.usage" placeholder="Usage">
        <b-button @click="create" style="user-select: none; border-radius: 5px; padding: 4px; cursor: pointer; padding-right: 10px; margin-bottom: 5px; padding-left: 5px; border: 2px solid black; background-color: greenyellow; font-size: 20px;">Create</b-button>
      </div>
    </div>
    <div class="container">
      <PostCard v-for="post in posts" :post="post" @liked="get" style="margin-bottom: 10px;"/>
    </div>
  </div>
</template>
 <style scoped>
h1 {
  font-family: Metallica;
  padding-top: 70px;
  display: flex;
  justify-content: center;
  font-size: 70px;
  color: blueviolet;
}

.container {
  display: flex;
  justify-content: center;
  flex-direction: column;
  align-items: center;
}
</style>