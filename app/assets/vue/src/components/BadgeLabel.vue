<script setup lang="ts">
import type {BadgeType} from "@/api/label.ts";

defineProps<{
  label: string,
  type: BadgeType,
}>()
</script>

<template>
  <span class="badge" :class="`badge-${type}`" v-text="label" />
</template>

<style scoped>
.badge {
  font-size: 1em;
}

.badge-success {
  background-color: #28a745;
}

.badge-danger {
  background-color: #dc3545;
}
</style>
