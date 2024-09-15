import './assets/main.css'

import { createApp } from 'vue'
import {getDomElement} from "@/utils/dom.ts";
import JobsList from './pages/JobsList.vue'
import JobDetail from './pages/JobDetail.vue'
import {jobDetailDomId, jobsListDomId} from "@/utils/selectors.ts";

if (getDomElement(jobDetailDomId)) createApp(JobDetail).mount(jobDetailDomId)
if (getDomElement(jobsListDomId)) createApp(JobsList).mount(jobsListDomId)
