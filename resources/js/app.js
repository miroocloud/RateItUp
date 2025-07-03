// Configure axios
import axios from 'axios'
window.axios = axios
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

// Optional: Add global error handling for axios
window.axios.interceptors.response.use(
    response => response,
    error => {
        // Handle common errors globally
        if (error.response?.status === 419) {
            // CSRF token mismatch - reload page
            window.location.reload()
        }
        return Promise.reject(error)
    }
)
