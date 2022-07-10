(() => {

    const transformError = error => {
        if (error?.response?.status === 422) {
            return error.response.data.errors
        }
        return error
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

            onSuccess: (data) => {}
        }
    }
})()
