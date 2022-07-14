document.addEventListener('alpine:init', () => {

    const deleteLessonApi = async function(id) {
        return await axios.delete(`?page=api/lesson&lesson=${id}`)
    }

    Alpine.data('lessonRow', (id) => ({

        deleteLesson: useAsync(deleteLessonApi),

        deleted: false,

        confirmDeleteLesson() {
            const deleteLesson = confirm('Are you sure to delete this Lesson?')
            if (deleteLesson) {
                this.deleteLesson.execute(id)
            }
        },

        init() {
            this.deleteLesson.onSuccess = () => {
                alert('Deleted Successfully')
                this.deleted = true
            }
        }
    }))

});