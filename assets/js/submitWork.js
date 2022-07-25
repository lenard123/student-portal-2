
document.addEventListener('alpine:init', () => {

    const uploadFileApi = async (file) => {
        const formData = new FormData()
        formData.append('file[]',file)
        const { data } = await axios.post(api('work/files', {id: window.work.id}), formData)
        return data
    }

    const submitWorkApi = async (id) => {
        const { data } = await axios.patch(api('work', {id}), {
            status: 'submitted'
        })
        return data
    }

    const deleteFileApi = async(fileId) => {
        return await axios.delete(api('work/files', {id: window.submitted.id, fileId}))
    }

    const unSubmitWorkApi = async (id) => {
        const { data } = await axios.patch(api('work', {id}), {
            status: 'pending'
        })
        return data
    }

    Alpine.data('submitWork', () => ({

        submitted: window.submitted,

        files: window.submitted.attachments ?? [],

        async handleRemoveAttachment(file) {
            const confirmed = window.confirm('Are you sure to remove this file?')
            if (confirmed) {
                try {
                    file.status = 'removing'
                    await deleteFileApi(file.id)
                    this.files = this.files.filter(_file => _file.id !== file.id)
                } catch (e) {
                    console.log(e)
                    alert('An error occured while removing the file');
                }
            }
        },

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
        unSubmitWork: useAsync(unSubmitWorkApi),

        isFileLoading(file) {
            return file.status === 'uploading' || file.status === 'removing';
        },

        handleSubmit() {
            this.submitWork.execute(this.submitted.id)
        },

        handleUnsubmit() {
            this.unSubmitWork.execute(this.submitted.id)
        },
        

        init() {
            window.data = this

            const updateData = (data) => {
                this.submitted = data
            }

            this.submitWork.onSuccess = updateData
            this.unSubmitWork.onSuccess = updateData
        }

    }))
})