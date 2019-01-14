$('#add-image').click(function(){

    // je recuper le numero des futurs champs que je veux creer
    const index = +$('#widgets-counter').val();

    //Je récupère le prototype des entrees
    const tmpl = $('#ad_images').data('prototype').replace(/__name__/g, index);

    //j'injecte ce code au sein de la div
    $('#ad_images').append(tmpl);
    $('#widgets-counter').val(index + 1);

    // je gère le bouton supprimer
    handleDeleteButton();
});

function handleDeleteButton(){

    $('button[data-action="delete"]').click(function(){

        const target = this.dataset.target;

        console.log(target);
        $(target).remove();
    });
}

function updateCounter(){

    const count = +$('#ad_images div.form-group').length;
    $('#widgets-counter').val(count);
}

updateCounter();
handleDeleteButton();