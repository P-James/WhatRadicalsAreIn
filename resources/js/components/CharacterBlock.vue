<template>
  <div class="bg-offWhite text-darkBlue w-1/4 md:w-48 border rounded-lg p-4 shadow-lg m-1 md:m-4">
    <div class="flex justify-center text-lg">
      <span>{{this.$props.character}}</span>
    </div>

    <div>
      Radical:
      <span>{{this.$props.radical}}</span>
    </div>

    <div class="hidden sm:block">
      Stroke Count:
      <span>{{this.$props.strokeCount}}</span>
    </div>

    <div class="hidden sm:block" v-if="this.$props.variants">
      Radical Variants:
      <span>{{this.$props.radicalVariants}}</span>
    </div>

    <div class="hidden sm:block">
      Pinyin:
      <span>{{this.$props.pinyin}}</span>
    </div>
    <div class="break-words hidden sm:block">
      English:
      <span>{{this.$props.english}}</span>
    </div>
  </div>
</template>

<script>
export default {
  props: ["character", "radical", "strokeCount", "variants", "pinyin", "english"],
};
</script>

<style>
</style>