<template>
  <div>
    <div>
      Radical:
      <span>{{this.$props.radical}}</span>
    </div>
    <div>
      Character:
      <span>{{this.$props.character}}</span>
    </div>
    <div>
      Pinyin:
      <span>{{this.$props.pinyin}}</span>
    </div>
    <div>
      English:
      <span>{{this.$props.english}}</span>
    </div>
  </div>
</template>

<script>
export default {
  props: ["radical", "character", "pinyin", "english"]
};
</script>

<style>
</style>