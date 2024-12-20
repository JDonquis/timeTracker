import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                    'resources/css/app.css',
                    'resources/css/bootstrap.css', 
                    'resources/css/style.css', 
                    'resources/css/reset.css', 
                    'resources/css/font-awesome.css', 
                    'resources/js/app.js',
                ],
            refresh: true,
        }),
    ],
});
