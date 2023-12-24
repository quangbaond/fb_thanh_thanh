import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'
import basicSsl from '@vitejs/plugin-basic-ssl';

export default defineConfig({
    server: {
        // hmr: {
        //     host: 'didactic-tribble-67wq7rvrqvjc4xjw-5173.app.github.dev/'
        // },
        // proxy: {
        //     '/': {
        //         target: 'https://didactic-tribble-67wq7rvrqvjc4xjw-5173.app.github.dev',
        //         changeOrigin: true,
        //         secure: false,
        //         rewrite: (path) => path.replace(/^\//, '')
        //     }
        // }
    },
    plugins: [
        // basicSsl(),
        vue(),
        laravel([
            'resources/css/app.css',
            'resources/js/app.js',
        ]),
    ],
});
