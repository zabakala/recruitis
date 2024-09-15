<script setup lang="ts">
import JobDetail from '../components/JobDetail.vue'
import {jobDetailDomId} from "@/utils/selectors.ts";
import {getDomElementAttribute} from "@/utils/dom.ts";

const jobData = getDomElementAttribute(jobDetailDomId, 'data-job')
const logo = getDomElementAttribute(jobDetailDomId, 'data-logo')
</script>

<template>
  <JobDetail v-if="logo && jobData" :data="jobData" :logo="logo" />
</template>

<style scoped>
</style>
