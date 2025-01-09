import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/sass/app.scss', 'node_modules/bootstrap/dist/js/bootstrap.bundle.min.js','resources/js/app.js'],
            refresh: true,
        }),
    ],
});
