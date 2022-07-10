document.addEventListener('alpine:init', () => {

    const registerApi = async function (data) {
        const { data:user } = await axios.post('?page=api/register', data)
        return user
    }

    Alpine.data('register', () => ({

        data: {
            role: 'student',
            firstname: '',
            middlename: '',
            lastname: '',
            gender: '',
            birthday: null,
            email: '',
            password: '',
            password_confirmation: '',
        },

        register: useAsync(registerApi),

        handleSubmit() {
            if (this.register.isLoading)
                return;

            this.register.execute(this.data)
        },

        init() {
            this.register.onError = (error) => {
                console.log(error)
            }

            this.register.onSuccess = (data) => {
                window.alert('Registered Successfully')
                window.alert('You can now proceed to login.')
                window.location.href = '?page=login'
            }
        }
    }))

})