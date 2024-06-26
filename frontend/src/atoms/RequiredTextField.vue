<template>
  <v-text-field
    :bg-color="bgColor"
    :clearable="clearable"
    :label="label"
    :rows="rows"
    :rules="[isRequired]"
    :type="type"
    density="compact"
    variant="outlined"
    v-model="input"
  ></v-text-field>
</template>

<script lang="ts" setup>
import { MESSAGE } from "@/constants/Message";
defineProps({
  bgColor: {
    type: String,
    required: false,
    default: undefined,
  },
  clearable: {
    type: Boolean,
    required: false,
    default: true,
  },
  label: {
    type: String,
    required: false,
  },
  rows: {
    type: String,
    required: false,
    default: "1",
  },
  type: {
    type: String,
    required: false,
    default: "text",
  },
});

const input = defineModel("input", {
  type: String,
  default: "",
});

/**
 * Check if the input exists
 *
 * @returns {boolean | string}
 * @author Yuto Saito
 */
function isRequired(): boolean | string {
  return input.value.length > 0 || MESSAGE.FIELD.REQUIRED;
}
</script>
