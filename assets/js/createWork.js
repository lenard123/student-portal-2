
document.addEventListener('alpine:init', () => {

    const createWorkApi = async function (data, id) {
        const { data:result } = await axios.post(api(`work`, {id}), data)
        return result
    }

    Alpine.data('createWork', (_class) => ({

        data: {
            instruction: null,
            deadline: null
        },

        createWork: useAsync(createWorkApi),

        handleSubmit() {

            if (this.createWork.isLoading)
                return;

            this.data.instruction = this.$refs.instruction.value
            this.createWork.execute(this.data, _class.id);
        },

        init() {

            this.createWork.onSuccess = function (data) {
                alert('Classwork Added Successfully')
                location.href = route('teacher/classes/works', { class:_class.id })
                // location.href = '?page=teacher/classes/view&class=' + _class.id
            }

            tinymce.init({
                selector: 'textarea',
                plugins: 'advlist autolink lists link image charmap preview anchor pagebreak',
                toolbar_mode: 'floating',
            });
        }
    }))

})