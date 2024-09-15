import { describe, it, expect } from 'vitest'

import { mount } from '@vue/test-utils'
import JobDetail from '../JobDetail.vue'

describe('JobDetail', () => {
  it('render nok state', () => {
    const wrapper = mount(
      JobDetail,
      { props: { logo: 'https://logo', data: '{ "foo": 1 }' } },
    )

    expect(wrapper.html()).toMatchSnapshot()
  })

  it('render ok state', () => {
    const wrapper = mount(
      JobDetail,
      { props: {
        logo: 'https://logo',
          data: '{ "jobId": 123, "title": "job Title", "contact": { "email": "email" }, "description": "abc" }',
      } },
    )

    expect(wrapper.html()).toMatchSnapshot()
  })
})
