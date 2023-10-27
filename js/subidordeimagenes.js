class MyUploadAdapter {
    constructor(loader) {
        this.loader = loader;
        this.baseUrl = 'http://localhost/AGCO_KNOWLEDGE_SYSTEM/uploads/images'; // Ruta base del servidor local
    }

    upload() {
        return this.loader.file
            .then(file => {
                return new Promise((resolve, reject) => {
                    // Generamos un nombre de archivo único para evitar conflictos
                    const randomNumber = Math.floor(Math.random() * 10000000);
                    const uploadFileName = randomNumber + file.name;
                    const imageUrl = 'uploads/images/' + uploadFileName;
    
                    // Guardamos el archivo localmente en la carpeta "uploads"
                    this.saveToUploadsFolder(file, uploadFileName)
                        .then(() => {
                            resolve({ default: imageUrl });
                        })
                        .catch(error => {
                            reject(error);
                        });
                });
            });
    }

    // Función para guardar el archivo en la carpeta "uploads"
    saveToUploadsFolder(file, fileName) {
        return new Promise((resolve, reject) => {

            const formData = new FormData();
            formData.append('upload', file);
            formData.append('fileName', fileName);
            formData.append('uniqueName', fileName);

            // Enviamos el archivo al servidor para guardarlo
            fetch('uploads/guardar_imagen.php', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    reject('Error al guardar la imagen.');
                } else {
                    resolve();
                }
            })
            .catch(error => {
                reject(error);
            });
        });
    }
}

function MyCustomUploadAdapterPlugin(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
        return new MyUploadAdapter(loader);
    };
}