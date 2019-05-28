(function ($) {
    //init plugin
    var o = {
        class: 'uploaded-images',
        script: '',

    }

    //Création HTML
    var uploadArea = {
        init: function (elt) {
            $(elt).addClass(o.class + '-container');

            let content = $('<div>').addClass(o.class + '-content');
            let input = $('<input type="file" name="upload-file-">').addClass(o.class + '-input');
            let img = $('<img>').addClass(o.class + '-image');
            let submit = $('<button type="submit">Ajouter</button>').addClass('btn').addClass('btn-mout');

            $(elt).append(content);
            content = $(content).append(input);
            content.append(img);
            $(elt).after(submit);
        },
        
        areaCreation: function (latest) {
            let content = $('<div>').addClass(o.class + '-content');
            let input = $('<input type="file" name="upload-file-">').addClass(o.class + '-input');
            let img = $('<img>').addClass(o.class + '-image');

            $(latest).after(content);
            $(content).append(input);
            content.append(img);
        }
    }

    //Création des fonctions utilisables dans le plugin

    //Appel du plugin
    $.fn.uploadedImg = function (options) {
        if(options) $.extend(o,options);
        $(this).each(function () {
            const elt = this;

            //Lancement du plugin
            let area = Object.create(uploadArea);
            area.init(elt, o);

            $('.' + o.class + '-input').on('change', function (e, index) {
                const files = e.target.files;

                console.log(files);
                //On affiche la miniature
                let img = $(this).next('img');
                $(this).next('img').css('display', 'block');
                read($(this), img);

                //Création d'une nouvelle zone une fois l'image envoyée
                area.areaCreation($(this).parent());

                // upload(files, 0);
            });
        });

        function upload(files, index) {
            var file = files[index];
            var xhr = new XMLHttpRequest();

            xhr.open('post', o.script, true);
            xhr.setRequestHeader('content-type', 'multipart/form-data');
            xhr.setRequestHeader('x-file-type', file.type);
            xhr.setRequestHeader('x-file-name', file.name);
            xhr.setRequestHeader('x-file-size', file.size);
            xhr.send(file);
        };

        function read(input, img) {
            // if (input.files && input.files[0]) {
            console.log(input, img);
                let reader = new FileReader();

                console.log('ok');
                reader.onload = function(e) {
                    console.log('read');
                    $(img).attr('src', e.target.result);
                // }

                reader.readAsDataURL(input.files[0]);
            }
        }
    }
}(jQuery));