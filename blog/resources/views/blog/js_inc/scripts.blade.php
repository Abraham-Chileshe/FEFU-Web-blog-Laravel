 <!-- Update the JavaScript code -->
 <script>
    $('.like-btn').click(function (event) {
        event.preventDefault();
        var postId = $(this).attr('id').split('_')[1]; // Extract post ID

        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
    
        $.ajax({
            method: "POST",
            url: "{{ url('add-like') }}",
            data: "postid=" + postId,
            success: function (response) {
                // Update the like count or handle the response as needed
                var newLikeCount = response.likes; // Adjust this based on your server response
                $('#like_' + postId).html('<i class="mr-1 fa fa-heart"></i> ' + newLikeCount);
            },
        });
    });


    // Adding Comments to database ussing Ajax //
        $('.comment_form').submit(function (event) {
            event.preventDefault();
            var postId = $(this).attr('id').split('_')[1]; // Extract post ID
            var commentInput = $(this).find('input[type="text"]');
            var commentText = commentInput.val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: "POST",
                url: "{{ url('add-comment') }}",
                data: {
                    postid: postId,
                    comment: commentText
                },
                success: function (response) {
                    // Handle the comment addition or update UI as needed
                    
                    // Example: You might update a comment count on the UI
                    var newCommentCount = response.comments;
                    $('#comment_count_' + postId).html('<i class="mr-1 fa fa-comment"></i> ' + newCommentCount);
                    console.log('Comment added successfully:', response.comments);
                    commentInput.val('');
                },
                error: function (error) {
                    console.error('Error adding comment:', error);
                }
            });
        });
          // Adding Comments to database ussing Ajax //
</script>