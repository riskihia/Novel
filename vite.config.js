import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindForms from "@tailwindcss/forms";

export default defineConfig({
    plugins: [
        tailwindForms,
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
    ],
});
