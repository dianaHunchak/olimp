<template>
    <div class="container">
        <div class="row" v-if="fileProgress > 0">
            <div class="col-sm-7 text-center mb-2">
                <div class="progress-bar" role="progressbar" :style="{width: fileProgress + '%'}">{{ fileCurrent }}%</div>
            </div>
        </div>
        <div class="row" v-for="(download, index) in downloads">
            <input type="hidden" name="downloads[]" v-model="download.id">
            <div class="col-sm-4">
                <div class="form-group">
                    <input type="text" class="form-control" required="true"  placeholder="Назва завдання" v-model="download.title">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="input-group">
                <template v-if="download.is_new">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" @change="fileInputChange(download)">
                        <label class="custom-file-label" for="customFile">Виберіть файл</label>
                    </div>                    
                        <button type="button" class="btn btn-outline-secondary" @click="uploadFile(download)">Завантажити</button>
                </template>                  
                        <button type="button" class="btn btn-outline-danger" @click="deleteFile(index)">Видалити</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8 text-center">
                 <button type="button" class="btn btn-primary" @click="addFile(index)">Додати нове завдання</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
    data () {
        return {
            downloads: [],
            fileProgress: 0, 
            fileCurrent: '',
        };
    }, 
    props: ['files'],
    mounted() {
        this.downloads = this.files;
    },
    methods: {
        addFile () {
            this.downloads.push({id: 0, title: '', file: [], is_new: true});
        }, 
        deleteFile (index) {

            if (this.downloads[index].is_new){
                this.downloads.splice(index, 1);
            }

            axios.delete('/admin/download/' + this.downloads[index].id)
            .then(response =>{
                if (response.data.result){
                    this.downloads.splice(index, 1);
                }
            });
        }, 
        fileInputChange (download) {
            download.file = event.target.files[0];
        }, 
        async uploadFile (download) {

            let form = new FormData();
            form.append('file', download.file);
            form.append('title', download.title);

            await axios.post('/admin/download', form, {
                onUploadProgress: (itemUpload) => {
                    this.fileProgress = Math.round( (itemUpload.loaded / itemUpload.total) * 100);
                    this.fileCurrent = download.file.name + ' ' + this.fileProgress;
                }
            })
            .then(response => {
                download.id = response.data;
                download.is_new = false;
            })
            .catch(error => {
                console.log(error);
            });

            this.fileProgress = 0, 
            this.fileCurrent = ''
        }
    }

    }
</script>
