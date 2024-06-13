<template>
  <v-form ref="todoForm" @submit.prevent>
    <v-sheet width="500" elevation="3" rounded class="mx-auto pa-3">
      <WelcomeCard class="mx-auto mb-2"></WelcomeCard>
      <RequiredTextField
        :label="MESSAGE.ENQUIRY.TODO"
        v-model:input="todoVal"
        @keyup.enter="registerTodo()"
      ></RequiredTextField>
      <div
        class="d-flex align-center"
        v-for="todo in todoStore.getTodo"
        :key="todo.id"
      >
        <v-checkbox-btn
          v-model="todo.done"
          :label="todo.content"
        ></v-checkbox-btn>
        <v-icon
          :icon="UI.ICON.CLOSE"
          v-show="todo.done"
          @click="deleteTodo(todo.id)"
        />
      </div>
    </v-sheet>
  </v-form>
</template>

<script lang="ts" setup>
import RequiredTextField from "@/atoms/RequiredTextField.vue";
import WelcomeCard from "@/atoms/WelcomeCard.vue";
import { UI } from "@/constants/UI";
import { MESSAGE } from "@/constants/Message";
import { todo } from "@/stores/todo";

const todoForm = ref();
const todoVal = ref("");
const todoStore = todo();

/**
 * stringify current date.
 *
 * @returns {string}
 * @author Yuto Saito
 */
function stringifyCurrentDate(): string {
  const date = new Date();
  const year = date.getFullYear();
  const month = date.getMonth();
  const day = date.getDate();
  return year + month + day + Date.now() + "";
}

/**
 * register todo.
 *
 * @returns {Promise<void>}
 * @author Yuto Saito
 */
async function registerTodo(): Promise<void> {
  const validResult = await todoForm.value.validate();
  if (!validResult.valid) {
    return;
  }
  todoStore.add({
    id: stringifyCurrentDate(),
    content: todoVal.value,
    done: false,
  });
}

/**
 * delete existing todo.
 *
 * @param {string} id
 * @returns {void}
 * @author Yuto Saito
 */
function deleteTodo(id: string): void {
  todoStore.deleteById(id);
}
</script>
