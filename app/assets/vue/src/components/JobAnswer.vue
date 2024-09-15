<script setup lang="ts">
import {computed, ref} from "vue";
import {createNewAnswer} from "@/api/repository.ts";
import type {JobNewAnswerType} from "@/types/JobType.ts";
import BadgeLabel from "@/components/BadgeLabel.vue";
import {BadgeType} from "@/api/label.ts";
import {jobAnswerFormFields} from "@/utils/formFields.ts";

const props = defineProps<{
  jobId: string,
}>()

const values = ref<JobNewAnswerType>(
  jobAnswerFormFields.reduce((acc, { id }) => ({ ...acc, [id]: '' }), {} as JobNewAnswerType),
)

const showSubmitButton = computed(() => isError.value !== false)
const showNokBadge = computed(() => isError.value === true)
const showOkBadge = computed(() => isError.value === false)

const isError = ref<null | boolean>(null)

const submit = async () => {
  const { error } = await createNewAnswer({ ...values.value, jobId: props.jobId, job_id: props.jobId })
  isError.value = !!error
}
</script>

<template>
  <form @submit.prevent="submit">
    <div class="form-group" v-for="{
      label,
      type,
      id,
      placeholder,
      required,
      attrs,
    } in jobAnswerFormFields" :key="id">

      <label :for="id">{{ label }}</label>

      <input
        :type="type"
        v-model="values[id]"
        class="mb-3 form-control"
        :id="id"
        :required="required"
        :placeholder="placeholder"
        v-bind="attrs"
      >
    </div>

    <input type="hidden" id="jobId" :value="jobId" />

    <button v-if="showSubmitButton" type="submit" class="btn btn-primary">Odpovědět na nabídku</button>

    <BadgeLabel v-if="showOkBadge" :type="BadgeType.Success" label="Děkujeme, budeme vás kontaktovat" />
    <BadgeLabel v-if="showNokBadge" :type="BadgeType.Danger" label="Zkuste prosím znovu" />
  </form>
</template>

<style scoped>
form {
  border: 1px solid #0000001f;
  padding: 12px;
}

button[type=submit] {
  margin-right: 20px;
}
</style>
