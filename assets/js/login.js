
const login = async function (credential) {
    const { data } = await axios.post('?page=api/login', credential)
    return data
}

document.addEventListener('alpine:init', () => {
    Alpine.data('loginPage', () => ({

        email: '',
        password: '',
        
        login: useAsync(login),

        handleSubmit() {
            this.login.execute({
                email: this.email,
                password: this.password
            })
        },

        init() {
            this.login.onSuccess = function(data) {
                window.location.href = '?page=' + data.role
            }
        }
    }))
})