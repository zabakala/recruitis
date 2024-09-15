<script setup lang="ts">
import {reloadWindow} from "@/utils/dom.ts";
</script>

<template>
  <div>
    Data not loaded. <a @click.prevent="reloadWindow()">Try again</a>.
  </div>
</template>

<style scoped>
a {
  cursor: pointer;
  text-decoration: underline !important;
}

a:hover {
  text-decoration: none !important;
}
</style>
