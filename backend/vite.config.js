import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import Vue from "@vitejs/plugin-vue";
import Pages from "vite-plugin-pages";
import Layouts from "vite-plugin-vue-layouts";

export default defineConfig({
    optimizeDeps: {
        esbuildOptions: {
            plugins: [esbuildCommonjs(["chance"])],
        },
    },
    plugins: [
        Vue(),
        Pages(),
        Layouts(),
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
    ],
});
