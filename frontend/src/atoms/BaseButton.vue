<template>
  <v-btn
    :block="block"
    :color="color"
    :text="text"
    variant="tonal"
    v-show="isShow"
  >
  </v-btn>
</template>

<script lang="ts" setup>
import { UI } from "@/constants/UI";

defineProps({
  block: {
    type: Boolean,
    required: false,
    default: true,
  },
  color: {
    type: String,
    required: false,
    default: UI.COLOR.PURPLE,
  },
  isShow: {
    type: Boolean,
    required: false,
    default: true,
  },
  text: {
    type: String,
    required: true,
  },
});
</script>
