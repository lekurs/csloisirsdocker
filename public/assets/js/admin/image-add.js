(function ($) {
    //init plugin
    var o = {
        class: 'uploaded-images',
        script: '',
        auto: true,
    }
    var elt;

    //Création HTML
    var uploadArea = {
        init: function (elt) {
            $(elt).addClass(o.class + '-container');

            uploadArea.areaCreation();
        },
        
        areaCreation: function () {
            //On initialise la variable pour faire un test de changement de l'input ou NON.
            let changeOff = false;

            let content = $('<div>').addClass(o.class + '-content');
            let plus = $('<i>').addClass('fa fa-plus-circle').addClass(o.class +'-plus');
            //Création de l'input + création d'une nouvelle box au chargement de l'image dans la box
            let input = $('<input type="file" name="upload-file">').addClass(o.class + '-input').change(function (e) {
                changeOff = true;
                //On cache le +
                $(this).parent().find('.' + o.class + '-plus').hide();

                //On affiche la miniature
                // this === objet | $(this) => element du DOM
                uploadArea.previewsImage(this);

                //Création d'une nouvelle zone une fois l'image envoyée
                uploadArea.areaCreation();

                //UPLOAD
                uploadArea.upload(e.target.files, 0);

            }).mouseenter(function () {
                $(this).parent().find('.' + o.class + '-plus').show().css('z-index', '1004');
            }).mouseleave(function () {
                if (changeOff) {
                    $(this).parent().find('.' + o.class + '-plus').hide().css('z-index', '1000');
                }
            });
            let img = $('<img>').addClass(o.class + '-image');

            $(elt).append(content);
            $(content).append(plus).append(input);
            content.append(img);
        },

        //Méthode d'affichage de la miniature
        previewsImage: function (files) {
            let reader = new FileReader();

            reader.onload = function () {

            let target = $(files).parent().find('img');

            target.attr('src', reader.result);
            }
            reader.readAsDataURL(files.files[0]);
        },

        //Méthode d'upload
        upload: function(files, index) {
        let file = files[index];
        let xhr = new XMLHttpRequest();

        xhr.open('post', o.script, true);
        xhr.setRequestHeader('content-type', 'multipart/form-data');
        xhr.setRequestHeader('x-file-type', file.type);
        xhr.setRequestHeader('x-file-name', file.name);
        xhr.setRequestHeader('x-file-size', file.size);
        xhr.send(file);
        },
    }

    //Création des fonctions utilisables dans le plugin

    //Appel du plugin
    $.fn.uploadedImg = function (options) {
        if(options) $.extend(o,options);
        $(this).each(function () {
            elt = this;

            //Lancement du plugin
            let area = Object.create(uploadArea);
            area.init(elt, o);
        });

        // function upload(files, index) {
        //     var file = files[index];
        //     var xhr = new XMLHttpRequest();
        //
        //     xhr.open('post', o.script, true);
        //     xhr.setRequestHeader('content-type', 'multipart/form-data');
        //     xhr.setRequestHeader('x-file-type', file.type);
        //     xhr.setRequestHeader('x-file-name', file.name);
        //     xhr.setRequestHeader('x-file-size', file.size);
        //     xhr.send(file);
        // };
    }
}(jQuery));