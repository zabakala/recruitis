import {Api} from "@/api/enum.ts";
import type {JobNewAnswerType} from "@/types/JobType.ts";
import {post} from "@/utils/apiClient.ts";

export async function createNewAnswer(payload: JobNewAnswerType) {
  const response = await post<JobNewAnswerType>(Api.base + Api.answers, payload)

  return response.json()
}
