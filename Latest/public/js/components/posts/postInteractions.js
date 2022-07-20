function addLike(postid) {
    console.log('id'+postid);
    if($('#post-likes-'+postid).hasClass('active')) {
        $('#post-likes-'+postid).removeClass('active');
        
        decPostsLikes(postid);  
        
    } else {
        if($('#post-dislikes-'+postid).hasClass('active')) {
            $('#post-dislikes-'+postid).removeClass('active');
            
            decPostsDislikes(postid);
        }
        
        $('#post-likes-'+postid).addClass('active');
        
        incPostsLikes(postid); 
    }
    
}

function addDislike(postid) {
    console.log('id'+postid);
    if($('#post-dislikes-'+postid).hasClass('active')) {
        $('#post-dislikes-'+postid).removeClass('active');
        
        decPostsDislikes(postid);
        
    } else {
        if($('#post-likes-'+postid).hasClass('active')) {
            $('#post-likes-'+postid).removeClass('active');
            
            decPostsLikes(postid);
            
        }
        
        $('#post-dislikes-'+postid).addClass('active');
        
        incPostsDislikes(postid);
    }
}


function incPostsLikes(postid) {
    console.log("hello1");
        $.ajax({
            url: URLROOT+'/Posts/incPostsLikes/'+postid,
            method: "post",
            data: $('form').serialize(),
            dataType: "text",
            success: function(likes) {
                $('#post-likes-count-'+postid).text(likes);
            }
        })
    }
    
function decPostslikes(postid) {
    console.log("hello2");
        $.ajax({
            url: URLROOT+'/Posts/decPostsLikes/'+postid,
            method: "post",
            data: $('form').serialize(),
            dataType: "text",
            success: function(likes) {
                $('#post-likes-count-'+postid).text(likes);
            }
        })
    }

function incPostsDislikes(postid) {
    console.log("hello3");
        $.ajax({
            url: URLROOT+'/Posts/incPostsDislikes/'+postid,
            method: "post",
            data: $('form').serialize(),
            dataType: "text",
            success: function(dislikes) {
                $('#post-dislikes-count-'+postid).text(dislikes);
            }
        })
    }
    
function decPostsDislikes(postid) {
    console.log("hello4");
        $.ajax({
            url: URLROOT+'/Posts/decPostsDislikes/'+postid,
            method: "post",
            data: $('form').serialize(),
            dataType: "text",
            success: function(dislikes) {
                $('#post-dislikes-count-'+postid).text(dislikes);
            }
        })
    }



    