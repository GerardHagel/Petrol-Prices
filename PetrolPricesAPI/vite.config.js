import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

import vue from '@vitejs/plugin-vue'


export default defineConfig({
    plugins: [
<<<<<<< Updated upstream
=======
        vue(),
>>>>>>> Stashed changes
        laravel({
            input: ['resources/sass/app.css', "resources/js/app.js"],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            vue: 'vue/dist/vue.esm-bundler.js', // Dodaj tę linijkę
        },
    },
});
