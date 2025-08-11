import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
              "public/css/app.css", 
              "public/js/app.js",
              'resources/js/app.js',
              'resources/sass/app.scss'
            ], // Add your CSS and JS entry points here
            refresh: true,
        }),
    ],
   
})
