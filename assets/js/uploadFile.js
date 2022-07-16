document.addEventListener('alpine:init', () => {
    
    const uploadClassFileApi = async function(formData)
    {
        const { data } = await axios.post(api('class/file', {id: window.class.id}) ,formData)
        return data
    }

    Alpine.data('uploadFile', () => ({
        files: [],

        uploadClassFile: useAsync(uploadClassFileApi),

        handleChange({ target }) {
            const [file] = target.files
            if(file) {
                this.files.push(file)
            }
        },

        init() {
            this.uploadClassFile.onSuccess = () => {
                alert('File uploaded successfully');
                location.href = route('teacher/classes/files', {id: window.class.id})
            }
        },

        handleSubmit()
        {
            const formData = new FormData()
            this.files.forEach(file => formData.append('files[]', file))
            this.uploadClassFile.execute(formData)
        },

        removeFile(i) {
            this.files.splice(i, 1)
        }

    }))

})