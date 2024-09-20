<template>
    <div class="flex w-full h-full justify-center">
        <img :src="imageUrl" style="width: 30%; height: 30%; object-fit: cover;" />
    </div>
    
</template>

<script>
export default {
  data() {
    return {
      imageUrl: `/img/pokedb_logo.png`
    };
  }
};
</script>