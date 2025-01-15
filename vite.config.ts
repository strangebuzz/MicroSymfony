import { defineConfig } from 'vite';
import symfonyPlugin from 'vite-plugin-symfony';

export default defineConfig({
    optimizeDeps: {
        include: ['@hotwired/stimulus', '@hotwired/turbo'],
    },
    plugins: [
        symfonyPlugin({
            stimulus: true,
        }),
    ],
    build: {
        rollupOptions: {
            input: {
                app: './assets/app.ts',

                // add css entry point to prevent FOUC
                // https://symfony-vite.pentatrion.com/guide/tips.html#css-file-entrypoints
                theme: './assets/styles/app.css',
            },
        },
    },
});
