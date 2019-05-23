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
            let submit = $('<button type="submit">Ajouter</button>').addClass('btn').addClass('btn-mout');

            $(elt).append(content);
            content = $(content).append(input);
            content.after(submit);
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

            console.log(o.script);

            $('.' + o.class + '-input').on('change', function (e) {
                var files = e.target.files;
                console.log(files);
                upload(files, 0);
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
        }
    }
}(jQuery));