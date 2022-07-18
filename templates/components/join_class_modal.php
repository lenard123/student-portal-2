<div x-cloak x-bind="Modal" x-data='modal("joinClassModal")' class="fb-modal" tabindex="-1" aria-hidden="true">
    <div class="fb-modal-container" x-data="joinClass">
        <div class="fb-modal-content">
            <!-- Modal header -->
            <div class="fb-modal-header">
                <h3 class="fb-modal-header-title">
                    Join Class
                </h3>
                <button @click="close" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <div class="fb-modal-body">
                <form @submit.prevent="handleSubmit">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Class Code</span>
                        </label>
                        <input x-model="code" type="text" class="input input-bordered" />
                    </div>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="fb-modal-footer">
                <button x-loading="joinClass.isLoading" @click="handleSubmit" type="button" class="btn btn-primary">Submit</button>
                <button :disabled="joinClass.isLoading" @click="close" type="button" class="btn">Cancel</button>
            </div>
        </div>
    </div>
</div>