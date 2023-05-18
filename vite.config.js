import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
    plugins: [
        laravel(['resources/css/app.css', 'resources/js/client/app.jsx', 'resources/css/admin.css', 'resources/js/admin/app.jsx']),
        react(),
    ],
});
