(() => {

    const transformError = error => {
        if (error?.response?.status === 422) {
            return error.response.data.errors
        }
        return error
    }

    window.route = function (path, data = {}) {
        const query = Object.keys(data).map(key => `&${key}=${data[key]}`).join('&');
        return `?page=${path}${query}`
    }

    window.api = function (path, data = {}) {
        return window.route (`api/${path}`, data)
    }

    window.useAsync = function (callback) {
        return {
    
            data: null,
            errors: null,
    
            execute: async function (...params) {
                try {
                    this.isLoading = true
                    this.errors = null
                    this.data = await callback(...params)
                    this.onSuccess(this.data)
                } catch (error) {
                    this.errors = transformError(error)
                    this.onError(this.errors)
                } finally {
                    this.isLoading = false
                }
            },

            error: function(key) {
                if (this.errors && this.errors[key]) {
                    return this.errors[key][0]
                } 
            },

            hasError: function(key) {
                return this.error(key) !== undefined
            },

            onSuccess: (data) => {},
            onError: (error) => {},
        }
    }

    //Components
    document.addEventListener('alpine:init', () => {

        Alpine.data('toggler', (open = false) => ({
            open,
            toggle() {
                this.open = !this.open
            }
        }))

    })

})()
