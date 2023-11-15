<script>
    const modalCreate = new bootstrap.Modal(document.getElementById('modal-create'));
    const modalEdit = new bootstrap.Modal(document.getElementById('modal-edit'));
    const formCreate = document.getElementById('form-create');
    const formEdit = document.getElementById('form-edit');
    document.addEventListener('alpine:init', () => {
        Alpine.data('userData', () => ({
            users:null,
            isLoading:true,
            userId: '',
            editValue: '',
            async init(){
                const users = await axios.get('user/data');
                this.users = users.data;
                this.startIndex = this.users.from;
                this.isLoading = false;
            },
            async nextPage(){
                if(this.users.next_page_url){
                    const users = await axios.get(`${this.users.next_page_url}`)
                    this.users = await users.data
                    console.log(this.users);
                }
            },
            async PrevPage(){
                if(this.users.prev_page_url){
                    const users = await axios.get(`${this.users.prev_page_url}`)
                    this.users = await users.data
                    console.log(this.users);
                }
            },
            async save(){
                await axios.post('user', new FormData(formCreate))
                    .then(() => {
                        this.notify();
                        this.init();
                        formCreate.reset();
                        modalCreate.hide();
                    })
                    .catch((error) => {
                        const respError = error.response.data.errors;
                        Object.keys(respError).map(err => {
                            const input = formCreate.querySelector(`[name="${err}"]`);
                            input.classList.add('is-invalid');
                            if (input.nextElementSibling && input.nextElementSibling.tagName === 'SMALL') {
                                input.nextElementSibling.textContent = respError[err][0];
                            } else {
                                const smallElement = document.createElement('small');
                                smallElement.classList.add('text-danger');
                                smallElement.textContent = respError[err][0];
                                input.insertAdjacentElement('afterend', smallElement);
                            }
                        })
                    })
            },
            async edit(id){
                this.userId = id
                const editValue = await axios.get(`user/${id}`);
                this.editValue = editValue.data
            },
            async update(userId){
                await axios.post(`user/update/${userId}`, new FormData(formEdit))
                    .then(() => {
                        this.notify();
                        formEdit.reset();
                        modalEdit.hide();
                    })
                    .catch((error) => {
                        const respError = error.response.data.errors;
                        Object.keys(respError).map(err => {
                            const input = formEdit.querySelector(`[name="${err}"]`);
                            input.classList.add('is-invalid');
                            if (input.nextElementSibling && input.nextElementSibling.tagName === 'SMALL') {
                                input.nextElementSibling.textContent = respError[err][0];
                            } else {
                                const smallElement = document.createElement('small');
                                smallElement.classList.add('text-danger');
                                smallElement.textContent = respError[err][0];
                                input.insertAdjacentElement('afterend', smallElement);
                            }
                        })
                    })
            },
            async destroy(id){
                await Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        axios.delete(`user/${id}`)
                        this.init();
                        Swal.fire({
                            title: "Deleted!",
                            text: "Your file has been deleted.",
                            icon: "success"
                        });
                    }
                });
            },
            notify(){
                Swal.fire({
                    title: "Saved!",
                    text: "Success!",
                    icon: "success"
                });
            }
        }))
    })
</script>
