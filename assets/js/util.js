(() => {

    const transformError = error => {
        if (error?.response?.status === 422) {
            return error.response.data.errors
        }
        return error
    }

    window.route = function (page, data = {}) {
        data = {page, ...data }
        const query = Object.keys(data).map(key => `${key}=${data[key]}`).join('&');
        return `?${query}`
    }

    window.api = function (path, data = {}) {
        return window.route (`api/${path}`, data)
    }

    window.useAsync = function (callback) {
        return {
    
            data: null,
            errors: null,
            isLoading: false,
    
            execute: async function (...params) {

                if(this.isLoading) return;

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

            onSuccess: console.log,
            onError: console.log,
        }
    }

    window.humanFileSize = (size) => {
        var i = Math.floor( Math.log(size) / Math.log(1024) );
        return ( size / Math.pow(1024, i) ).toFixed(2) * 1  + ['B', 'kB', 'MB', 'GB', 'TB'][i];
    };

    //Components
    document.addEventListener('alpine:init', () => {

        Alpine.data('toggler', (open = false) => ({
            open,
            toggle() {
                this.open = !this.open
            }
        }))

        Alpine.directive('loading', (el, {expression}, { effect, evaluateLater }) => {
            
            const getIsLoading = evaluateLater(expression)

            effect(() => {
                getIsLoading((isLoading) => {
                    if (isLoading) {
                        el.classList.add('loading')
                    } else {
                        el.classList.remove('loading')
                    }
                })
            })
            
        })


        Alpine.data('modal', (id) => ({
            enabled: false,
            modalId: id,
            close() { this.enabled = false },
            open() { this.enabled = true },
            toggle() { this.enabled = !this.enabled },
            set(enabled) { this.enabled = enabled }
        }))

        Alpine.bind('toggleModal', (id) => ({
            '@click'() {
                this.$dispatch('toggleModal', id)
            }
        }))

        Alpine.bind('Modal', () => ({
            '@toggleModal.window'({ detail }) {
                if (this.modalId === detail) {
                    this.toggle()
                }
            },
            ':class'() {
                return this.enabled ? 'flex' : 'hidden'
            }
        }))
    })

})()
