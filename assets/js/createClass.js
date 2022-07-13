document.addEventListener('alpine:init', () => {

    const createClassApi = async function(data) {
        const { data:result } = await axios.post('?page=api/class', data)
        return result
    }

    Alpine.data('createClass', () => ({

        data: {
            name: null,
            grade: null,
            section: null
        },

        createClass: useAsync(createClassApi),

        handleSubmit() {
            if (this.createClass.isLoading) {
                return;
            }

            this.createClass.execute(this.data)
        }

    }))

})