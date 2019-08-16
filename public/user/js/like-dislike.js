$(document).ready(function () {
    /*let like_count = 0;
    let postId = 0;
    let isLike = 0;
    $('.like').click(function () {
        like_count++;
        if (like_count % 2 === 1) {
            postId = $(this).children('.post-like').attr('id');
            isLike = $(this).children('.post-like').val();
        } else if(like_count % 2 === 0){
            postId = $(this).children('.post-like').attr('id');
            $(this).children('.post-like').val('remove-like');
            isLike = $(this).children('.post-like').val();
        }

        $.ajax({
                method:"get",
                datatype: "html",
                url:"/",
                data: {id:postId, like:isLike},

                success: function() {
                    //alert('success'+ postId + 'value' + isLike);
                    //$('.like-this-post').html('You Like This Post');
                }
            })
            .fail(function() {
                alert('error');
            });

    })


*/




    var postId = 0;
    $('.like').on('click', function(event) {
        event.preventDefault();
        postId = event.target.parentNode.parentNode.dataset['postid'];
        var isLike = event.target.previousElementSibling == null;
        $.ajax({
            method: 'POST',
            url: '/',
            data: {isLike: isLike, postId: postId, _token: token}
        })
            .done(function() {
                event.target.innerText = isLike ? event.target.innerText === 'Like' ? 'You like this post' : 'Like' : event.target.innerText == 'Dislike' ? "You don't like this post" : "Dislike";
                if (isLike) {
                    event.target.nextElementSibling.innerText = 'Dislike';
                } else {
                    event.target.previousElementSibling.innerText = 'Like';
                }
            });
    });
})