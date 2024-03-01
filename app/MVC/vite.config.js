import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/scss/plantilla1.scss','resources/scss/plantilla2.scss','resources/scss/plantilla3.scss','resources/js/custom.js'],
            refresh: true,
        }),
    ],
    build: {
        rollupOptions: {
            output: {
                entryFileNames: `assets/[name].js`,
                chunkFileNames: `assets/[name].js`,
                assetFileNames: 'assets/[name].css',
            }
        }
    }
});
