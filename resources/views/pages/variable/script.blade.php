<script>
    const modalCreate = new bootstrap.Modal(document.getElementById('modal-create'));
    const modalEdit = new bootstrap.Modal(document.getElementById('modal-edit'));
    const formCreate = document.getElementById('form-create');
    const formEdit = document.getElementById('form-edit');
    document.addEventListener('alpine:init' ,() => {
       Alpine.data('variableData', () => ({
           variables: null,
           isLoading:true,
           variableId: '',
           editValue: '',
           async init(){
                const variables = await axios.get(`variable/data`);
                this.variables = variables.data;
                this.startIndex = this.variables.from;
                this.isLoading = false
           },
           async save(){
               await axios.post('variable', new FormData(formCreate))
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
               this.variableId = id
               const editValue = await axios.get(`variable/${id}`)
               this.editValue = editValue.data;
               console.log(this.editValue);
           },
           async update(variableId){
               await axios.post(`variable/update/${variableId}`, new FormData(formEdit))
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
           notify(){
               Swal.fire({
                   title: "Saved!",
                   text: "Success!",
                   icon: "success"
               });
           }
       }));
    });
</script>
