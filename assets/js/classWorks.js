document.addEventListener('alpine:init', () => {

    const deleteWorkApi = async function(id) {
        const { data } = await axios.delete(api('work', {id}))
        return data
    }

    Alpine.data('classWorks', (works) => ({
        works,

        deleteWork: useAsync(deleteWorkApi),

        confirmDeleteWork(workId, index) {
            
            const isConfirmed = window.confirm('Are you sure to delete this work?')

            if (isConfirmed) {
                this.works[index].deleted = true
                this.deleteWork.execute(workId)
            }
        }

    }))

})