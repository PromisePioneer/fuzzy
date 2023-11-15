<script>
    const modalCreate = new bootstrap.Modal(document.getElementById('modal-create'));
    const formCreate = document.getElementById('form-create');
    document.addEventListener('alpine:init', () => {
        Alpine.data('datasetData', () => ({
            dataset:null,
            user: null,
            isLoading: true,
            async init(){
                const dataset = await axios.get('dataset/data');
                const user = await axios.get('/dataset/user-data');
                this.user = user.data;
                this.dataset = dataset.data;
                this.startIndex = this.dataset.from;
                this.isLoading = false;
            },
            async save(){
                await axios.post('dataset', new FormData(formCreate))
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
            rupiah(value){
                return new Intl.NumberFormat("id-ID", {
                    style: "currency",
                    currency: "IDR"
                }).format(value);
            },
            async inferensi(id){
                await axios.post(`inferensi/${id}`)
                    .then(() => {
                        this.notify();
                        console.log(`NICE`)
                    })
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
