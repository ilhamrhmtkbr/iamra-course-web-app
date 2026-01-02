import { defineConfig, loadEnv } from 'vite'
import react from '@vitejs/plugin-react'

// https://vite.dev/config/
export default defineConfig(({mode, command}) => {
  const env = loadEnv(mode, process.cwd(), '')
  const isProduction = mode === 'production'
  const isDevelopment = command === 'serve'

  const getBaseUrl = () => {
    if (isProduction) return '/'
    if (env.VITE_APP_FRONTEND_STUDENT_URL?.includes('ngrok')) return '/student/'
    return '/'
  }

  return {
    base: getBaseUrl(),

    plugins: [
      react({
        // Enable Fast Refresh
        fastRefresh: true,
        // Include .jsx files
        include: "**/*.{jsx}",
      })
    ],

    server: {
      host: '0.0.0.0', // Penting agar Vite bisa diakses dari Docker network (oleh Nginx)
      port: 5173, // Ini port Vite di dalam container frontend-user,
      strictPort: true,

      allowedHosts: [
        'localhost',
        '127.0.0.1',
        '.iamra.site',
        '.ngrok-free.app'
      ],

      hmr: {
        overlay: true,
        host: isDevelopment ? env.VITE_HMR : undefined,
        protocol: env.VITE_USE_HTTPS === 'true' ? 'wss' : 'ws',
        clientPort: env.VITE_USE_HTTPS === 'true' ? 443 : 5173,
      },

      watch: {
        usePolling: !!env.VITE_USE_POLLING || process.env.NODE_ENV === 'docker',
        interval: 1000,
        ignored: ['**/node_modules/**', '**/.git/**']
      },
    },
    build: {
      outDir: 'dist',
      sourcemap: !isProduction,
      minify: isProduction ? 'terser' : false,

      // Chunk splitting for better caching
      rollupOptions: {
        output: {
          manualChunks: {
            vendor: ['react', 'react-dom'],
            router: ['react-router-dom'],
          }
        }
      },

      // Build optimizations
      terserOptions: isProduction ? {
        compress: {
          drop_console: true,
          drop_debugger: true
        }
      } : undefined,

      // Size warnings
      chunkSizeWarningLimit: 1000
    },

    // Environment variables prefix
    envPrefix: ['VITE_'],

    // Dependency optimization
    optimizeDeps: {
      include: [
        'react',
        'react-dom',
        'react-router-dom'
      ],
      exclude: []
    }
  }
})
