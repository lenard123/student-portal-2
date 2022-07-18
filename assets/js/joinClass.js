document.addEventListener('alpine:init', () => {

    const joinClassApi = async function(code) {
        const { data } = await axios.post(api('class/students'), { code })
        return data
    }

    Alpine.data('joinClass', () => ({
        code: '',

        joinClass: useAsync(joinClassApi),

        handleSubmit() {
            this.joinClass.execute(this.code)
        },

        init() {
            this.joinClass.onError = error => {
                if (error?.response?.status === 404) {
                    alert('Invalid Class Code')
                }
            }

            this.joinClass.onSuccess = data => {
                alert('Class joined successfully')
                location.href = route('student/classes/view', { id: data.id })
            }
        }
    }))

})