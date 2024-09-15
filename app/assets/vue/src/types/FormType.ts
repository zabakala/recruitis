export type NewAnswerField = {
  label: string;
  type: string;
  id: string;
  placeholder: string;
  required: boolean;
  attrs: { minlength?: number; maxlength?: number, pattern?: string };
}
