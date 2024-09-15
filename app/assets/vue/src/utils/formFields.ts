import type {NewAnswerField} from "@/types/FormType.ts";

export const jobAnswerFormFields: Array<NewAnswerField> = [
  {
    label: 'Full Name',
    type: 'text',
    id: 'name',
    placeholder: 'Your full name',
    required: true,
    attrs: {
      minlength: 10,
      maxlength: 50,
    },
  },
  {
    label: 'Email address',
    type: 'email',
    id: 'email',
    placeholder: 'Your e-mail address',
    required: true,
    attrs: {
      minlength: 5,
      maxlength: 50,
    },
  },
  {
    label: 'Phone',
    type: 'tel',
    id: 'phone',
    placeholder: 'Your phone number',
    required: false,
    attrs: {
      pattern: '[\+][0-9]{3}[1-9]{3}[0-9]{6}',
    },
  },
  {
    label: 'Linkedin',
    type: 'text',
    id: 'linkedin',
    placeholder: 'Your Linkedin',
    required: true,
    attrs: {
      minlength: 5,
      maxlength: 300,
      pattern: 'https:\/\/linkedin.com\/in\/.+',
    },
  },
  {
    label: 'Facebook',
    type: 'text',
    id: 'facebook',
    placeholder: 'Your Facebook',
    required: false,
    attrs: {
      minlength: 20,
      maxlength: 100,
      pattern: 'https:\/\/www.facebook.com\/.+',
    },
  },
  {
    label: 'Twitter',
    type: 'text',
    id: 'twitter',
    placeholder: 'Your Twitter',
    required: false,
    attrs: {
      minlength: 20,
      maxlength: 100,
      pattern: 'https:\/\/twitter.com\/.+',
    },
  },
]
