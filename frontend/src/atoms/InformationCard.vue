<template>
  <v-card min-width="600" max-width="600" variant="outlined">
    <v-card-title>{{ title }}</v-card-title>
    <v-card-text class="text-body-1">
      {{ content.substring(0, 100) + `...` }}
    </v-card-text>
    <v-card-actions>
      <BaseButton
        text="Detail"
        :block="false"
        @click="
          emit('show-details', {
            id: id,
            title: title,
            content: content,
          })
        "
      ></BaseButton>
    </v-card-actions>
  </v-card>
</template>

<script lang="ts" setup>
import BaseButton from "@/atoms/BaseButton.vue";

const emit = defineEmits();
defineProps({
  id: {
    type: String,
    required: true,
  },
  title: {
    type: String,
    required: true,
  },
  content: {
    type: String,
    required: true,
  },
});
</script>
