<script setup lang="ts">
import {computed} from "vue";
import type {JobType} from "@/types/JobType.ts";
import JobAnswer from "@/components/JobAnswer.vue";
import TryAgain from "@/components/TryAgain.vue";

const props = defineProps<{
  logo: string,
  data: string,
}>()

const jobData = computed<JobType>(() => JSON.parse(props.data))
const hasData = computed(() => jobData.value.title && jobData.value.description && jobData.value.contact)
</script>

<template>
  <div v-if="hasData" class="text-center">
    <img class="d-block mx-auto mb-4" :src="logo" alt="60" height="60">

    <h1 class="display-5 fw-bold">{{ jobData.title }}</h1>

    <p class="mb-10" style="color: #8eb4ff">
      <span class="text-dark">E-mail: </span>{{ jobData.contact.email }}
    </p>
  </div>

  <TryAgain v-else />

  <div v-if="hasData" class="col-lg-6 mx-auto job-body">
    <span v-html="jobData.description" />
    <JobAnswer :job-id="jobData.jobId" />
  </div>
</template>

<style scoped>
:deep(.image img) {
  width: -webkit-fill-available;
}
</style>
