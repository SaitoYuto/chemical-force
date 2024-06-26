<template>
  <v-form ref="loginForm">
    <v-sheet
      width="350"
      height="225"
      elevation="3"
      rounded
      class="mx-auto pa-6"
    >
      <RequiredTextField label="User ID" v-model:input="id"></RequiredTextField>
      <RequiredTextField
        label="Password"
        v-model:input="password"
      ></RequiredTextField>
      <p id="login-failure" class="text-center" v-if="loginFailure">
        {{ MESSAGE.ERROR.LOGIN }}
      </p>
      <BaseButton text="LOGIN" @click="login" class="mt-2"></BaseButton>
    </v-sheet>
  </v-form>
</template>

<script lang="ts" setup>
import BaseButton from "@/atoms/BaseButton.vue";
import RequiredTextField from "@/atoms/RequiredTextField.vue";
import { MESSAGE } from "@/constants/Message";
import { LoginResponse } from "@/interfaces/Responses/Login";
import { LoginRequest } from "@/interfaces/Requests/Login";
import ApiRequester from "@/utils/ApiRequester";
import { user } from "@/stores/user";

const router = useRouter();
const userStore = user();
const loginForm = ref();
const id = ref("");
const password = ref("");
const loginFailure = ref(false);

/**
 * login
 *
 * @returns {Promise<void>}
 * @author Yuto Saito
 */
async function login() {
  const validResult = await loginForm.value.validate();
  if (!validResult.valid) {
    return;
  }
  new ApiRequester<LoginRequest, LoginResponse>().call(
    "login",
    {
      id: id.value,
      password: password.value,
    },
    (response) => {
      userStore.setId(response.id);
      userStore.setName(response.name);
      userStore.setToken(response.token);
      userStore.setSupervisorId(response.supervisor_id);
      router.push("/");
    },
    (apiError) => {
      console.log(...apiError.errors);
      loginFailure.value = true;
    }
  );
}
</script>

<style scoped>
#login-failure {
  color: rgb(var(--v-theme-error));
  font-weight: bold;
  font-family: "azo-sans-web, sans-serif";
}
</style>
