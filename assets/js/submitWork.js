
document.addEventListener('alpine:init', () => {

    const uploadFileApi = async (file) => {
        const formData = new FormData()
        formData.append('file[]',file)
        const { data } = await axios.post(api('work/files', {id: window.work.id}), formData)
        return data
    }

    const submitWorkApi = async (id) => {
        const { data } = await axios.patch(api('work', {id}))
        return data
    }

    Alpine.data('submitWork', () => ({

        submitted: window.submitted,

        files: window.submitted.attachments ?? [],

        async uploadFile({ target }) {
            const [file] = target.files
            if(file) {
                const id = Date.now()

                const data = {
                    id,
                    status: 'uploading',
                    name: file.name,
                    size: file.size
                }

                this.files.push(data)

                try {
                    const uploadedFile = await uploadFileApi(file)
                    this.files = this.files.map(file => {
                        if (file.id === id) {
                            return uploadedFile
                        }
                        return file
                    })
                } catch (e) {
                    alert(`Failed to upload ${file.name}`)
                    this.files = this.files.filter(file => file.id !== id)
                }
            }
        },

        submitWork: useAsync(submitWorkApi),

        handleSubmit() {
            this.submitWork.execute(this.submitted.id)
        },

        init() {
            window.data = this
            this.submitWork.onSuccess = (data) => {
                this.submitted = data
            }
        }

    }))
})