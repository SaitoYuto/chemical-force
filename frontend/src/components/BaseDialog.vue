<template>
  <v-dialog v-model="visibility" max-width="500">
    <v-card :title="title">
      <v-card-text v-for="message in messages" class="text-center">
        {{ message }}
      </v-card-text>
      <v-card-actions>
        <v-spacer></v-spacer>
        <BaseButton
          :text="UI.LABEL.CLOSE"
          :block="false"
          @click="close"
        ></BaseButton>
        <BaseButton
          :text="UI.LABEL.OK"
          :block="false"
          v-show="showOK"
          @click="emit('ok')"
        ></BaseButton>
      </v-card-actions>
    </v-card>
  </v-dialog>
</template>

<script lang="ts" setup>
import BaseButton from "@/atoms/BaseButton.vue";
import { UI } from "@/constants/UI";

defineExpose({
  open,
  close,
});

defineProps({
  title: {
    type: String,
    required: false,
    default: "",
  },
  showOK: {
    type: Boolean,
    required: false,
    default: true,
  },
});

const emit = defineEmits();
const messages = ref([] as string[]);
const visibility = defineModel("visibility", {
  type: Boolean,
  default: false,
});

/**
 * Open dialog
 *
 * @params {string} text
 * @returns {void}
 * @author Yuto Saito
 */
function open(texts: string[]): void {
  messages.value = texts;
  visibility.value = true;
}

/**
 * Close dialog
 *
 * @returns {void}
 * @author Yuto Saito
 */
function close(): void {
  visibility.value = false;
}
</script>
