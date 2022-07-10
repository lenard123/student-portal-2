
document.addEventListener('alpine:init', () => {
    Alpine.data('loginPage', () => ({
        init() {
            console.log('Mounted')
        }
    }))
})