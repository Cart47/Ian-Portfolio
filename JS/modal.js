if(!modal)
{
    basket.require(
                { url: 'JS/main.js', skipCache: true },
                { url: 'JS/FlickrAPI.js', skipCache: true }
            );
}
else 
{
    $('#modal-form').parsley();
    $('.dark-screen').fadeOut(1000);
}