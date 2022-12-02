import Dropzone from "dropzone";

Dropzone.autoDiscover=false;

const dropzone = new Dropzone('#dropzone',{
    dictDefaultMessage:'Sube tu imagen aquí',
    acceptedFiles:".png,.jpg,.jpeg.gif",
    addRemoveLinks:true,
    dictRemoveFile:'Borrar Archivo',
    maxFiles:1,
    uploadMultiple:false,
    init:function(){
        if(document.querySelector('[name="imagen"]').value){
            const imagenPublicada = {};
            imagenPublicada.size= 1234;
            console.log(document.querySelector('[name="imagen"]').value);
            imagenPublicada.name=document.querySelector('[name="imagen"]').value;
            this.options.addedfile.call(this,imagenPublicada);
            
            this.options.thumbnail.call(this,imagenPublicada,`/uploads/${imagenPublicada.name}`);
            imagenPublicada.previewElement.classList.add("dz-succed","dz-complete");
        }
    }
})

dropzone.on('success',function(file,response){
    document.querySelector('[name=imagen]').value=response.imagen;

})
