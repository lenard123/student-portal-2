document.addEventListener('alpine:init', () => {

    const editLessonApi = async function(lessonId, data) {
        const { data:result } = await axios.put(`?page=api/lesson&id=${lessonId}`, data)
        return result
    }

    Alpine.data('editLesson', (lesson) => ({
        data: {
            title: lesson.title,
            description: lesson.description
        },

        editLesson: useAsync(editLessonApi),

        handleSubmit() {
            if (this.editLesson.isLoading)
                return;

            const title = this.data.title
            const description = this.$refs.description.value

            this.editLesson.execute(lesson.id, {title, description})
        },

        init() {

            this.editLesson.onSuccess = function () {
                alert('Lesson Updated Successfully')
            }

            tinymce.init({
                selector: 'textarea',
                plugins: 'advlist autolink lists link image charmap preview anchor pagebreak',
                toolbar_mode: 'floating',
            });
        }
    }))
})