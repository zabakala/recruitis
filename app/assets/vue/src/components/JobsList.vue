<script setup lang="ts">
import {computed} from "vue";
import type {JobType} from "@/types/JobType.ts";
import {buildSeo, replaceAccents} from "@/utils/string.ts";

const props = defineProps<{
  logo: string,
  data: string,
}>()

const jobData = computed<JobType[]>(() => JSON.parse(props.data))
const hasData = computed(() => jobData.value.length > 0)

function url(job: JobType) {
  return `/job/${job.jobId}/${buildSeo(replaceAccents(job.title))}`
}
</script>

<template>
  <section v-if="hasData" class="py-6 bg-light-primary">
    <div class="container">
      <div class="row justify-content-center text-center mb-4">
        <div class="col-xl-6 col-lg-8 col-sm-10">
          <h2 class="font-weight-bold">The Perfect Blend of <span class="subtitle">JOB</span> Offers</h2>
          <p class="text-muted mb-0">We bring you jobs helping you earn a developer post inside our company.</p>
        </div>
      </div>

      <div class="row row-cols-lg-3 row-cols-md-2 row-cols-1 text-center px-xl-6 aos-init aos-animate" data-aos="fade-up">
        <div v-for="job in jobData" :key="job.jobId" class="col my-3">
          <div class="card border-hover-primary hover-scale">
            <div class="card-body">
              <div class="text-primary mb-5">
                <img class="d-block mx-auto mb-4" :src="logo" alt="60" height="60">
              </div>
              <h6 class="font-weight-bold mb-3">
                <a :href="url(job)">{{ job.title }}</a>
              </h6>
              <p class="mb-0 by"><span class="text-dark">By: </span>{{ job.personalist.name }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>
.by {
  color: #8eb4ff
}

.subtitle {
  color: crimson
}

section {
  margin-bottom: 20px;
}

.bg-light-primary {
  background-color: #f9fbff !important;
}

h6 {
  min-height: 50px;
  display: flex;
  justify-content: center;
  background: #f3f5fa70;
  border-radius: 5px;;
}

h6 a {
  align-self: center;
  padding: 10px;
}

.py-6 {
  padding-bottom: 3.75rem !important;
}

.py-6 {
  padding-top: 3.75rem !important;
}

.hover-scale, .hover-scale:hover {
  transition: transform .2s ease-in;
}

.card {
  position: relative;
  display: flex;
  flex-direction: column;
  height: 100%;
  min-width: 0;
  word-wrap: break-word;
  background-color: #fff;
  background-clip: border-box;
  border: 1px solid rgba(0,0,0,.125);
  border-radius: .4rem;
  box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
}

.card-body {
  flex: 1 1 auto;
  min-height: 1px;
  padding: 1.25rem;
}

.card-body img {
  border-radius: 10px;
}
</style>
