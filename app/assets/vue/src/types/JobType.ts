import type {ContactType} from "@/types/ContactType.ts";
import type {PersonalistType} from "@/types/PersonalistType.ts";

export type JobType = {
  jobId: string;
  draft: boolean;
  active: boolean;
  title: string;
  description: string;
  contact: ContactType;
  personalist: PersonalistType;
}

export type JobNewAnswerType = Record<string, string | number> & {
  jobId: string;
  fullName: string;
  email: string;
  phone: string;
  linkedin: string;
  facebook: string;
  twitter: string;
}
