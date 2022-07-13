
document.addEventListener('alpine:init', () => {

    const createLessonApi = async function (classId, data) {
        const { data:result } = await axios.post(`?page=api/lesson&class=${classId}`, data)
        return result
    }

    Alpine.data('createLesson', (_class) => ({

        data: {
            title: '',
            description: null
        },

        createLesson: useAsync(createLessonApi),

        handleSubmit: function () {
            const title = this.data.title
            const description = this.$refs.description.value
            this.createLesson.execute(_class.id, {title, description})
        },

        init() {
            this.createLesson.onSuccess = function () {
                alert('Lesson Added Successfully')
                location.href = '?page=teacher/classes/view&class=' + _class.id
            }

            tinymce.init({
                selector: 'textarea',
                plugins: 'advlist autolink lists link image charmap preview anchor pagebreak',
                toolbar_mode: 'floating',
            });

        }
    }))

})