

document.addEventListener('alpine:init', function() {

    const updateGradeApi = async (workId, grade) => {
        const { data } = await axios.patch(api('work', {id:workId}), {grade})
        return data
    }

    Alpine.data('updateGrade', (work) => ({
        grade: work.grade,

        updateGrade: useAsync(updateGradeApi),

        handleSubmit() {
            this.updateGrade.execute(work.id, this.grade)
        },

        init() {
            this.updateGrade.onSuccess = (data) => {
                this.grade = data.grade
                work.grade = data.grade
            }
        }
    }))

})