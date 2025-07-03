import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    base: "./",
    // Dependency optimization for faster dev server
    optimizeDeps: {
        include: [
            'dayjs',
            'dayjs/plugin/utc',
            'dayjs/plugin/timezone',
            'dayjs/plugin/relativeTime',
            'dayjs/plugin/customParseFormat',
            'dayjs/plugin/duration',
            'dayjs/plugin/updateLocale',
            'dayjs/plugin/LocaleData',
            'dayjs/plugin/weekOfYear',
            'dayjs/plugin/isToday',
            'axios'
        ]
    },
    build: {
        target: "es2020",
        minify: "terser",
        sourcemap: false, // Disable sourcemaps in production for smaller bundle
        cssCodeSplit: true, // Enable CSS code splitting
        terserOptions: {
            compress: {
                defaults: true,
                dead_code: true,
                drop_console: true, // Remove console logs in production
                drop_debugger: true,
                pure_funcs: ['console.log', 'console.info', 'console.debug']
            },
            format: {
                comments: false
            }
        },
        rollupOptions: {
            output: {
                manualChunks: {
                    // Separate vendor chunk for better caching
                    vendor: ['dayjs'],
                    // Separate chunk for dayjs plugins to optimize loading
                    'dayjs-plugins': [
                        'dayjs/plugin/utc',
                        'dayjs/plugin/timezone',
                        'dayjs/plugin/relativeTime',
                        'dayjs/plugin/customParseFormat',
                        'dayjs/plugin/duration',
                        'dayjs/plugin/updateLocale',
                        'dayjs/plugin/LocaleData',
                        'dayjs/plugin/weekOfYear',
                        'dayjs/plugin/isToday'
                    ]
                }
            }
        }
    },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/vendor.js'
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
