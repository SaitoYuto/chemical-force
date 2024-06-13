<template>
  <v-app>
    <v-main>
      <v-container>
        <v-img height="270" src="@/assets/logo.svg"></v-img>
        <h1 class="text-center">ChemicalForce</h1>
        <LoginForm></LoginForm>
      </v-container>
    </v-main>
  </v-app>
</template>

<route lang="yaml">
meta:
  layout: "login"
</route>
