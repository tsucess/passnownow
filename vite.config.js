import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
  plugins: [
    laravel({
      input: ['resources/css/app.css', 'resources/js/app.js'], // Add your CSS and JS entry points here
      refresh: true,
    }),
  ],
  build: {
    outDir: 'public/build', // Output directory for production build
    manifest: true, // Generate the manifest.json file
  },
});
