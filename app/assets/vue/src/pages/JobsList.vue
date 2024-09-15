<script setup lang="ts">
import JobsList from '../components/JobsList.vue'
import {jobsListDomId} from "@/utils/selectors.ts";
import {getDomElementAttribute} from "@/utils/dom.ts";

const jobsData = getDomElementAttribute(jobsListDomId, 'data-jobs')
const logo = getDomElementAttribute(jobsListDomId, 'data-logo')
</script>

<template>
  <JobsList v-if="logo && jobsData" :data="jobsData" :logo="logo" />
</template>

<style scoped>
</style>
